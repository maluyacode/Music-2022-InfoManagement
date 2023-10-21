<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_passwd = "";
    $db_name = "db_music";

    $conn = new mysqli($db_host, $db_username, $db_passwd, $db_name) or die ("Could not connect!\n");

    $sql = mysqli_query($conn, "SELECT * FROM songs");
    while($result = mysqli_fetch_assoc($sql)){
        echo $result['title'] . "<br>";
    }
    
?>