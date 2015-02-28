<head>
  <title>DesiKitchen</title>
  <link href="css/screen2.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <link href="css/screen1.css" rel="stylesheet" type="text/css">
  <script src="js/index.js" async defer></script>
</head>
<body style="background:#F7CB71">
  <menu id="toolbar" type="toolbar">
   <div id="top">
    <menu label="File">
         <span class="helper"></span>
        <command onclick="goBack()" label="New..." />
        <script>
            function goBack() {
                window.history.back()
            }
        </script>
         <img onclick="goBack()" label="New..." src= "img/arrow.png" style="margin: 15px 0 0 25px; position: relative; display: block; width: 10%; z-index: 1;">
    </menu>
    <a href = "screen2.php">
        <menu label="Home">
            <span class="helper"></span>
            <img src= "img/home.png">
        </menu>
    </a>
    <menu label="Help">
        <command href="help.html" label="Help" />
        <command href="about.html" label="About" />
    </menu>
    <menu label="Plus">
        <span class="helper"></span>
        <img src= "img/plus.png">
    </menu>
</div>
</menu>
<table>
  <tr>
    <td class="fsttd">Milk</td>
  </tr>
  <tr>
    <td class="sndtd">Eggs</td>
  </tr>
  <tr>
    <td class="fsttd">Milk</td>
  </tr>
  <tr>
    <td class="sndtd">Eggs</td>
  </tr>
  <tr>
    <td class="fsttd">Milk</td>
  </tr>
  <tr>
    <td class="sndtd">Eggs</td>
  </tr>
  <tr>
    <td class="fsttd">Milk</td>
  </tr>
  <tr>
    <td class="sndtd">Eggs</td>
  </tr>
</table>
<button>