<?php
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 30.11.2017
 * Time: 13.37
 */

session_start();
include_once ('config/config.php');
include_once ('functions.php');

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
<br>
<main class="fullPostBox oranssi">
    <button class="btn"><a href="tosiIndex.php">↩</a></button>

    <ul>
        <?php
            if($_POST['postId']) {
                $_SESSION['postId'] = $_POST['postId'];
            }
            if(!$_SESSION['postId']){
                redirect('tosiIndex.php');
            }
            showPostsFull($_SESSION['postId'], $DBH); //$Id -> SESSION id

        ?>
    </ul>
    <br>
    <hr>
    <br>
    <ul id="comments">
        <?php
            showComments($_SESSION['postId'], $DBH);
        ?>
    </ul>

    <br>
    <hr>
    <?php
        echo'<textarea class="commentTextarea" name="comment" form="commentForm" cols="40" rows="5" placeholder="Sano jotain mukavaa :^)" maxlength="140">';
        echo'</textarea><!-- tähän regex -->';

        echo'<form id="commentForm" method="post" action="makeComment.php">';
            echo '<input type="text" hidden name="postId" value="'. $_SESSION['postId'] .'">';
            echo' <input class="btn" type="submit" value="➠">';
        echo'</form>';
     ?>
</main>
<br>
<script src="js/main.js"></script>
</body>
