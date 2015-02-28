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
    <menuitem label="Plus" class="plus">
        <span class="helper"></span>
        <img src= "img/plus.png">
    </menuitem>
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
<style>
#inventoryitems {
	line-height: 150px;
	display: block;
	vertical-align: middle;
	background: #FF9933;
	padding-left: 20px;
	font-size: 400%;
	font-family: Raleway;
}

#inventoryitems:nth-child(odd) {
	background: #FFFF99;
}

#inventorytable {
	display: inline-block;
	width: 100%;
	position: relative;
	background: white;
}
</style>
<a href="screen2.php" class="myButton">Make My Meal!</a>

<style>
.myButton {
	background-color:#ff9969;
	-moz-border-radius:42px;
	-webkit-border-radius:42px;
	border-radius:42px;
	border:3px solid #ffffff;
	cursor:pointer;
	color:#ffffff;
	font-family:Raleway;
	font-size:400%;
	padding:20px 26px;
	text-decoration:none;
	text-align: center;
	text-shadow:1px 1px 7px #400a03;
	position: relative;
	display: block;
	margin: auto;
	margin-top: 10px;
}
.myButton:hover {
	background-color:#452c1e;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>

</html>