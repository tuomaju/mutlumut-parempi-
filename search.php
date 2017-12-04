<?php
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 4.12.2017
 * Time: 15.44
 */
session_start();
include_once ("config/config.php");
include_once ("functions.php");
?>

<form method="post" action="tosiIndex.php">
    <input type="text" name="emojiSearch" placeholder="anna emoji">
    <input type="submit" value="Hae 🔍">
</form>
