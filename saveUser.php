<?php
session_start();
require_once('config/config.php');

SSLon();

$userdata = unserialize($_SESSION['lomakedata']);  //sessiomuuttujasta taulukoksi


$email = $userdata['email'];
$username = $userdata['username'];
$pwd = $userdata['pwd'];
$placeholderImg = 'profile_images/placeholder2.jpg';
//var_dump( $userdata);
//var_dump($_SESSION['lomakedata']);

try {
    $STH = $DBH->prepare("SELECT * FROM p_user WHERE email= '$email' OR username='$username'");   //myös username tähän ettei samoja usernameja
    $STH->execute($userdata);
   // $row = $STH->fetch();  //??

    if($STH->rowCount() == 0){ //rekisteröidään
    $pwd = md5($userdata['pwd'].'&8gT');  //hashataan salasana suolalla
        try {
            $STH2 = $DBH->prepare("INSERT INTO p_user (username, email, pwd, admin)
            VALUES ('$username', '$email','$pwd', 0);");
                if($STH2->execute($userdata)){
                    try {
                        /*Jos käyttäjän tallennus onnistui asetetaan hänet loggautuneeksi
                        //eli kirjoitetaan käyttäjätiedot myös sessiomuuttujiin
                        $sql = "SELECT * FROM p_user WHERE userId = ".$DBH->lastInsertId().";";
                        $STH3 = $DBH->query($sql);
                        $STH3->setFetchMode(PDO::FETCH_OBJ);
                        //$user = $STH3->fetch(); //?  */
                        echo'jep';
                        try {
                            $STH4 = $DBH->prepare("INSERT INTO p_profile (img, score, profileUser, profileName)
                            VALUES ('$placeholderImg', 0,  ".$DBH->lastInsertId().", '$username')");
                            $STH4->execute();
                        }catch(PDOException $e){
                            echo'Profillia ei luotu';
                        }
                        //var_dump($STH4);
                        session_destroy();
                        redirect('index.php');  //Palaa heti index.php sivulle
                    } catch(PDOException $e) {
                        echo 'Käyttäjän tietojen hakuerhe';
                        file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 3:
                        '.$e->getMessage()."\n", FILE_APPEND);
                    }
                }
        }catch(PDOException $e) {
            echo 'Tietojen lisäyserhe';
            file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 2: '.$e->getMessage()."\n",
                FILE_APPEND);
        }
    }else{
            echo 'Käyttäjä on jo olemassa.';
            echo '<a href="register.php">Takaisin</a>';
        }
} catch(PDOException $e) {	echo 'Tietokantaerhe.';
    file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 1: '.$e->getMessage()."\n", FILE_APPEND);
}
?>
