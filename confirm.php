<?php
session_start();
include_once ('config/config.php');

$data = $_POST['data'];
//tallennetaan sessiomuuttujaan :)
$_SESSION['lomakedata'] = serialize($data);
//var_dump( $data);
//var_dump($_SESSION['lomakedata']);
//Ovatko email ja käyttis laillisia
if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    if(preg_match("/^[a-öA-Ö ]*$/",$data['username'])) {
        echo '<a href="saveUser.php">Tallenna</a>';
        echo '<br>';
        $_SESSION['laiton'] = '';
    }else {
        echo("<h3>LAITON KÄYTTÄJÄNIMESSÄ: <br />"
            .$data['username'] ."</h3>");
        $_SESSION['laiton'] = 'Laiton käyttätunnus';
        redirect('register.php');
    }
}else{
    echo("<h3>LAITON SÄHKÖPOSTIOSOITE: <br />"
        .$data['email']."</h3>");
    $_SESSION['laiton'] = 'Laiton sähköpostiosoite';
    redirect('register.php');
}
echo '<a href="register.php">Takaisin</a>';
?>
