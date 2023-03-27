<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_POST['add_news_scroller'])) {
    extract($_POST);
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);

    $insert_sql = "INSERT INTO `news_scroller`(`title`,`details`) VALUES('$title','$long_desc')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_news_scroller.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
    }
}
?>
<!--Code for adding new speakers-->
<div class="container-fluid  mt-5 d-flex justify-content-center">
    <!-- <div class="row"> -->
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">Add News Scroller</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter your news scroller title" required>
            </div>
            <div class="mt-3">
                <label for="long_desc">Details</label>
                <textarea name="long_desc" id="long_desc" required></textarea>
                <!-- <input type="text" name="details" id="details" class="form-control summernote" placeholder="Enter your news_scroller details" required> -->
            </div>
            <div class="mt-3">
                <input type="submit" name="add_news_scroller" value="Add" class="btn btn-primary">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>