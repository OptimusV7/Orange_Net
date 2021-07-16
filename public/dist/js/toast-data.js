/*Toast Init*/


$(document).ready(function() {
	"use strict";









	$('.tst9').on('click',function(e){
	    $.toast().reset('all');
		$("body").removeAttr('class').removeClass("bottom-center-fullwidth").addClass("top-center-fullwidth");
		$.toast({
			text: '<i class="jq-toast-icon ti-face-smile"></i><p>Welcome to Lime Net Dashboard.</p>',
			position: 'top-center',
			loaderBg:'#7a5449',
			class: 'jq-has-icon jq-toast-dark',
			hideAfter: 3500,
			stack: 6,
			showHideTransition: 'fade'
        });
		return false;
	});

	$('.tst10').on('click',function(e){
	    $.toast().reset('all');
		$("body").removeAttr('class').addClass("bottom-center-fullwidth");
		$.toast({
            text: '<i class="jq-toast-icon ti-face-smile"></i><p>Welcome to Lime Net Dashboard.</p>',
			position: 'bottom-center',
			loaderBg:'#7a5449',
			class: 'jq-has-icon jq-toast-dark',
			hideAfter: 3500,
			stack: 6,
			showHideTransition: 'fade'
        });
		return false;
	});
});

