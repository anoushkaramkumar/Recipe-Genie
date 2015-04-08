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
  <head>
  <title>DesiKitchen</title>
  <link href="css/screen2.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <script src="js/index.js" async defer></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script src="jquery.paulund_modal_box.js"></script>
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
    <a href="#" class="paulund_modal">
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

if(isset($_POST['item'])) {
  $itemname1 = $_POST['item'];

  $sql2 = "INSERT INTO desikitchen.Inventory (ItemName, ItemUser)
  VALUES ('{$itemname1}', '1')";
  $result = mysql_query($sql2);

}

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
$(document).ready(function(){
  $('.paulund_modal').paulund_modal_box();
});

$("body").html($("body").html().replace(/%20/g,'<b> </b>'));

</script>

<a href="screen2.php" class="myButton">Make My Meal!</a>

</html>