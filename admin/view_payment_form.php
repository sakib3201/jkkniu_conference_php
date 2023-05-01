<!-- <?php ob_start() ?> -->
<?php include("admin_header.php") ?>
<?php include("../mail_sending.php") ?>
<?php
if (isset($_POST['update'])) {
    extract($_POST);
    $sql = "SELECT * FROM new_paper WHERE paper_id='$paper_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        $sql1 = "SELECT * FROM author_information WHERE author_id = $row[author_id]";
        $result1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($result1);
        if ($count1 > 0) {
            $row1 = mysqli_fetch_assoc($result1);
            extract($row1);

            if ($payment_status == "1") {
                $receiver = $author_email;
                $subject = "Conference Joining Invitation";
                $body = '<p>Your payment form is successfully verified. You are invited to join our conference.. Thanks...</p>';
                $send_mail = send_mail($receiver, $subject, $body);
            }

            $update_sql = "UPDATE `payment_form` SET `payment_status`='$payment_status' WHERE id='$id'";
            $run_update_qry = mysqli_query($conn, $update_sql);
            if ($run_update_qry) {
                if ($payment_status == "1") {
                    echo '<script>
                    alert("A Mail is sent to your email address");
                    window.location.href="view_payment_form.php";
              </script>';
                } else {
                    echo '<script>
                        window.location.href="view_payment_form.php";
                  </script>';
                }
            }
            // header("location: view_payment_form.php");
            // ob_end_flush();
            // }
            else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
            }
        }
    }




    // extract($_POST);

    // $update_sql = "UPDATE `payment_form` SET `payment_status`='$payment_status' WHERE id='$id'";
    // $run_update_qry = mysqli_query($conn, $update_sql);
    // if ($run_update_qry) {
    //     header("location: view_payment_form.php");
    //     ob_end_flush();
    // } else {
    //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
    // }
}
?>
<div class="container-fluid mt-5">
    <h3 class="text-center text-secondary fw-bold">All Payment Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Paper Id</th>
                            <th>Paper Title</th>
                            <th>Author Name</th>
                            <th>Author Address</th>
                            <th>Author Country</th>
                            <th>Author Category</th>
                            <th>Image</th>
                            <th>Captcha</th>
                            <th>Payment Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM `payment_form` ";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $paper_id ?></td>
                                    <td><?php echo $paper_title ?></td>
                                    <td><?php echo $author_name ?></td>
                                    <td><?php echo $author_address ?></td>
                                    <td><?php echo $author_country ?></td>
                                    <td><?php echo $author_category ?></td>
                                    <td><img src="../Images/payment_form_images/<?php echo $payment_form_image ?>" width='50px' height='50px'></td>
                                    <td><?php echo $captcha ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <input type="hidden" name="paper_id" value="<?php echo $paper_id ?>">
                                            <select name="payment_status" id="payment_status" class="form-select" required>
                                                <option value="">Select an option</option>
                                                <option value="0" <?php if (isset($payment_status) && $payment_status === "0") {
                                                                        echo "selected";
                                                                    } ?>>Not Payed yet</option>
                                                <option value="1" <?php if (isset($payment_status) && $payment_status === "1") {
                                                                        echo "selected";
                                                                    } ?>>Payed
                                                </option>
                                            </select>
                                            <input type="submit" value="Update" name="update" class="btn btn-outline-primary mt-2">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="delete_payment_form.php?id=<?php echo $id ?>&&image=<?php echo $payment_form_image; ?>" class="btn btn-primary" onclick="return confirmSubmission()">Delete</a>
                                    </td>
                                </tr>
                        <?php
                                $serial_no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script>
                // function selectPaymentStatus() {
                //     const paymentStatus = document.getElementById("payment_status").value;
                //     if (paymentStatus == 1) {
                //         window.location.href = `update_payment_form.php?payment_status=${paymentStatus}`;
                //     }
                // }

                function confirmSubmission() {
                    return confirm(" Are you sure you want to confirm your submission?");
                }
            </script>
        </div>
    </div>
</div>

<?php include("admin_footer.php") ?>