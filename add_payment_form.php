<!-- <?php ob_start(); ?> -->
<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<!-- <?php include_once('header.php') ?> -->
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>
<?php include_once('mail_sending.php') ?>

<?php
if (isset($_POST['add_payment_form'])) {
    $matched = 0;
    if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
        if (strcmp($_SESSION['captcha'], $_POST['captcha']) != 0) {
            $status = "<p class='text-danger text-bold text-center fs-5 mt-3'>
        Entered captcha code does not match! 
        Kindly try again.</p>";
            $matched = 0;
        } else {
            $status = "<p class='text-success text-bold text-center fs-5 mt-3'>Your captcha code is matched.</p>";
            $matched = 1;
        }

        if ($matched === 1) {
            extract($_POST);
            if (isset($_FILES['image']['name'])) {
                $payment_form_image_name = $_FILES['image']['name'];
                $payment_form_image_tmp_name = $_FILES['image']['tmp_name'];
                $path_info = strtolower(pathinfo($payment_form_image_name, PATHINFO_EXTENSION));

                $payment_form_image_name = uniqid() . ".$path_info";
                $manuscript_pdf_file_type = $_FILES['image']['type'];

                $count_error = 0;
                $arr = array("jpg", "png", "jpeg");
                if (!in_array($path_info, $arr)) {
                    $count_error++;
                }

                if ($count_error > 0) {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Error occurs</p>";
                } else {
                    $sql = "SELECT * FROM new_paper WHERE paper_id='$paper_id'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if ($count > 0) {
                        $row = mysqli_fetch_assoc($result);
                        if (isset($row['paper_id']) && $paper_id == $row['paper_id']) {
                            $sql1 = "SELECT * FROM author_information WHERE author_id = $row[author_id]";
                            $result1 = mysqli_query($conn, $sql1);
                            $count1 = mysqli_num_rows($result1);
                            if ($count1 > 0) {
                                $row1 = mysqli_fetch_assoc($result1);
                                // extract($row1);

                                $sql2 = "SELECT * FROM payment_form WHERE paper_id = $paper_id";
                                $result2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($result2);
                                if ($count2 == 0) {

                                    $receiver = $row1['author_email'];
                                    $subject = "Payment Form Submission";
                                    $body = '<p>Your payment form is successfully submitted. You will get confirmation mail when our admin will approve your payment status.</p>';
                                    $send_mail = send_mail($receiver, $subject, $body);

                                    // if (!$send_mail) {
                                    //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Email is not sent yet!</p>";
                                    // }

                                    $insert_sql = "INSERT INTO `payment_form`(`paper_id`,`paper_title`,`author_name`,`author_address`,`author_country`,`author_category`,`payment_form_image`,`captcha`) VALUES('$paper_id','$paper_title','$author_name','$author_address','$author_country','$author_category','$payment_form_image_name','$captcha')";
                                    $run_insert_qry = mysqli_query($conn, $insert_sql);
                                    if ($run_insert_qry) {
                                        move_uploaded_file($payment_form_image_tmp_name, 'Images/payment_form_images/' . $payment_form_image_name);
                                        echo '<script>
                                        alert("A Mail is sent to your email address");
                                        </script>';
                                        echo "<p class='text-success text-bold text-center fs-5 mt-3'>Form is successfully submitted</p>";
                                        // break;
                                        //                                         echo '<script>
                                        // alert("A Mail is sent to your email address");
                                        // window.location.href="view_payment_form.php";
                                        // </script>';
                                        // header("location: view_payment_form.php");
                                        // ob_end_flush();
                                    } else {
                                        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
                                        // break;
                                    }
                                } else {
                                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Form is already submitted</p>";
                                    // break;
                                }
                            } else {
                                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Author is not found</p>";
                                // break;
                            }
                        } else {
                            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Paper ID is not found</p>";
                            // break;
                        }
                    } else {
                        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Paper is not found</p>";
                    }
                }
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
            }
        } else {
            echo $status;
        }
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">Add Payment Form</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="card shadow px-5 py-3">
                    <div class="mt-3">
                        <label for="paper_id"><b>Paper ID</b></label>
                        <input type="text" name="paper_id" id="paper_id" class="form-control" placeholder="Please Type Paper ID" required>
                    </div>
                    <div class="mt-3">
                        <label for="paper_title"><b>Paper Title</b></label>
                        <input type="text" name="paper_title" id="paper_title" class="form-control" placeholder="Please Type Paper Title" required>
                    </div>
                    <div class="mt-3">
                        <label for="author_name"><b>Author(s) Name: <span class="text-danger">*</span> <i class="text-danger">(If more than one author exists, then please separated these by ",")</i></b></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Please Type Author(s) Name" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="author_address"><b>Author(s) Address: <span class="text-danger">*</span> <i class="text-danger">(If more than one author exists, then please separated these by ",")</i></b></label>
                        <input type="text" name="author_address" id="author_address" class="form-control" placeholder="Please Type Author(s) Address" required>
                    </div>
                    <div class="mt-3">
                        <label for="author_country"><b>Author(s) Country: <span class="text-danger">*</span> <i class="text-danger">(If more than one author exists, then please separated these by ",")</i></b></label>
                        <input type="text" name="author_country" id="author_country" class="form-control" placeholder="Please Type Author(s) Country" required>
                    </div>
                    <div class="mt-3">
                        <label for="author_category"><b>Author(s) Category</b></label>
                        <select name="author_category" id="author_category" class="form-control">
                            <option value="">Please Select an option</option>
                            <option value="Student(International)">Student(International)</option>
                            <option value="Professional(International)">Professional(International)</option>
                            <option value="Student(Local)">Student(Local)</option>
                            <option value="Professional(Local)">Professional(Local)</option>
                            <option value="Student(JKKNIU)">Student(JKKNIU)</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="image"><b>Payment Receive Image</b></label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="captcha"><b>Enter Captcha</b></label><br />
                        <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha Code From Below Image" required />
                        <p class="mt-2">
                            <img src="captcha.php?rand=<?php echo rand(); ?>" id="captcha_image" />
                        </p>
                        <p>Can't read the image?
                            <a href='javascript: refreshCaptcha();'>click here</a>
                            to refresh
                        </p>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="add_payment_form" value="Add" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
        <script>
            function refreshCaptcha() {
                let img = document.images['captcha_image'];
                img.src = img.src.substring(
                    0, img.src.lastIndexOf("?")
                ) + "?rand=" + Math.random() * 1000;
            }
        </script>
    </div>
</div>

<?php include("footer.php") ?>