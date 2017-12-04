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
function getProfile($profileId, $DBH){   //profileid/userid???? mikä vitun juttu
    try {
        $userdata = array('profileId' => $profileId);

        $STH = $DBH->prepare("SELECT * FROM p_profile WHERE profileId= '$profileId'");
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
function editProfile($profileId, $column, $value,  $DBH){  //profileid/userid???? mikä vitun juttu :DDDDDDDDDDddddddddddDDDDDDDDDD
    try {
       // $userdata = array('profileId' => $profileId);

        $STH4 = $DBH->prepare("UPDATE p_profile SET $column = '$value' WHERE profileUser = '$profileId'");
        $STH4->execute();

    } catch(PDOException $e) {
        echo "Profile edit error.";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}


/**
 * @param $postId
 * @param $DBH
 * @return mixed
 * hakee postista kaiken
 */
function getPost($postId, $emoji, $DBH){
    try {
        $userdata = array('postId' => $postId);

        $STH = $DBH->prepare("SELECT * FROM p_post WHERE postId = $postId AND (emoji1 $emoji OR emoji2  $emoji OR emoji3  $emoji OR emoji4 $emoji)"); //
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
 * @param $emoji
 * @return mixed
 * +1 backslash
 */
function encodeEmoji($emoji){
    $placeholder= json_encode($emoji);
    $strReplace = str_replace('\\','\\\\',$placeholder);
    return $strReplace;
}

function encodeEmoji2($emoji){
    $placeholder= json_encode($emoji);
    $placeholder2 = str_replace('\\','\\\\',$placeholder);
    $strReplace = str_replace('"','\\"',$placeholder2);
    return $strReplace;
}

/**
 * @param $postId
 * @param $emoji
 * @param $DBH
 * @return mixed
 * hakee ja palauttaa emojin
 */
function decodeEmoji($postId, $emoji, $DBH){
    $muuttuva = getPost($postId,'IS NOT NULL', $DBH)->$emoji;
    return json_decode(''.$muuttuva.'');
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

        $newEmoji1 = encodeEmoji($emoji1);
        $newEmoji2 = encodeEmoji($emoji2);
        $newEmoji3 = encodeEmoji($emoji3);
        $newEmoji4 = encodeEmoji($emoji4);

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

/**
 * @param $DBH
 * @return mixed
 * palauttaa isoimman
 */
function getMaxId($id, $table, $DBH){
    $STH = $DBH->prepare("SELECT MAX($id) FROM $table");
    $STH->execute();
    $row = $STH->fetch();
    return $row;
}

function jokuFunktio(){


}


/**
 * @param $luku
 * @param $DBH
 * Näyttää 20 uusinta postaukset
 */
function showPosts($luku, $search, $DBH){
    if(!$search) {
        for ($j = $luku - 20; $j <= $luku; $j++) {       //joku bittijuttu et tulee negatiiviset yli ??  VOIS kans järjestää post timella
            if (getPost($j, 'IS NOT NULL', $DBH)) {
                $asd = getPost($j, 'IS NOT NULL', $DBH)->postProfile;
                echo '<br>';
                echo '<li class="posts oranssi">';
                // echo 'tiedosto: ' . getPost($j, $DBH)->audio;
                //   echo '<br>';
                echo '<header>';
                echo '<img class="profileimg" src="' . getProfile($asd, $DBH)->img . '">';
                echo getProfile($asd, $DBH)->profileName;
                echo ' ' . getPost($j, 'IS NOT NULL', $DBH)->postTime;
                echo '</header>';
                echo '<br>';
                echo '<audio controls> <source src="' . getPost($j, 'IS NOT NULL', $DBH)->audio . '"></audio>';
                // echo '<button class="playBtn">></button>';
                echo '<br>';
                echo '<div class="emojiContainer">';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji1', $DBH) . '</p>';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji2', $DBH) . '</p>';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji3', $DBH) . '</p>';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji4', $DBH) . '</p>';
                echo '</div>';
                //  echo '<br>';
                //  echo 'j: ' . $j;
                //   echo '<br>';
                //  echo 'profile id: ' . getPost($j, $DBH)->postProfile;

                //  echo '<br>';
                // echo 'user id' . getProfile($asd, $DBH)->profileUser;

                echo '<br>';

                //   echo '<br>';

                // echo '<br>';

                // echo '<br>';
                // echo '<a id="'.$j.'" href="fullPost.php">Full post</a>';
                echo '<form method="post" action="fullPost.php">';
                echo '<input type="text" hidden name="postId" value="' . $j . '">';
                echo '<input class="btn" type="submit" value="💬">';
                echo '</form>';
                echo 'post score: ' . getPost($j, 'IS NOT NULL', $DBH)->score;
                echo '</li>';


            }
        }
    }
    else{
        $search= '= "' . encodeEmoji2($search) .'"';
        for ($j = $luku - 20; $j <= $luku; $j++) {       //joku bittijuttu et tulee negatiiviset yli ??  VOIS kans järjestää post timella
            if (getPost($j, $search, $DBH)) {
                $asd = getPost($j, $search, $DBH)->postProfile;
                echo '<br>';
                echo '<li class="posts oranssi">';
                // echo 'tiedosto: ' . getPost($j, $DBH)->audio;
                //   echo '<br>';
                echo '<header>';
                echo '<img class="profileimg" src="' . getProfile($asd, $DBH)->img . '">';
                echo getProfile($asd, $DBH)->profileName;
                echo ' ' . getPost($j, $search, $DBH)->postTime;
                echo '</header>';
                echo '<br>';
                echo '<audio controls> <source src="' . getPost($j, $search, $DBH)->audio . '"></audio>';
                // echo '<button class="playBtn">></button>';
                echo '<br>';
                echo '<div class="emojiContainer">';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji1', $DBH) . '</p>';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji2', $DBH) . '</p>';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji3', $DBH) . '</p>';
                echo '<p class="vaalea">' . decodeEmoji($j, 'emoji4', $DBH) . '</p>';
                echo '</div>';
                //  echo '<br>';
                //  echo 'j: ' . $j;
                //   echo '<br>';
                //  echo 'profile id: ' . getPost($j, $DBH)->postProfile;

                //  echo '<br>';
                // echo 'user id' . getProfile($asd, $DBH)->profileUser;

                echo '<br>';

                //   echo '<br>';

                // echo '<br>';

                // echo '<br>';
                // echo '<a id="'.$j.'" href="fullPost.php">Full post</a>';
                echo '<form method="post" action="fullPost.php">';
                echo '<input type="text" hidden name="postId" value="' . $j . '">';
                echo '<input class="btn" type="submit" value="💬">';
                echo '</form>';
                echo 'post score: ' . getPost($j, $search, $DBH)->score;
                echo '</li>';


            }
        }
    }

}


/**
 * @param $postId
 * @param $DBH
 * näyttää kok kjutun
 */
function showPostsFull($postId, $DBH){
    echo '<li class="posts">';
    echo 'tiedosto: ' . getPost($postId,'IS NOT NULL', $DBH)->audio;
    echo '<br>';
    echo '<audio controls> <source src="'. getPost($postId,'IS NOT NULL', $DBH)->audio .'"></audio>';
    echo '<br>';
    echo '<div class="emojiContainer">';
    echo '<p>' . decodeEmoji($postId, 'emoji1', $DBH) . '</p>';
    echo '<p>' . decodeEmoji($postId, 'emoji2', $DBH) . '</p>';
    echo '<p>' . decodeEmoji($postId, 'emoji3', $DBH) . '</p>';
    echo '<p>' . decodeEmoji($postId, 'emoji4', $DBH) . '</p>';
    echo '</div>';
    $profileId = getPost($postId,'IS NOT NULL', $DBH)->postProfile;
    echo '<br>';
    echo 'post score: ' . getPost($postId,'IS NOT NULL', $DBH)->score;
    echo '<br>';
    echo 'post time: ' . getPost($postId,'IS NOT NULL', $DBH)->postTime;
    echo '<br>';
    echo '<img class="profileimg" src="'. getProfile($profileId, $DBH)->img .'">';
    echo '<br>';
    echo 'Profile name: ' . getProfile($profileId, $DBH)->profileName;
    echo '</li>';
}

/**
 * @param $comment
 * @param $profileId
 * @param $postId
 * @param $DBH
 * laittaa sisään (kommentin)
 */
function insertComment($comment, $profileId, $postId, $DBH){
    try {
        $STH = $DBH->prepare("INSERT INTO p_comment(
          commentText,
          commentPost,
          commentProfile
        )VALUES(
          '$comment',
          '$postId',
          '$profileId'
        );
        ");
        $STH->execute();

    } catch(PDOException $e) {
        echo "Profile edit error.";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }
}

function getComment($postId, $commentId, $DBH){
    try {
        $userdata = array('postId' => $postId);

        $STH = $DBH->prepare("SELECT * FROM p_comment WHERE commentPost = $postId AND commentId = $commentId");
        $STH->execute($userdata);
       // $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();
        //var_dump( $row);
        return $row;
    } catch(PDOException $e) {
        echo "Post get error";
        file_put_contents('log/DBErrors.txt', 'Login: '.$e->getMessage()."\n", FILE_APPEND);
    }

}

function showComments($postId, $DBH){
    $luku = getMaxId('commentId' , 'p_comment' , $DBH)[0];
    for ($i = 1; $i <= $luku; $i++) {       //joku bittijuttu et tulee negatiiviset yli ??  VOIS kans järjestää post timella
        if (getComment($postId, $i, $DBH)) {
            echo '<br>';
            echo '<li>';
            echo '<header class="commentHeader">';
            echo '<img src=" '. getProfile(getComment($postId, $i, $DBH)[3], $DBH)->img . '">';
            echo '<a href="google.com">'.getProfile(getComment($postId, $i, $DBH)[3], $DBH)->profileName. '</a> ';
            echo getProfile(getComment($postId, $i, $DBH)[3], $DBH)->score;
            echo '</header>';
            echo '<p>' . getComment($postId, $i, $DBH)[1] . '</p>';

            echo '</li>';


        }
    }
}
?>


