<?php
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 1.12.2017
 * Time: 13.11
 */
session_start();
include_once ('config/config.php');
include_once ('functions.php');


echo $_POST['comment'];
insertComment($_POST['comment'], $_SESSION['profileId'], 11, $DBH);
redirect('fullPost.php');
?>