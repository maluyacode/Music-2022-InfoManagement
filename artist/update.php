<?php

    include("../includes/config.php");
    $filename = $_FILES["artistImage"]["name"];
    // echo $filename;
    $tempname = $_FILES["artistImage"]["tmp_name"];
    $folder = "../images/" . $filename;
    print_r($_POST);
    $result = mysqli_query($conn, "UPDATE artists SET name='{$_POST['artistName']}', country =  '{$_POST['country']}', img_path = '$filename' WHERE artist_id = {$_POST['artistId']}");
    
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    if($result) {
        header("Location: index.php");
    }
    
?>