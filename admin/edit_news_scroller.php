<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // select paper information
    $select_from_new_paper = "SELECT * FROM news_scroller WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    // $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <!--Code for adding new news_scroller-->
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <!-- <div class="row"> -->
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit News Scroller Details</h2>
                <form action="update_news_scroller.php" method="post" enctype="multipart/form-data">
                    <!-- <div class="card p-3 mb-5 shadow"> -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc">Details</label>
                        <textarea name="long_desc" id="long_desc"><?php echo $details ?></textarea>
                        <!-- <input type="text" name="details" id="details" class="form-control summernote" placeholder="Enter your news_scroller details" required> -->
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_news_scroller" value="Edit" class="btn btn-primary">
                    </div>
                    <!-- </div> -->
                </form>
            </div>
        </div>
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data found</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>