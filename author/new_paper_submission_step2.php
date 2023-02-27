<?php
include('author_header.php');
// include('mail_sending.php');
?>
<!-- Start of prvious php form (new_paper_submission) submission -->
<?php

if (isset($_SESSION['next_page']) && $_SESSION['next_page'] == 1) {
    $paper_title = $_SESSION['paper_title'];
    $paper_keyword = $_SESSION['paper_keyword'];
    $paper_abstract = $_SESSION['paper_abstract'];
    $paper_type = $_SESSION['paper_type'];
    $input_field_name = $_SESSION['input_field_name'];
    $input_field_affiliation = $_SESSION['input_field_affiliation'];
    $input_field_designation = $_SESSION['input_field_designation'];
    $input_field_email = $_SESSION['input_field_email'];
} else {
?>
    <script>
        window.location = "new_paper_submission.php";
    </script>
<?php
    exit();
}
?>
<!-- End of prvious php form (new_paper_submission) submission -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="container-fluid col-lg-10 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h3 class="text-center text-secondary fw-bold">New Paper Submission (<i>Step 2</i>)</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-2">
                                    <label for=""><b>Select Document For Manuscript: <span class="text-danger">*</span></b></label>
                                    <div class="input-group mt-2">
                                        <br>
                                        <input type="file" class="form-control" name="manuscript_pdf" required accept="application/pdf" id="manuscript_pdf" onchange="uploadManuscript()">
                                    </div>
                                </div>

                                <!-- Start of table for manuscript -->
                                <div class="col-lg-12 mt-2" style="display:none" id="table_for_manuscript">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Serial No:</th>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <th>Document Type:</th>
                                            <td>Manuscript</td>
                                        </tr>
                                        <tr>
                                            <th>File Size</th>
                                            <td id="manuscript_file_size"></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- End of table for manuscript -->
                                <p id="manuscript_pdf_error" class="text-warning bg-black text-center m-2 fw-bold "></p>

                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mt-2">
                                        <label for=""><b>Select Image For Paper: </b></label>
                                        <div class="input-group mt-2">
                                            <br>
                                            <!-- image/* mane hocche jekono typer image select kora jabe -->
                                            <input type="file" class="form-control" name="manuscript_image" accept="image/*" id="manuscript_image" onchange="uploadManuscriptImage()">
                                        </div>
                                    </div>

                                    <!-- table for image -->
                                    <div class="col-lg-12 mt-2" id="table_for_manuscript_image" style="display:none">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Serial No:</th>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <th>Document Type:</th>
                                                <td>Image</td>
                                            </tr>
                                            <tr>
                                                <th>File Size</th>
                                                <td id="manuscript_image_file_size"></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <p id="manuscript_image_error" class="text-warning bg-black text-center m-2 fw-bold "></p>

                                    <!-- End of table for image -->
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="mt-3">
                                    <input type="submit" name="submit" class="form-control btn btn-success fw-bold" value="Submit Paper">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</form>

<script>
    function uploadManuscript() {
        document.getElementById("table_for_manuscript").style = "display: block";
        let file_size = document.getElementById("manuscript_pdf").files[0].size;
        document.getElementById("manuscript_file_size").innerHTML = file_size + " bytes";

    }

    function uploadManuscriptImage() {
        document.getElementById("table_for_manuscript_image").style = "display: block";
        let file_size = document.getElementById("manuscript_image").files[0].size;
        document.getElementById("manuscript_image_file_size").innerHTML = file_size + " bytes";

    }
</script>
<?php
if (isset($_POST['submit'])) {
    $manuscript_pdf_file_name = $_FILES['manuscript_pdf']['name'];
    $manuscript_pdf_file_name = time() . ".pdf";
    $manuscript_pdf_file_type = $_FILES['manuscript_pdf']['type'];

    $manuscript_image_extn = "";

    $count_error = 0;
    if ($manuscript_pdf_file_type != "application/pdf") {
?>
        <script>
            document.getElementById("mauscript_pdf_error").innerHTML = "File Type Must Be PDF";
        </script>
    <?php
        $count_error++;
    }

    if (!empty($_FILES['manuscript_image']['name']) && $_FILES['manuscript_image']['type'] == "image/jpeg" || $_FILES['manuscript_image']['type'] == "image/jpg" || $_FILES['manuscript_image']['type'] == "image/png") {
        $manuscript_image_file_name = $_FILES['manuscript_image']['name'];
        // from this line i get the extension
        $manuscript_image_extn = pathinfo($_FILES['manuscript_image']['name'], PATHINFO_EXTENSION);

        $manuscript_image_file_name = time() . "." . $manuscript_image_extn;
    } else if (!empty($_FILES['manuscript_image']['name'])) {
    ?>
        <script>
            document.getElementById("manuscript_image_error").innerHTML = "Image Type Must Be jpeg/jpg/png !!";
        </script>
        <?php
        $count_error++;
    } else {
        $manuscript_image_file_name = "";
    }
    if ($count_error > 0) {
        exit();
    } else {
        $paper_id = time();

        $insert_qry = "INSERT INTO `new_paper`(`paper_id`, `author_id`,`paper_title`, `paper_abstract`, `paper_keywords`, `paper_type`, `authors_name`, `authors_affiliation`, `authors_designation`, `authors_email`, `manuscript_pdf`,`manuscript_image`, `paper_status`, `count`) VALUES ('$paper_id','$_SESSION[author_id]','$paper_title','$paper_abstract','$paper_keyword','$paper_type','$input_field_name','$input_field_affiliation','$input_field_designation','$input_field_email','$manuscript_pdf_file_name','$manuscript_image_file_name','1','1')";

        $run_insert_qry = mysqli_query($conn, $insert_qry);
        if ($run_insert_qry) {
            move_uploaded_file($_FILES['manuscript_pdf']['tmp_name'], 'document_for_manuscript/' . $manuscript_pdf_file_name);
            move_uploaded_file($_FILES['manuscript_image']['tmp_name'], 'image_for_paper/' . $manuscript_image_file_name);

            // sent mail
            // $receiver = $_SESSION['author_email'];
            // $subject = "New Paper Submission";
            // $body = '<h5>Dear Sir/Madam, <br />You have successfully submitted your new paper.Please check your paper status. <br /> <br /> Best Regards, JKKNIU Conference Organization</h5>';
            // $send_mail = send_mail($receiver, $subject, $body);

            $_SESSION['next_page'] = 0;
        ?>
            <script>
                window.alert("Your Paper Has Successfully Submitted");
                window.location = "new_papers.php";
            </script>
<?php
        }
    }
}
?>
<?php include('author_footer.php') ?>