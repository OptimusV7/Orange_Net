<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit content']);
        Permission::create(['name' => 'delete content']);
        Permission::create(['name' => 'publish content']);
        Permission::create(['name' => 'unpublish content']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'add packages']);
        Permission::create(['name' => 'edit packages']);
        Permission::create(['name' => 'add profile']);
        Permission::create(['name' => 'edit profile']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('edit content');
        $role1->givePermissionTo('delete content');
        $role1->givePermissionTo('add profile');
        $role1->givePermissionTo('edit profile');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish content');
        $role2->givePermissionTo('unpublish content');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => ' User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => ' Admin User',
            'email' => 'admin@mail.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => ' Super-Admin User',
            'email' => 'superadmin@mail.com',
        ]);
        $user->assignRole($role3);
    }
}
