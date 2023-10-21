<?php
session_start();
include("../includes/header.php ");

// if (!isset($_SESSION['user_id'])) {
//     $_SESSION['message'] = "please Login to access the page";
//     header("Location: ../user/login.php" );
// }

?>
<hr>
<div class="container-fluid container-lg">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>album Name</th>
                <th>Genre</th>
                <th>Date Released</th>
                <th>Rating</th>
            </tr>
        </thead>
        <?php
        include "../includes/config.php";
        $query = "SELECT s.*, AVG(reviews) as allreview FROM albums s INNER JOIN albums_listeners al ON (s.album_id = al.albums_album_id) WHERE album_id = {$_GET['album_id']}";
        $result =  mysqli_query($conn, $query);
    

        while ($row = mysqli_fetch_assoc($result)) {
            print "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['date_released'] . "</td>";
            echo "<td>" . $row['allreview'] . "</td>";
            print "</tr>";
        }

        ?>
    </table>
</div>
    <br><hr><hr><hr><br>
 <H3 align="center">Comments and Reviews</H3>
    <div class="container-fluid container-lg">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name of listener</th>
                <th>Comments</th>
                <th>Reviews</th>
            </tr>
        </thead>
        <?php
        include "../includes/config.php";
        // $result = mysqli_query($conn, "SELECT * FROM albums al INNER JOIN artists ar on (al.artists_artist_id = ar.artist_id) WHERE
        // album_id = {$_GET['album_id']}");
        $sql = "SELECT name, comment, reviews FROM albums a INNER JOIN albums_listeners al ON (a.album_id = al.albums_album_id) INNER JOIN listeners l ON (al.listeners_listener_id = l.listener_id) WHERE album_id = {$_GET['album_id']}";
        $result =  mysqli_query($conn, $sql);
    

        while ($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            print "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['comment'] . "</td>";
            echo "<td>" . $row['reviews'] . "</td>";
            print "</tr>";
        }

        ?>
    </table>
    </div>
    <hr>
<?php
include("../includes/footer.php");
?>