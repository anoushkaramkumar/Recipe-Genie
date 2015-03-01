<head>
  <title>DesiKitchen</title>
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
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
<form>
<ul class="inventory" style="list-style-type:none; margin-left:-40px;">
  <li class="frsli">Milk<input class="checkbox" type="checkbox"/></li>
  <li class="secli">Eggs<input class="checkbox" type="checkbox"/></li>
  <li class="frsli">Milk<input class="checkbox" type="checkbox"/></li>
  <li class="secli">Eggs<input class="checkbox" type="checkbox"/></li>
  <li class="frsli">Milk<input class="checkbox" type="checkbox"/></li>
  <li class="secli">Eggs<input class="checkbox" type="checkbox"/></li>
  <li class="frsli">Milk<input class="checkbox" type="checkbox"/></li>
  <li class="secli">Eggs<input class="checkbox" type="checkbox"/></li>
  <li class="frsli">Milk<input class="checkbox" type="checkbox"/></li>
  <li class="secli">Eggs<input class="checkbox" type="checkbox"/></li>
</ul>
<button type="submit" class="myButton">Add Ingredients</button>
</form>