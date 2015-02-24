<body style="background:#F7CB71">
    <head>
    <title>DesiKitchen</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <script src="https://apis.google.com/js/client:platform.js" async defer></script>
          <link href="screen1.css" rel="stylesheet" type="text/css">
   <script src="index.js" async defer></script>
  </head>
<menu type="toolbar">
   <div id="top">
    <menu label="File">
        <command onclick="goBack()" label="New..." />
        <script>
            function goBack() {
                window.history.back()
            }
        </script>
    </menu>
    <a href = "screen2.php">
        <menu label="Home" style="z-index: 1; margin: 0 auto; position: relative;">
            <span class="helper"></span>
            <img src= "home.png" style="margin: auto; position: relative; display: block; width: 40px; z-index: 1;">
        </menu>
    </a>
    <menu label="Help">
        <command href="help.html" label="Help" />
        <command href="about.html" label="About" />
    </menu>
</menu>
</div>