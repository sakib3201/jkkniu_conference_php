<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<?php include_once('header.php') ?>

<?php
if (isset($_POST['signup'])) {
    extract($_POST);
    echo $name;
    if ($password === $confirm_password) {
        $insert_data = "INSERT INTO `author_information`(`author_name`,`author_designation`, `author_university_name`, `author_email`, `author_contact_no`, `author_country`,`author_password`) VALUES ('$name','$designation','$university','$email','$contact','$country','$password')";
        $insert_query = mysqli_query($conn, $insert_data);

        if ($insert_query) {
            header('location: index.php');
        } else {
            echo 'Data is not inserted yet!';
        }
    } else {
        echo 'Both passwords are not Matched';
    }
} else {
    echo 'Form is not submitted yet!';
}
?>

<div class="container my-5">

    <div class="card rounded m-auto py-4 px-5 shadow" style="width: 40%">
        <form action="" method="post">
            <h3 class="text-center">Sign Up</h3>

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required />
            </div>

            <div class="mb-3">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Your Designation" required />
            </div>

            <div class="mb-3">
                <label for="university">University Name</label>
                <input type="text" class="form-control" name="university" id="university" placeholder="Enter Your University Name" required />
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" required />
            </div>
            <div class="mb-3">
                <label for="contact">Contact No.</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Your Contact Number" required />
            </div>
            <div class="mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Enter Your Country Name" required />
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required />
            </div>
            <div class="mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Please Confirm Your Password" required />
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
    </div>
</div>
<?php include_once('footer.php') ?>