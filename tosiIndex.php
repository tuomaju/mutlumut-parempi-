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
    <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="tumma">
<div id="profileModal" class="modal">
    <div class="modal-content profileModal oranssi">
        <span id="closeProfileModal" class="closeModal">&times;</span>
            <div id="searchAndProfile">
                <?php
                include "search.php";
                include "profile.php";
                echo('<button class="btn"><a href="logout.php">🚪</a></button>');
                ?>
            </div>
            <div id="editProfile">
                <?php
                include "editProfile.php";
                ?>
            </div>

        <button id = 'editProfileBtn'>Muokkaa</button>
    </div>
</div>

<div id="makePostModal" class="modal">
    <div class="modal-content makePostModal oranssi">
        <span id="closePostModal" class="closeModal">&times;</span>
        <div id="makePost">
            <?php
            include "makePost.php";
            ?>
        </div>
    </div>
</div>
<header id="stickyHeader" class="tumma">
    <img src="icons/menu.svg" id="openProfileModal">
    <a href="tosiIndex.php">
        <h1>tumultum</h1>
    </a>
    <img src="icons/menu2.svg" id="openMakePostModal">
</header>
    <?php
    if($_SESSION['kirjautunut']=='yes'){

?>

<aside></aside>
<main id="indexMain">
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

    </ul>
</main>
<aside></aside>
<?php
    }else{
        echo'Olet kirjautunut ulos.';
        echo('<button><a href="index.php">Etusivulle</a></button>');

    }
?>
<script src="js/main.js"></script>
</body>
</html>