/**
 * jQuery initialization
 */
$(document).ready(function() {
    $('#disconnect').click(helper.disconnect);
    $('#loaderror').hide();
	$('#profileform').hide();
    $('#profilesubmitted').hide();
    
    // hide #back-top first
    $("#back-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });
     
        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    
    // Slider 1
    $('#slider1').elastislide({
		// orientation 'horizontal' || 'vertical'
    	orientation : 'horizontal',

    	// sliding speed
    	speed : 500,
		
		// the minimum number of items to show.
		// when we resize the window, this will make sure minItems are always shown
		// (unless of course minItems is higher than the total number of elements)
		minItems : 3,
	
		// index of the current item (left most item of the carousel)
		start : 0	
	});
	$('#slider2').elastislide({
		// orientation 'horizontal' || 'vertical'
    	orientation : 'horizontal',

    	// sliding speed
    	speed : 500,
		
		// the minimum number of items to show.
		// when we resize the window, this will make sure minItems are always shown
		// (unless of course minItems is higher than the total number of elements)
		minItems : 3,
	
		// index of the current item (left most item of the carousel)
		start : 0	
	});
    
    
    // Colorbox
    $('.group1').colorbox({rel:'group1', maxWidth:'90%', maxHeight:'90%'});
	$('.group2').colorbox({rel:'group2', maxWidth:'90%', maxHeight:'90%'});
    
    $('.impressum').colorbox({inline:true, maxWidth:'90%'});
    $('.moderatoren').colorbox({
        inline:true,
        width: '60%',
        innerHeight: '400px'
    });
    $('.disclaimer').colorbox({inline:true, maxWidth:'90%'});
    
});





// Signin with G+ init
(function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
})();


// own stuff, based on https://developers.google.com/+/quickstart/javascript
var helper = (function() {
  var BASE_API_PATH = 'plus/v1/';

  return {
    /**
     * Hides the sign in button and starts the post-authorization operations.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
      gapi.client.load('plus','v1', function(){
        if (authResult['access_token']) {
          $('#authOps').show();    
          $('#authOff').show();
          $('#gConnect').hide(); 
          $('#step0info').hide();
          helper.profile();
        } else if (authResult['error']) {
          // There was an error, which means the user is not signed in.
          // As an example, you can handle by writing to the console:
          console.log('There was an error: ' + authResult['error']);
          $('#authResult').append('Logged out');
          $('#authOps').hide(); 
          $('#authOff').hide();
          $('#gConnect').show();
        } 
        console.log('authResult', authResult);
      });
    },

    /**
     * Calls the OAuth2 endpoint to disconnect the app for the user.
     */
    disconnect: function() {
      // Revoke the access token.
      $.ajax({
        type: 'GET',
        url: 'http://accounts.google.com/o/oauth2/revoke?token=' +
            gapi.auth.getToken().access_token,
        async: false,
        contentType: 'application/json',
        dataType: 'jsonp',
        success: function(result) {
          console.log('revoke response: ' + result);
          $('#authOps').hide();
          $('#profile').empty();
          $('#authResult').empty();
          $('#gConnect').show();
          $('#step0info').show();
        },
        error: function(e) {
          console.log(e);
        }
      });
    },

    /**
     * Gets and renders the currently signed in user's profile data.
     */
    profile: function(){
	var request = gapi.client.plus.people.get( {'userId' : 'me'} );
	request.execute( function(profile) {
        if (profile.error) {
		  $('#profileerror').empty();
		  $('#profileerror').append(profile.error);
		  return;
        }
	    var gender = "unbekannt";
	    if (profile.gender == "female") {
		  gender = "Schlumpfine";
	    } else if (profile.gender == "male") {
          gender = "Schlumpf";
        }
        
        
        
	    $('#profileform').show();
	    $('#profilesubmitted').hide();
	    $('#DisplayNameLi').replaceWith(profile.displayName);
	    $('#DisplayNameInput').attr('value', profile.displayName);
	    $('#IdLi').replaceWith(profile.id);
	    $('#IdInput').attr('value', profile.id);
	    $('#GenderLi').replaceWith(gender);
	    $('#GenderInput').attr('value', gender);
	    $('#AgentnameInput').attr('value', profile.nickname);


	    if (typeof $.cookie('CodeWord') != 'undefined') {
            
    		$('#AgentnameInput').attr('value', $.cookie('AgentName'));
    		$('#EinsatzgebietInput').attr('value', $.cookie('Einsatzgebiet'));
            if ($('#AgentnameInput').val() == '' || $('#EinsatzgebietInput').val() == ''){
                $('#profileform').show();
  		        $('#profilesubmitted').hide();
            }else {
                $('#profileform').hide();
  		        $('#profilesubmitted').show();
            }
    		$('#DisplayNameSubmitted').replaceWith(profile.displayName);
    		$('#IdSubmitted').replaceWith(profile.id);
    		$('#GenderSubmitted').replaceWith(gender);
    		$('#AgentNameSubmitted').replaceWith($.cookie('AgentName'));
    		$('#EinsatzgebietSubmitted').replaceWith($.cookie('Einsatzgebiet'));
    		$('#CodeWord').replaceWith($.cookie('CodeWord'));
	    }
	});
	gapi.client.load('oauth2', 'v2', function() {
	    gapi.client.oauth2.userinfo.get().execute(function(response) {
		var email = "unbekannt";
		if (response.email) {
		    email = response.email;
		}
		$('#EmailLi').replaceWith(email);
		$('#EmailInput').attr('value', email);
		$('#EmailSubmitted').replaceWith(email);
	    }); 
	});
    }
  };
})();

/**
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
  helper.onSignInCallback(authResult);
}





function validate() {
    var validated = true;
    if (document.forms['agentdetails']['AgentName'].value == "") {
	alert("Bitte gib einen Agentennamen an!");
	validated = false;
    }
    if (document.forms['agentdetails']['Einsatzgebiet'].value == "") {
	alert("Bitte gib ein Einsatzgebiet an!");
	validated = false;
    }
    if (! validated) {
	if(event.preventDefault){
            event.preventDefault();
	}else{
	    event.returnValue = false; // for IE as dont support preventDefault;
	}
	return false;
    }

    $.cookie('AgentName', document.forms['agentdetails']['AgentName'].value, { expires: 999, path: '/' });
    $.cookie('Einsatzgebiet', document.forms['agentdetails']['Einsatzgebiet'].value, { expires: 999, path: '/' });
    

    return true;
}

function update() {
    $('#profileform').show();
    $('#profilesubmitted').hide();
	$('#Submit').attr('name', 'DataUpdate');
	$('<input name="DatenUpdate" type="hidden" id="DatenUpdate" value="1" />').prependTo($('#agentdetails'));
}