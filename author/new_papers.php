<?php include('author_header.php') ?>
<div class="container-fluid mt-5">
    <h3 class="text-center text-secondary fw-bold">Paper Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <!-- <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header"> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Paper Title</th>
                            <th>Authors</th>
                            <th>Track</th>
                            <th>File</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        // echo $_SESSION['author_id'];
                        $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `author_id` = '$_SESSION[author_id]'";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $row['paper_title'] ?></td>
                                    <td><?php echo $row['authors_name'] ?></td>
                                    <td><?php echo $row['track'] ?></td>
                                    <td><a href="document_for_manuscript/<?php echo $row['manuscript_pdf'] ?>"><?php echo $row['manuscript_pdf'] ?></a></td>
                                    <td><?php echo date('d-M-Y', strtotime($row['timestamps'])) ?></td>

                                    <td class="text-secondary fw-bold"><?php echo "New Submission" ?></td>

                                </tr>
                        <?php
                                $serial_no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<?php include('author_footer.php') ?>