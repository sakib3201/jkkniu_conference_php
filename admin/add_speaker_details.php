<?php ob_start(); ?>
<?php require_once("../database/connection.php") ?>
<?php include("admin_header.php") ?>
<!-- Name	University	Topic	email	Image	Status -->
<?php
if (isset($_POST['add_speaker'])) {
    extract($_POST);
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    $speaker_image_name = $_FILES['image']['name'];
    $speaker_image_tmp_name = $_FILES['image']['tmp_name'];
    // echo $speaker_image_tmp_name;
    $path_info = strtolower(pathinfo($speaker_image_name, PATHINFO_EXTENSION));
    echo $path_info;
    $speaker_image_name = time() . ".$path_info";
    $manuscript_pdf_file_type = $_FILES['image']['type'];
    // print_r($_FILES['manuscript_pdf']);


    $count_error = 0;
    $arr = array("jpg", "png", "jpeg");
    if (!in_array($path_info, $arr)) {
        $count_error++;
    }

    if ($count_error > 0) {
        echo "<p>Error occurs</p>";
    } else {
        $insert_sql = "INSERT INTO `speakers`(`speaker_name`,`speaker_university`,`speaker_topic`,`speaker_email`,`speaker_image`) VALUES('$name','$university','$topic','$email','$speaker_image_name')";
        $run_insert_qry = mysqli_query($conn, $insert_sql);
        if ($run_insert_qry) {
            move_uploaded_file($speaker_image_tmp_name, '../Images/speaker_images/' . $speaker_image_name);
            header("location: show_all_speakers.php");
            ob_end_flush();
        } else {
            echo "<p>No data is inserted</p>";
        }
    }
}
?>
<!--Code for adding new speakers-->
<div class="container-fluid  mt-5">
    <!-- <div class="row"> -->
    <div class="col">
        <h2 class="text-capitalize text-center">Add New Speaker</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <div class="card p-3 mb-5 shadow"> -->
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mt-3">
                <label for="university">University</label>
                <input type="text" name="university" id="university" class="form-control">
            </div>
            <div class="mt-3">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control">
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mt-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mt-3">
                <input type="submit" name="add_speaker" value="Add" class="btn btn-primary">
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>