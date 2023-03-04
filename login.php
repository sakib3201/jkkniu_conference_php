<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<?php include_once('validate_server_side.php') ?>
<!-- <?php include_once('header.php') ?> -->
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>

<?php
if (isset($_POST['login'])) {
    $data = $_POST;
    // print_r($data);
    // echo "<br><br>";
    $loginArr = validateLoginData($conn, $data);
    extract($loginArr);
    // check if credentials are okay, and email is verified
    $sql = "SELECT * FROM author_information WHERE author_email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        extract($user);
        if (password_verify($password, $author_password)) {
            // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            // echo $encrypted_password;
            $sql_pass = "SELECT * FROM author_information WHERE author_password='$author_password'";
            $result_pass = mysqli_query($conn, $sql_pass);

            if (mysqli_num_rows($result_pass) > 0) {

                // if (!empty($remember)) {
                //     setcookie("email", $email, time() + 3600);
                //     setcookie("password", $password, time() + 3600);
                // } else {
                //     setcookie("email", "");
                //     setcookie("password", "");
                // }
                // echo "<p>Your login logic here</p>";
                // if ($email && $password) {
                $_SESSION['author_id'] = $author_id;
                $_SESSION['author_name'] = $author_name;
                $_SESSION['author_email'] = $author_email;
                header("Location: author/index.php");
                exit();
            }
        } else {
            echo "<p>Invalid Password</p>";
        }
    } else {
        echo "<p>Invalid Email</p>";
    }
    // }
}
?>

<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-5 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="return loginFormData()">
                <h3 class="text-center">Login</h3>

                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" onkeyup="validateEmail()" required />
                    <span id="email_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" onkeyup="validatePassword()" required />
                    <span id="password_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <!-- <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /> <label for="remember-me">Remember me</label> -->
                        <!-- <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" />
                    <label class="custom-control-label" for="customCheck1">
                        Remember me
                    </label> -->
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary" name="login">
                        Login
                    </button>
                </div>
                <p class="forgot-password text-right mt-2">
                    <a href="forget_password.php">Forgot password?</a>
                </p>
                <p class="forgot-password text-right">
                    Do you have any account?
                    <a href="registration.php">sign up?</a>
                </p>
            </form>
            <script src="validate_client_side.js"></script>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>