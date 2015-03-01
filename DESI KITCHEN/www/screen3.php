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
  <head>
  <title>DesiKitchen</title>
  <link href="css/screen2.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <script src="js/index.js" async defer></script>
</head>
<body style="background:#F7CB71">
  <div id="top">
  <menu id="toolbar" type="toolbar">
    <menuitem label="File" class="arrow">
         <span class="helper"></span>
        <command onclick="goBack()" label="New..." />
        <script>
            function goBack() {
                window.history.back()
            }
        </script>
        <img onclick="goBack()" label="New..." src= "img/arrow.png">
    </menuitem>
    <a href = "screen2.php">
        <menuitem label="Home" class="home">
            <span class="helper"></span>
            <img src= "img/home.png">
        </menuitem>
    </a>
    <menuitem label="Help">
        <command href="help.html" label="Help"/>
        <command href="about.html" label="About"/>
    </menuitem>
    <a href="#openModal">
    <menuitem label="Plus" class="plus">
        <span class="helper"></span>
        <img src= "img/plus.png">
    </menuitem></a>
</menu>

</div>
<div id="inventorytable">
<?PHP


$dkuser = $_SERVER['QUERY_STRING'];

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

print "<span id='inventoryitems'>" . $db_field['ItemName'] . "<BR></span>";

}

mysql_close($db_handle);

}
else {

print "Database NOT Found ";
mysql_close($db_handle);

}

?>
</div>
</body>

<script>

$("body").html($("body").html().replace(/%20/g,'<b> </b>'));

</script>

<a href="screen2.php" class="myButton">Make My Meal!</a>
  <div id="openModal" class="modalDialog">
    <div>
      <a href="#close" title="Close" class="close">X</a>
      <h2>Add more items!</h2>
      <p>Here you can add more items to your inventory!</p>
      <p>You could do a lot of things here like have a pop-up ad that shows when your website loads, or create a login/register form for users.</p>
    </div>
  </div>
</html>