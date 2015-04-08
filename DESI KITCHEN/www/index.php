
<html>
<head>
  <title>Recipe Genie</title>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">  
<script type="text/javascript">
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();
  </script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
      <link href="css/index.css" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
   <script src="js/index.js" async defer></script>
</head>
<body>
  <div id="gConnect">
    <h3 style="font-size:150%" id="welcome12">Welcome to Recipe Genie!</h3>
    <h4 style="font-size:100%" id="welcome12">Sign into Google to begin.</h4>
    <button class="g-signin"
        data-scope="https://www.googleapis.com/auth/plus.login"
        data-requestvisibleactions="http://schemas.google.com/AddActivity"
        data-clientId="44935268954-8sggkjjp0q2j9siocidgthr327auebff.apps.googleusercontent.com"
        data-accesstype="offline"
        data-callback="onSignInCallback"
        data-theme="dark"
        data-cookiepolicy="single_host_origin">
    </button>
  </div>
  <div id="authOps" style="display:none">

    <p style="display:none;">This data is retrieved client-side by using the Google JavaScript API
    client library.</p>
    <div id="profile"></div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div style="text-align:center;" class="signout"><button style="color:white; background-color:#E63E3E; padding:10px; border-radius:3px; box-shadow:none; border:none;" id="logout">Logout</button></div>
<script>
document.getElementById("logout").onclick = function() {signOut();}
function signOut() {
  gapi.auth.signOut;
  location.href="index.php";
}
</script>
</body>
<script type="text/javascript">
var helper = (function() {
  var authResult = undefined;

  return {
    /**
     * Hides the sign-in button and connects the server-side app after
     * the user successfully signs in.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
      $('#authResult').html('Auth Result:<br/>');
      for (var field in authResult) {
        $('#authResult').append(' ' + field + ': ' + authResult[field] + '<br/>');
      }
      if (authResult['access_token']) {
        // The user is signed in
        this.authResult = authResult;
        helper.connectServer();
        // After we load the Google+ API, render the profile data from Google+.
        gapi.client.load('plus','v1',this.renderProfile);
      } else if (authResult['error']) {
        // There was an error, which means the user is not signed in.
        // As an example, you can troubleshoot by writing to the console:
        console.log('There was an error: ' + authResult['error']);
        $('#authResult').append('Logged out');
        $('#authOps').hide('fast');
        $('#gConnect').show();
      }
      console.log('authResult', authResult);
    },
    /**
     * Retrieves and renders the authenticated user's Google+ profile.
     */
    renderProfile: function() {
      var request = gapi.client.plus.people.get( {'userId' : 'me'} );
      request.execute( function(profile) {
          $('#profile').empty();
          if (profile.error) {
            $('#profile').append(profile.error);
            return;
          }
          $('#profile').append(
              $('<div class="welcome"><h2 style="font-size: 100%; margin-bottom: 5px;">User</h2><p><img style= "width: 32%; margin:0" src=\"' + profile.image.url + '\"></p>' + '<a style="font-size: 100%;" href="screen3.php?' +  profile.displayName +'">' + profile.displayName + '</a></div><div class="swag" style="display:none"><br />Tagline: ' +
              profile.tagline + '<br />About: ' + profile.aboutMe + '</p></div>'));
          if (profile.cover && profile.coverPhoto) {
            $('#profile').append(
                $('<p><img src=\"' + profile.cover.coverPhoto.url + '\"></p>'));
          }
        });
      $('#authOps').show('slow');
      $('#gConnect').hide();
    },
    /**
     * Calls the server endpoint to disconnect the app for the user.
     */
    disconnectServer: function() {
      // Revoke the server tokens
      $.ajax({
        type: 'POST',
        url: window.location.href + '/disconnect',
        async: false,
        success: function(result) {
          console.log('revoke response: ' + result);
          $('#authOps').hide();
          $('#profile').empty();
          $('#visiblePeople').empty();
          $('#authResult').empty();
          $('#gConnect').show();
        },
        error: function(e) {
          console.log(e);
        }
      });
    },
    /**
     * Calls the server endpoint to connect the app for the user. The client
     * sends the one-time authorization code to the server and the server
     * exchanges the code for its own tokens to use for offline API access.
     * For more information, see:
     *   https://developers.google.com/+/web/signin/server-side-flow
     */
    connectServer: function() {
      console.log(this.authResult.code);
      $.ajax({
        type: 'POST',
        url: window.location.href + '/connect?state={{ STATE }}',
        contentType: 'application/octet-stream; charset=utf-8',
        success: function(result) {
          console.log(result);
          helper.people();
        },
        processData: false,
        data: this.authResult.code
      });
    },
    /**
     * Calls the server endpoint to get the list of people visible to this app.
     */
    people: function() {
      $.ajax({
        type: 'GET',
        url: window.location.href + '/people',
        contentType: 'application/octet-stream; charset=utf-8',
        success: function(result) {
          helper.appendCircled(result);
        },
        processData: false
      });
    },
    /**
     * Displays visible People retrieved from server.
     *
     * @param {Object} people A list of Google+ Person resources.
     */
    appendCircled: function(people) {
      $('#visiblePeople').empty();

      $('#visiblePeople').append('Number of people visible to this app: ' +
          people.totalItems + '<br/>');
      for (var personIndex in people.items) {
        person = people.items[personIndex];
        $('#visiblePeople').append('<img src="' + person.image.url + '">');
      }
    },
  };
})();

/**
 * Perform jQuery initialization and check to ensure that you updated your
 * client ID.
 */
$(document).ready(function() {
  $('#disconnect').click(helper.disconnectServer);
  if ($('[data-clientid="YOUR_CLIENT_ID"]').length > 0) {
    alert('This sample requires your OAuth credentials (client ID) ' +
        'from the Google APIs console:\n' +
        '    https://code.google.com/apis/console/#:access\n\n' +
        'Find and replace YOUR_CLIENT_ID with your client ID and ' +
        'YOUR_CLIENT_SECRET with your client secret in the project sources.'
    );
  }
});

/**
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
  helper.onSignInCallback(authResult);
}

var request = gapi.client.plus.people.get({
  'userId' : 'me'
});

</script>
<style>
.welcome {
    text-align:center;
}
</style>
<style>
a {
    color: #FF0066;
    text-decoration: none;
    font-size: 1.2em;
}

h2 {
    font-size: 2em;
}

img {
    border-radius: 50%;
    position: relative;
    text-align: center;
    margin: auto !important;
}

div#profile {
    display: block; float: left; width: 100%; height: 50%; top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(50%); position: relative;
}

#welcome12{
  font-size: 400%;
}
</style>

</html>

<?php include 'signin.php';?>

<?php 
$me = $plus->people->get('me');
print "ID: {$me['id']}\n";
print "Display Name: {$me['displayName']}\n";
print "Image Url: {$me['image']['url']}\n";
print "Url: {$me['url']}\n";?>