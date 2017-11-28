<?php
session_start();
include_once('functions.php');
include_once ('config/config.php');
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KORVIAHIVELEVÄ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="vihrea">
<?php
if($_SESSION['kirjautunut']=='yes'){
    echo '<div>';
    echo 'Käyttäjätunnus: '.$_SESSION['username'];
    echo '<br>';
    echo 'Sähköposti: '.$_SESSION['email'];
    echo '<br>';
    echo '<a href="editProfile.php"><img src="' . getProfile($_SESSION['userId'], $DBH)->img .  '" ></a>';      // hyvä funktio :) tekee hyvin =)
    echo $_SESSION['userId'];
    echo $_SESSION['profileId'];
    echo('<button><a href="logout.php">Kirjaudu ulos</a></button>');
    echo '<br>';
    echo('<button><a href="makePost.php">Lisää ääni</a></button>');
    echo '</div>';
?>
<main>
    <ul id="posts">
        <li>
            <?php
            $mystring= json_encode(🍑);
            $newstring = str_replace('\\','\\\\',$mystring); // +1 backslash, että voi escapee

            $muuttuva = getPost(3, $DBH)->emoji1;
            echo json_decode(''.$muuttuva.'');
            ?>
        </li>
        <li>
            <?php
                $profileId = $_SESSION['profileId'];
                //makePost('posts/testi1.mp3', '🍑', '🍑','🍑','🍑', $profileId, $DBH); tää toimii ;^) (ihan oikeesti ( ei oo läppä ))
                $muuttuva = getPost(5, $DBH)->emoji1;
                echo json_decode(''.$muuttuva.'');  //tehään tästä funktio tästä decodauksesta!!
            ?>
        </li>
        <li>
            <?php
                $muuttuva = getPost(5, $DBH)->emoji2;
                echo json_decode(''.$muuttuva.'');
            ?>
        </li>
    </ul>
</main>

<?php
}
?>

</body>
</html>