<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");

// $userID = $_SESSION['user_id'] ? $_SESSION['user_id'] : null;

if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}
$sql = "SELECT l.listener_id FROM users u INNER JOIN listeners l ON (u.user_id = l.users_user_id) WHERE u.user_id = {$_SESSION['user_id']} LIMIT 1";

$query = mysqli_query($conn, $sql);

$listener = mysqli_fetch_assoc($query);

$listener_id = $listener['listener_id'];

$_SESSION['listener_id'] = $listener_id;

$sql2 = "SELECT * FROM listeners l INNER JOIN albums_listeners al ON (l.listener_id = al.listeners_listener_id) INNER JOIN albums a ON (a.album_id = al.albums_album_id)  INNER JOIN artists ar ON (ar.artist_id = a.artists_artist_id) WHERE l.listener_id = {$listener_id}";
$myAlbums = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM albums al INNER JOIN artists ar ON (al.artists_artist_id = ar.artist_id)";
$albums = mysqli_query($conn, $sql3);

?>

<!-- <div class="container-fluid container-lg">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Album Name</th>
                <th>Artist Name</th>
            </tr>
        </thead>
    </table>
</div> -->

<center>
    <?php
    // $test = 9;
    // $try = 0;
    // $row = mysqli_fetch_assoc($albums);
    while ($row = mysqli_fetch_assoc($albums)) {

        print '<div class="home card p-3">';
        print '<div class="d-flex justify-content-between align-items-center ">';
        print '<div class="mt-2">';
        print "<h4 style='text-align: center;' class='text-uppercase cent'> {$row['title']}</h4>";
        print  "      <center> <a href='albumdetails.php?album_id={$row['album_id']}'><img class=hov src='../images/{$row['imgs']}'></a></center>";
        print  '           <div style="margin-top: 10px;">';
        print  "          <h6 class='text-uppercase mb-0'>BY<br>{$row['name']}</h6>";
        print  '          </div>';
        print  '</div>';
        print  '</div>';
        print  '</div>';
    }

    ?>
</center>

<?php
include("../includes/footer.php");
?>