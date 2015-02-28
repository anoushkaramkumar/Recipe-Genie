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
<ul class="inventory" style="list-style-type:none; margin-left:-40px;">
  <li class="frsli">Milk</li>
  <li class="secli">Eggs</li>
  <li class="frsli">Milk</li>
  <li class="secli">Eggs</li>
  <li class="frsli">Milk</li>
  <li class="secli">Eggs</li>
</ul>
<div style="text-align:center;"><button type="submit" class="create">Make My Meal!</button></div>