<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<!-- <?php include_once('header.php') ?> -->
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>
<?php include_once 'validate_server_side.php'; ?>
<?php include_once('mail_sending.php') ?>

<?php
if (isset($_POST['signup'])) {
    $data = $_POST;
    // print_r($data);
    // echo "<br><br>";
    $arr = validateData($conn, $data);
    // print_r($arr);
    extract($arr);
    // $hash_password = md5($password);
    if ($password === $confirm_password) {
        try {
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM author_information WHERE author_email = '$email'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                echo "<p class='text-danger text-bold text-center fs-4'>Email Already Exists</p>";
            } else {
                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                $receiver = $email;
                $subject = "Email verification";
                $body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                $send_mail = send_mail($receiver, $subject, $body);
                // echo ($receiver . " " . " " . $subject . " " . $body);

                $insert_data = "INSERT INTO `author_information`(`author_name`,`author_email`, `author_contact_no`,`author_password`,`verification_code`, `email_verified_at`) VALUES ('$name','$email','$contact','$encrypted_password','$verification_code',NULL)";
                $insert_query = mysqli_query($conn, $insert_data);
                if ($insert_query) {
                    // $_SESSION['verification_code'] = $verification_code;
                    header("Location: email-verification.php?email=" . $email);
                    exit();
                } else {
                    echo 'Data is not inserted yet!';
                }
            }
        } catch (Exception $e) {
            echo "Email is not sent yet!" . $e;
        }
    } else {
        echo 'Both passwords are not Matched';
    }
}
//  else {
//     echo 'Form is not submitted yet!';
// }
?>

<div class="container-fluid my-5 d-flex justify-content-center">
    <div class="col-md-5 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="return formData()">
                <h3 class="text-center">Sign Up</h3>
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" onkeyup="validateName()" required />
                    <span id="name_err" class="text-danger"></span>
                </div>

                <!-- <div class="mb-3">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Your Designation" onkeyup="validateName()" required />
                <span id="name_err" class="text-danger"></span>
            </div> -->

                <!-- <div class="mb-3">
                <label for="university">University Name</label>
                <input type="text" class="form-control" name="university" id="university" placeholder="Enter Your University Name" onkeyup="validateName()" required />
                <span id="name_err" class="text-danger"></span>
            </div> -->

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" onkeyup="validateEmail()" required />
                    <span id="email_err" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="contact">Contact No.</label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Your Contact Number" onkeyup="validateContact()" required />
                    <span id="contact_err" class="text-danger"></span>
                </div>
                <!-- <div class="mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Enter Your Country Name" onkeyup="validateName()" required />
                <span id="name_err" class="text-danger"></span>
            </div> -->
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" onkeyup="validatePassword()" required />
                    <span id="password_err" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Please Confirm Your Password" onkeyup="validateConfirmPassword()" required />
                    <span id="confirm_password_err" class="text-danger"></span>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary" name="signup">
                        Sign Up
                    </button>
                </div>
                <p class="forgot-password text-right mt-2">
                    Already have an account?
                    <a href="login.php">sign in?</a>
                </p>
            </form>
            <script src="validate_client_side.js"></script>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>