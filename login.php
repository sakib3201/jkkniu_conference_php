<?php
session_start();
?>
<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<?php include_once('header.php') ?>

<?php
if (isset($_POST['login'])) {
    extract($_POST);
    $hash_password = md5($password);
    $sql = "SELECT * FROM author_information WHERE author_email='$email' && author_password='$hash_password'";
    $sql_qry = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sql_qry) > 0) {
        $row = mysqli_fetch_assoc($sql_qry);
        // $row1 = extract($row);
        // echo $id;
        $_SESSION['author_id'] = $row['id'];
        $_SESSION['author_name'] = $row['author_name'];
        // header("location: author/index.php");
?>
        <script>
            window.location = "./author/index.php";
        </script>
<?php
    } else {
        echo "Nothing";
    }
}
?>

<div class="container my-5">

    <div class="card rounded m-auto py-4 px-5 shadow" style="width: 40%">
        <form action="" method="post">
            <h3 class="text-center">Login</h3>

            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" />
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" />
            </div>

            <div class="mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" />
                    <label class="custom-control-label" htmlFor="customCheck1">
                        Remember me
                    </label>
                </div>
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary" name="login">
                    Login
                </button>
            </div>
            <p class="forgot-password text-right mt-2">
                <a href="/">Forgot password?</a>
            </p>
            <p class="forgot-password text-right">
                Do you have any account?
                <a href="registration.php">sign up?</a>
            </p>
        </form>
    </div>
</div>
<?php include_once('footer.php') ?>