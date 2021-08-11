<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserVerify;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SendGrid;
use SendGrid\Mail\Content;
use SendGrid\Mail\From;
use SendGrid\Mail\Subject;
use SendGrid\Mail\Substitution;
use SendGrid\Mail\To;
use SendGrid\Mail\TypeException;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $account_random_number = random_int(100000, 999999);
        $role = Role::where('name', 'customer')->first();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'account_number' => $account_random_number,
        ]);

        $user->assignRole($role);

        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        //  Not having the SendGrid apiKey? Reject
        $apiKey =env("MAIL_PASSWORD");
        $emailTo = $data['email'];
        $emailToName = $data['name'];
        $verify = "https://ackberrycloud.com/account/verify/$token";

        if (!is_string($apiKey)) {
            echo "SendGrid API key is missing";
            exit;
        }

        try {
            //  Compose parameters which may be fail
            $mailFrom = new From("info@ackberrycloud.com", "Ackberry Cloud");
            $mailTo = new To($emailTo, $emailToName);
            $mailSubject = new Subject("Registration with Limenet");

            //  Contents
            $mailContentPlain = new Content("text/plain", "Welcome to Limenet, we are glad to have you on board. ");
            $mailContentHtml = new Content("text/html", "<strong>Welcome to Limenet, we are glad to have you on board. </strong>");
        } catch (TypeException $e) {
            //  Your parameters are failing!
            echo 'Parameter exception: ' . $e->getMessage() . "\n";
            exit;
        }

        try {
            //  Create the Mail and try to send it
            $mail = new SendGrid\Mail\Mail($mailFrom, $mailTo, $mailSubject, $mailContentPlain, $mailContentHtml);
            $substitutions = [
                new Substitution("verify", $verify),
                new Substitution("nameuser", $emailToName),
            ];
            $mail->setTemplateId("d-993d9fd7a81e4c0280a9b67e04797c53");
            $mail->addDynamicTemplateDatas($substitutions);
            $client = new SendGrid($apiKey);

            //  Try to send the mail which is composed
            $response = $client->send($mail);

            //  Handle/print the response
            Log::info($response->statusCode());
            print_r($response->headers());
            //Log::info($response->headers());
            Log::info($response->body());
        } catch (Exception $e) {
            //  SendGrid is failing...
            Log::info('Caught exception: ');
            Log::info($e->getMessage() ."\n");
            exit();
        }


        return $user;
    }
}
