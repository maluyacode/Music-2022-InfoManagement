<?php
include "../includes/header.php     ";
include "../includes/config.php";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="mb-3">
        <label for="artist" class="form-label">Search</label>
        <input type="text" class="form-control" id="name" name="album">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php
if (isset($_POST['submit']) && !empty($_POST['album'])) {
    
    $album = $_POST['album'];
    $sql = "SELECT s.song_id, s.title AS songtitle, s.description, a.title AS albumtitle 
        FROM albums a INNER JOIN songs s ON (a.album_id = s.albums_album_id) WHERE a.title LIKE '%$album%'";
    $result = mysqli_query($conn, $sql);
    /*var_dump($num_rows);*/
    print "<br>";
    $stitle = mysqli_fetch_assoc($result);
    echo "<h1>{$stitle['albumtitle']}</h1>";
    mysqli_data_seek($result, 0);
    print "<table class='table table-striped'>";
    print "<tr>
                <th>Title</th>
                <th>Description</th>
                <th>Album</th>
                <th>Action</th>
               </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        print "<tr>";
        print "<td>" . $row['songtitle'] . "</td>";
        print "<td>" . $row['description'] . "</td>";
        print "<td>" . $row['albumtitle'] . "</td>";
        echo "<td><a href=edit.php?id={$row['song_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['song_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
    }
    print "</tr>";
    print "</table>";
} else {
    $result = mysqli_query($conn, "SELECT s.song_id, s.title AS songtitle, s.description, a.title AS albumtitle 
        FROM albums a INNER JOIN songs s ON (a.album_id = s.albums_album_id)");
    /*var_dump($result);*/
    $num_rows = mysqli_num_rows($result);
    /*var_dump($num_rows);*/
    print "<br>
        <h2 align='center'>Songs</h2>
        <br>";
    print "<table class='table table-striped'>";
    print "<tr>
                <th>Title</th>
                <th>Description</th>
                <th>Album</th>
                <th>Action</th>
               </tr>";

    while ($row = mysqli_fetch_array($result)) {

        print "<tr>";
        print "<td>" . $row['songtitle'] . "</td>";
        print "<td>" . $row['description'] . "</td>";
        print "<td>" . $row['albumtitle'] . "</td>";
        echo "<td><a href=edit.php?id={$row['song_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['song_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
    }
}
print "<a class='btn btn-primary' href='create.php' role='button'>Add song</a>";
?>
</body>

</html>