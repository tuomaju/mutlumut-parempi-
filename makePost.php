<?php
session_start();
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 28.11.2017
 * Time: 12.42
 */



?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="punainen">
    <button><a href="tosiIndex.php">↩</a></button>
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
            <input type="file" accept="audio/*" capture="microphone" name="upload">
            <br>
            <input type="submit" value="Lähetä" name="submit">
        </form>
    </fieldset>
</body>

