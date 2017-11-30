<?php
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 30.11.2017
 * Time: 13.51
 */

session_start();
include_once ('config/config.php');
include_once ('functions.php');

if($_POST['profileImg']) {
    editProfile($_SESSION['userId'], 'img', $_POST['profileImg'], $DBH);
}
if($_POST['profileName']) {
    editProfile($_SESSION['userId'], 'profileName', $_POST['profileName'], $DBH);
}
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
redirect('editProfile.php');

?>