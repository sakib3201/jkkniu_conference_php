<?php include("admin_header.php") ?>
<?php
if (isset($_POST['edit_news_scroller'])) {
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
            echo $payment_status;

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
                    alert("A Mail is sent to author\'s email address");
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
}
