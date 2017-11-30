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

showPostsFull(11, $DBH);


?>


