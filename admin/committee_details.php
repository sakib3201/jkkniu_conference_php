<!--For displaying all Papers details-->
<!--Need to add sort by track,date and submission status-->
<?php include("admin_header.php") ?>

<!-- <a href="add_committee_details.php" class="btn btn-primary">Add Committee Member</a> -->

<div class="container-fluid mt-5">
    <h3 class="text-center text-secondary fw-bold">All Committee Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th width="20%">Name</th>
                            <th>University</th>
                            <th>Post</th>
                            <th>email</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // select paper information
                        $select_from_new_paper = "SELECT * FROM `committee` ";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        ?>
                            <tr>
                                <td><?php echo $serial_no; ?></td>
                                <td><?php echo $row['committee_name'] ?></td>
                                <td><?php echo $row['committee_university'] ?></td>
                                <td><?php echo $row['committee_topic'] ?></td>
                                <td><?php echo $row['committee_email'] ?></td>
                                <td><img src="../Images/committee_images/<?php echo $row['committee_image'] ?>" width='50px' height='50px'></td>
                                <!-- <td>
                                    <a href="edit_committee.php" class="btn btn-primary">Edit</a>
                                    <a href="remove_committee.php" class="btn btn-primary">Delete</a>
                                </td> -->
                            </tr>
                        <?php
                            $serial_no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("admin_footer.php") ?>