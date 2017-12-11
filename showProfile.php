<?php
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 5.12.2017
 * Time: 14.30
 */
session_start();
include_once ('config/config.php');
include_once ('functions.php');

$profileId = $_REQUEST['profileId'];
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
<body class="tumma">
<?php

echo '<div>';
echo 'Nimi: ' . getProfile($profileId, $DBH)->profileName;
echo '<br>';
echo '<img class="profileimg" src="' . getProfile($profileId, $DBH)->img .  '">';
echo '<br>';
echo 'Score : '.getProfileScore($profileId, $DBH)[0];
echo '<br>';
echo '<button class="btn"><a href="tosiIndex.php">↩</a></button>';
echo '</div>';

echo '<ul>';
    showProfilePosts($profileId ,$DBH);
echo '</ul>';

?>

</body>

