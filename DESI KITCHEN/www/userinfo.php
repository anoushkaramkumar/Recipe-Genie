

<?php
    echo "Hello World";
    echo "\n";
?>


<html>
<head>
    <title>DesiKitchen</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
      <link href="index.css" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
   <script src="index.js" async defer></script>
  </head>

  <div id="signinButton">
    <span class="label"></span>
    <div id="customBtn" class="customGPlusSignIn">
      <span  class="g-signin"
    data-callback="signinCallback"
    data-clientid="44935268954-8sggkjjp0q2j9siocidgthr327auebff.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schema.org/AddAction"
    data-scope="https://www.googleapis.com/auth/plus.login">
    <img style = "display: block;
      position: relative;
      margin: 0 auto;
      width: 98%;" src = "gmaillogin.png"></span>
      <span class="buttonText"></span>
    </div>
  </div>

<h1>User</h1>


<table style="width:100%">
  <tr>
    <td style = "width: 20%"><img src= "male-306408_640.png"></td>
    <td><a href = "screen2.php">Raj</a></td>    
  </tr>
</table>



<!-- google login -->



<?php
$me = $plus->people->get('me');
echo "Display Name: {$me['displayName']}\n";
echo "Image Url: {$me['image']['url']}\n";
echo "Url: {$me['url']}\n";
?>

<?php echo  "ID: {$me['id']}\n";?>

</body>
</html>