<?php
/**
 * Created by PhpStorm.
 * User: Tume
 * Date: 10/12/2017
 * Time: 17:31
 */


echo getProfile($_SESSION['profileId'], $DBH)->profileName;
echo '<br>';
echo '<img class="profileimg" src="' . getProfile($_SESSION['profileId'], $DBH)->img .  '">';
echo '<br>';
echo 'Suosio: '. getProfileScore($_SESSION['profileId'], $DBH)[0];
?>