<?php
session_start();
include_once ('config/config.php');
include_once ('functions.php');
echo '';

editProfile($_SESSION['userId'], 'img', 'profile_images/placeholder.jpg', $DBH);
/*
 * js
 * button.onClick= ()=>{
 *  my_var = ´<?php editProfile($_SESSION['userId'], 'img', '${jsMuuttuja}', $DBH); ?>;
 *  element.innerHTML = my_var
 * }
 *
 *
    let my_var = ´<?php editProfile($_SESSION['userId'], 'img', '${jsMuuttuja}', $DBH); ?>;



backup plan: jos ei js toimi, tehään omat tiedostot kaikille kuville
 */


echo '<button><a href="tosiIndex.php">Valmis</a></button>';

?>

