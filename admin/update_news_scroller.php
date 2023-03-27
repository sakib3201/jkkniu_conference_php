<?php include("admin_header.php") ?>
<?php
if (isset($_POST['edit_news_scroller'])) {
    extract($_POST);
    // print_r($_POST);
    // print_r($_FILES);
    $update_sql = "UPDATE `news_scroller` SET `title`='$title',`details`='$long_desc' WHERE id='$id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_news_scroller.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
    }
}
