<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>
<?php
if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // mark email as verified
    $sql = "UPDATE author_information SET email_verified_at = NOW() WHERE author_email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result  = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0) {
        die("Verification code failed.");
    }

    echo "<p>You can login now.</p>";
    echo "<a href='login.php' class='btn btn-primary'>Login</a>";
    exit();
}

?>

<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />

    <input type="submit" name="verify_email" value="Verify Email">
</form>
<?php include_once('footer.php') ?>