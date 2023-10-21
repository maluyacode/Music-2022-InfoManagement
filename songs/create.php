<?php
include("../includes/header.php");
include("../includes/config.php");

$result = mysqli_query($conn, "SELECT * FROM albums");

?>

<form action="store.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" placeholder="Song name" name="title">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="text" class="form-control" placeholder="Description" name="desc">
    </div>

    <div class="form-group">
        <label for="artist" class="form-label">Albums</label>
        <select class="form-select" id="" aria-label="Select Album" name="id">
            <option selected>Select Album</option>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value={$row['album_id']}>{$row['title']}</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a class='btn btn-outline-secondary' href='index.php' role='cancel;'>back<a>
</form>