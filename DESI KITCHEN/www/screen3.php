<html>
<head>
  <title>Recipe Genie</title>
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
      <title>DesiKitchen</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
      <link href="css/index.css" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
   <script src="js/index.js" async defer></script>
</head>
<body>

<?PHP


$dkuser = $_SERVER['QUERY_STRING'];
print $dkuser. "<br>";

$user_name = "root";
$password = "root";
$database = "desikitchen";
$server = "localhost:8889";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

$SQL = "SELECT * FROM desikitchen.Inventory a, desikitchen.User b where a.ItemUser = b.UserID and b.Name = '$dkuser'";
$result = mysql_query($SQL);

while ( $db_field = mysql_fetch_assoc($result) ) {

print $db_field['ItemName'] . "<BR>";

}

mysql_close($db_handle);

}
else {

print "Database NOT Found ";
mysql_close($db_handle);

}

?>

</body>

<script>

$("body").html($("body").html().replace(/%20/g,'<b> </b>'));

</script>
</html>