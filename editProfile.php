<?php
session_start();
include_once ('config/config.php');
include_once ('functions.php');
echo '';



echo '<button><a href="tosiIndex.php">Valmis</a></button>';

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="sininen">

<?php
    echo '<div>';
    echo 'Käyttäjätunnus: ' . $_SESSION['username'];
    echo '<br>';
    echo 'Sähköposti: '.$_SESSION['email'];
    echo '<br><br>';
    echo 'Nimi: ' . getProfile($_SESSION['profileId'], $DBH)->profileName;
    echo '<br>';
    echo '<img class="profileimg" src="' . getProfile($_SESSION['profileId'], $DBH)->img .  '">';
    echo $_SESSION['userId'];
    echo $_SESSION['profileId'];
    echo '<br>';
    echo '</div>';

?>
<br>
<form method="POST" action="ediProfileConfirm.php">
    <input type="text" name="profileName" placeholder="Anna uusi nimi" maxlength="15">
    <br>
    <label class="editProfileLabel">
        <input class="editProfileInput" type="radio" name="profileImg" value="profile_images/placeholder.jpg">
        <img class="editProfileImg" src="profile_images/placeholder.jpg">
    </label>
    <label class="editProfileLabel">
        <input class="editProfileInput" type="radio" name="profileImg" value="profile_images/placeholder2.jpg">
        <img class="editProfileImg" src="profile_images/placeholder2.jpg">
    </label>
    <br>
    <label class="editProfileLabel">
        <input class="editProfileInput" type="radio" name="profileImg" value="profile_images/placeholder3.jpg">
        <img class="editProfileImg" src="profile_images/placeholder3.jpg">
    </label>
    <label class="editProfileLabel">
        <input class="editProfileInput" type="radio" name="profileImg" value="profile_images/placeholder4.jpg">
        <img class="editProfileImg" src="profile_images/placeholder4.jpg">
    </label>
    <br>
    <input class="btn" type="submit" value="Tallenna">
</form>


</body>
</html>