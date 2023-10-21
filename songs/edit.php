<?php
    include("../includes/header.html");
    include("../includes/config.php");
    $result = mysqli_query($conn, "SELECT a.album_id, s.song_id, s.title AS songtitle, s.description, a.title AS albumtitle 
    FROM albums a INNER JOIN songs s ON (a.album_id = s.albums_album_id) WHERE song_id = $_GET[id]");
    $row = mysqli_fetch_assoc($result);
    //  print_r($artist);
    $res = mysqli_query($conn, "SELECT title FROM albums WHERE album_id != {$row['album_id']}");
?>

<form action="update.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" placeholder="Song name" name="title" value="<?php echo $row['songtitle'];?>">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="text" class="form-control" placeholder="Description" name="desc" value="<?php print $row['description'];?>">
    </div>

    <div class="form-group">
        <label for="artist" class="form-label">Albums</label>
        <select class="form-select" id="" aria-label="Select Album" name="id" readonly value="<?php echo $row['albumtitle'];?>">
            <option selected>Select Album</option>
            <?php
            echo "<option value={$row['song_id'] } selected>{$row['albumtitle']}</option>";
            while ($rows = mysqli_fetch_assoc($res)) {  
                echo "<option value={$rows['album_id']}>{$rows['title']}</option>";
            }
            ?>
        </select>
    </div>
    <input type="hidden" id="songId" name="songId" value="<?php echo $row['song_id']; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class='btn btn-outline-secondary' href='index.php' role='cancel;'>back<a>
</form>

<?php
include("../includes/footer.php");
?>