<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");

if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}



$sql = "SELECT li.name as listener_name, li.address, li.img_path as img, a.title, a.genre, a.date_released, ar.name as artist_name
FROM listeners li LEFT OUTER JOIN albums_listeners al ON (li.listener_id = al.listeners_listener_id) 
LEFT OUTER JOIN albums a ON (a.album_id = al.albums_album_id) 
LEFT OUTER JOIN artists ar ON (ar.artist_id = a.artists_artist_id) 
WHERE users_user_id = {$_SESSION['user_id']}";

$result = mysqli_query($conn, "$sql");
$row = mysqli_fetch_assoc($result);
mysqli_data_seek($result, 0);


if (isset($_SESSION['successfully_login'])) {

  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      {$_SESSION['successfully_login']}
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
  unset($_SESSION['successfully_login']);
}

?>


<div class="card">
  <img src=<?php 
  print "'../images/{$row['img']}'"?>>
  <h1><?php print $row['listener_name'] ?></h1>
  <p class="title"><?php print $row['address'] ?></p>
</div>

<?php 
print "<div class='container'>";
print "<br>";
print "<h1 style = 'font-family:georgia,garamond,serif;font-size:30px;font-style:italic;'align='center'>
Your Album List</h1>";
print "<table border='1' class='table table-bordered'>";
print "<tr>
        <th style='text-align: center'>Title</th>
        <th style='text-align: center'>Genre</th>
        <th style='text-align: center'>Date Released</th>
        <th style='text-align: center'>Artist Name</th>
       </tr>";

while ($row = mysqli_fetch_array($result)){
    
    print "<tr>";
    print "<td style='text-align: center'>".$row['title']. "</td>";
    print "<td style='text-align: center'>".$row['genre']. "</td>";
    print "<td style='text-align: center'>".$row['date_released']. "</td>";
    print "<td style='text-align: center'>".$row['artist_name']. "</td>";
}
print "</tr>";
print "</table>";
print "</div>";
?>

