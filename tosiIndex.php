<?php
session_start();
include_once('functions.php');
include_once ('config/config.php');
$_SESSION['search']='';
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
<body class="tumma">
<h1>
    tumultum
</h1>
<?php
    if($_SESSION['kirjautunut']=='yes'){
        echo '<button><a href="editProfile.php">👤</a></button>';      // hyvä funktio :) tekee hyvin =)
        echo '<br>';
        echo('<button><a href="logout.php">🚪</a></button>');
        echo '<br>';
        echo('<button><a href="makePost.php">🎙️</a></button>');
        echo '<br>';
        echo('<button><a href="search.php">🔍</a></button>');
        echo '<br>';
        echo('<button><a href="tosiIndex.php">♻</a></button>');
?>
<main>
    <ul id="posts">
        <!--
        <li>
            <?php /*
            $mystring= json_encode(🍑);
            $newstring = str_replace('\\','\\\\',$mystring); // +1 backslash, että voi escapee

            $muuttuva = getPost(3, $DBH)->emoji1;
            echo json_decode(''.$muuttuva.'');
            ?>
        </li>
        <li>
            <?php
                $profileId = $_SESSION['profileId'];
               // makePost('posts/testi1.mp3', '😂', '🔥','🐻','🍑', $profileId, $DBH); //tää toimii ;^) (ihan oikeesti ( ei oo läppä ))
                echo decodeEmoji(5, 'emoji1',$DBH);
            ?>
        </li>
        <li>
            <?php
                echo '<img class="profileimg" src=" '.getPost(8, $DBH)->audio.'">';
                echo decodeEmoji(8, 'emoji1', $DBH);
                echo decodeEmoji(8, 'emoji4', $DBH);
                echo decodeEmoji(8, 'emoji3', $DBH);
                echo decodeEmoji(8, 'emoji2', $DBH);
            */?>
        </li>
        -->
        <?php
            if($_POST['emojiSearch']){
                $_SESSION['search'] = $_POST['emojiSearch'];
            }
            showPosts(getMaxId('postId', 'p_post', $DBH)[0],$_SESSION['search'], $DBH);
            $_SESSION['search']='';
                //var_dump(getMaxId($DBH));
                //echo getMaxId($DBH)[0];
        ?>
        <p id="demo"> asd </p>
    </ul>
</main>

<?php
    }else{
        echo'Olet kirjautunut ulos.';
        echo('<button><a href="index.php">Etusivulle</a></button>');

    }
?>
<script src="js/main.js"></script>
</body>
</html>