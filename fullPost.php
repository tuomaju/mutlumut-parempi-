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

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="vihrea">
<button><a href="tosiIndex.php">Takaisin</a></button>

<?php
showPostsFull(11, $DBH);
?>
<br>
<hr>
<br>
<ul id="comments">
    <?php
        showComments(11, $DBH);
    ?>
</ul>

<br>
<hr>
<textarea class="commentTextarea" name="comment" form="commentForm" cols="40" rows="5" placeholder="Sano jotain mukavaa :^)" maxlength="140">
</textarea><!-- tähän regex -->
<form id="commentForm" method="post" action="makeComment.php">
    <input class="btn" type="submit" value="➠">
</form>
</body>
