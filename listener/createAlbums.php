<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
var_dump($_POST['albums'], $_SESSION);
if (isset($_POST['albums'])) {
    $album_ids = $_POST['albums'];
    // var_dump($album_ids);
    foreach ($album_ids as $album_id) {
        // echo $album_id;
        $sql1 = "INSERT INTO albums_listeners (listeners_listener_id,albums_album_id) VALUES({$_SESSION['listener_id']}, $album_id )";
        $result = mysqli_query($conn, $sql1);
    }
    unset($_POST);
    $_POST['albums'] = array();
    header("Location: albumList.php");
}
?>