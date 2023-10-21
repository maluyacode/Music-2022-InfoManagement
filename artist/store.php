<?php

include "../includes/config.php";

$name =$_POST['name'];
$country =$_POST['country'];

$filename = $_FILES["img_path"]["name"];
// echo $filename;
$tempname = $_FILES["img_path"]["tmp_name"];
$folder = "../images/" . $filename;

print_r($_POST['country']);
$sql = "INSERT INTO artists (name,country,img_path) VALUES ('$name','$country','$filename')";
print $sql;
$result = mysqli_query($conn,$sql);

if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}
if($result) {
    header("Location: profile.php");
}

if ($result )
{
    header("Location: index.php");
}
else
{
    echo mysqli_error($conn);
}
?>