<?php
session_start();
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 28.11.2017
 * Time: 12.42
 */



?>

<fieldset>
    <form action="postConfirm.php" method="post" enctype="multipart/form-data">
        <input placeholder="sos" type="text" name="emoji1">
        <br>
        <input placeholder="sos" type="text" name="emoji2">
        <br>
        <input placeholder="sos" type="text" name="emoji3">
        <br>
        <input placeholder="sss" type="text" name="emoji4">
        <br>
        <input type="file" name="upload">
        <br>
        <input type="submit" value="Lähetä" name="submit">
    </form>
</fieldset>
