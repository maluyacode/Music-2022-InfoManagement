<?php
session_start();
include "../includes/header.php";
include "../includes/config.php";

if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php");
}

$result = mysqli_query($conn, "SELECT * FROM artists");
/*var_dump($result);*/
$num_rows = mysqli_num_rows($result);
/*var_dump($num_rows);*/

print "<a class='btn btn-primary' href='create.php' role='button'>add</a>";
print "<table class='table table-striped'>";
print "<tr>
                <th>Artists</th>
                <th>Artists Name</th>
                <th>Country</th>
                <th>Image</th>
                <th>Action</th>
               </tr>";

while ($row = mysqli_fetch_array($result)) {

    print "<tr>";
    print "<td>" . $row['artist_id'] . "</td>";
    print "<td>" . $row['name'] . "</td>";
    print "<td>" . $row['country'] . "</td>";
    print "<td><img src='../images/{$row['img_path']}' width='50' height='50'><td>";

    echo "<td><a href=edit.php?id={$row['artist_id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['artist_id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>";
}
print "</tr>";
print "</table>";

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="mb-3">
        <label for="artist" class="form-label">Search</label>
        <input type="text" class="form-control" id="name" name="artist">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</body>

</html>