<?php
    
    include("../includes/config.php");
    print_r($_POST);
    $result = mysqli_query($conn, " UPDATE songs SET title='{$_POST['title']}', description =  '{$_POST['desc']}', albums_album_id = '{$_POST['id']}' WHERE song_id = {$_POST['songId']}");
    if ($result) {
        header("Location: index.php");
    }
    
?>