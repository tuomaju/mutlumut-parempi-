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
    <form action="postConfirm.php" method="post">
        <input type="text" name="datapost[emoji]">
        <br>
        <input type="file" name="datapost[audio]">
        <br>
        <input type="submit" value="Lähetä">
    </form>
</fieldset>
