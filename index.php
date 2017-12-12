<?php
    session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tumultum</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="tumma indexbody">
    <header class="indexheader">
        <h1>tumultum</h1>
    </header>
    <aside class="indexaside">
    </aside>
    <main class="indexmain">
        <form method="POST" action="loginConfirm.php" id="loginForm">
            <input class="indexform" type="text" name='username' placeholder="Käyttäjätunnus">
            <input class="indexform" type="password" name='pwd' placeholder="Salasana"><br>
            <div id="loginRegister">
                <input class="indexbtn sendCommentBtn vaalea" type="submit" name="loginButton" id="loginButton" value="Kirjaudu">
                <button class="indexbtn sendCommentBtn vaalea" ><a href="register.php">Rekisteröidy</a></button>
            </div>
        </form>
    </main>
    <aside class="indexaside">
    </aside>

</body>
</html>