<?php
/**
 * Created by PhpStorm.
 * User: tuomaju
 * Date: 27.11.2017
 * Time: 13.20
 */
session_start();
//require_once('config/config.php');
//SSLon();

/**
 * @param $profileId
 * @param $DBH
 * @return mixed
 * Palauttaa profiilin tiedot
 */
function getProfile($profileId, $DBH){
    try {
        $userdata = array('profileId' => $profileId);

        $STH = $DBH->prepare("SELECT * FROM p_profile WHERE profileUser = '$profileId'");
        $STH->execute($userdata);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();
        //var_dump( $row);
        return $row;
    } catch(PDOException $e) {
        echo "Profile get error";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}

/**
 * @param $profileId
 * @param $column
 * @param $value
 * @param $DBH
 * Vaihtaa profiiliin arvon value sarakkeeseen column
 */
function editProfile($profileId, $column, $value,  $DBH){
    try {
       // $userdata = array('profileId' => $profileId);

        $STH4 = $DBH->prepare("UPDATE p_profile SET $column = '$value' WHERE profileUser = '$profileId'");
        $STH4->execute();

    } catch(PDOException $e) {
        echo "Profile edit error.";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}
function getPost($postId, $DBH){
    try {
        $userdata = array('postId' => $postId);

        $STH = $DBH->prepare("SELECT * FROM p_post WHERE postId = $postId");
        $STH->execute($userdata);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();
        //var_dump( $row);
        return $row;
    } catch(PDOException $e) {
        echo "Post get error";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}

/**
 * @param $audio
 * @param $emoji1
 * @param $emoji2
 * @param $emoji3
 * @param $emoji4
 * @param $profileId
 * @param $DBH
 * insertaa postiin arvot
 */
function makePost($audio, $emoji1, $emoji2, $emoji3, $emoji4, $profileId, $DBH){
    try {
        // $userdata = array('profileId' => $profileId);
        $emoji10= json_encode($emoji1);
        $newEmoji1 = str_replace('\\','\\\\',$emoji10); // +1 backslash, että voi escapee

        $emoji20= json_encode($emoji2);
        $newEmoji2 = str_replace('\\','\\\\',$emoji20); // +1 backslash, että voi escapee

        $emoji30= json_encode($emoji3);
        $newEmoji3 = str_replace('\\','\\\\',$emoji30); // +1 backslash, että voi escapee

        $emoji40= json_encode($emoji4);
        $newEmoji4 = str_replace('\\','\\\\',$emoji40); // +1 backslash, että voi escapee

        $STH = $DBH->prepare("INSERT INTO p_post(
            audio,
            emoji1,
            emoji2,
            emoji3,
            emoji4,
            postProfile,
            score,
            postTime
        )
        VALUES(
            '$audio',
            '$newEmoji1',
            '$newEmoji2',
            '$newEmoji3',
            '$newEmoji4',
            $profileId,
            0,
            CURRENT_TIMESTAMP 
        );    
        ");
        $STH->execute();

    } catch(PDOException $e) {
        echo "Profile edit error.";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}


?>


