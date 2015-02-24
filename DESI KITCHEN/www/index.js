function render() {
    gapi.signin.render('customBtn', {
      //'callback': 'signinCallback',
      'client_id=841077041629.apps.googleusercontent.com',
      'cookie_policy=single_host_origin',
      'request_visible_actions=http://schema.org/AddAction',
      'scope=https://www.googleapis.com/auth/plus.login',
      'redirect_uri=https://www.desikitchen.com/oauth2callback'
    });
  }
  $(document).ready(function() {
  $('#signInButton').click(function() {
    $(this).attr('href','https://accounts.google.com/o/oauth2/auth?scope=' +
      'https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.login&' +
      'state=generate_a_unique_state_value&' +
      'redirect_uri=https://www.desikitchen.com/oauth2callback&'+
      'response_type=token' +
      'client_id=44935268954-8sggkjjp0q2j9siocidgthr327auebff.apps.googleusercontent.com' +
      'access_type=offline');
      return true; // Continue with the new href.
  });
});

// This sample assumes a client object has been created.
// To learn more about creating a client, check out the starter:
//  https://developers.google.com/+/quickstart/javascript
var request = gapi.client.plus.people.get({
  'userId' : 'me'
});

request.execute(function(resp) {
  console.log('ID: ' + resp.id);
  console.log('Display Name: ' + resp.displayName);
  console.log('Image URL: ' + resp.image.url);
  console.log('Profile URL: ' + resp.url);
});