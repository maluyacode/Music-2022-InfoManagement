<?php
    include("../includes/config.php");
    print_r($_POST);
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $albumID = $_POST['id'];

    $sql = "INSERT INTO songs (title, description, albums_album_id) VALUES('$title'," . "'$desc'," . "$albumID)";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        header("Location: index.php");
    }
    else {
        echo mysqli_error($conn);
    }
?>