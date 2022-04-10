<?php
// update task.php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($dbConn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
    $result = mysqli_query($dbConn, $query);
    if(!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = "Task Updated Successfully";
    $_SESSION['message_type'] = "warning";
    header("Location: index.php");
}


?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card cad-body">
                <form action="update_task.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="<?php echo $title;?>" placeholder="newTitle" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="new Description"><?php echo $description?></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="update_task" id="save_task" value="update task">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>