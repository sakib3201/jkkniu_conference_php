<?php include("admin_header.php") ?>
<!-- <?php include_once 'functions/getImage.php'; ?> -->
<?php
if (isset($_POST['edit_speaker'])) {
    extract($_POST);
    // print_r($_POST);
    // print_r($_FILES);
    if (isset($_FILES['image'])) {
        $speaker_image_name = $_FILES['image']['name'];
        $speaker_image_tmp_name = $_FILES['image']['tmp_name'];
        // echo $speaker_image_tmp_name;
        $path_info = strtolower(pathinfo($speaker_image_name, PATHINFO_EXTENSION));
        // echo $path_info;
        $speaker_image_name = uniqid() . ".$path_info";
        $manuscript_pdf_file_type = $_FILES['image']['type'];
        // print_r($_FILES['manuscript_pdf']);


        $count_error = 0;
        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            $count_error++;
        }

        if ($count_error > 0) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Error occurs</p>";
        } else {
            unlink('../Images/speaker_images/' . $current_image);
            $update_sql = "UPDATE `speakers` SET `speaker_name`='$name',`speaker_university`='$university',`speaker_topic`='$topic',`speaker_email`='$email',`speaker_image`='$speaker_image_name' WHERE speaker_id='$id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($speaker_image_tmp_name, '../Images/speaker_images/' . $speaker_image_name);
                header("location: show_all_speakers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
            }
        }
    }
}
