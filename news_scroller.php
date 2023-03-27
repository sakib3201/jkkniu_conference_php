<marquee direction="left" height="30px" style="font-size: 1.2em;" width="100%">
    <!-- <p class="text-bold p-0"> * All presented paper will be included in ICTBJ-2023 proceedings and <span class="fw-bolder">digitally published by</span> <span class="fw-bolder" style="color:darkred;"> Unipress Australia</span> <span class="fw-bolder"> * "Best paper award" </span> will be given to student author and professional author for each track. * </p> -->
    <?php
    $select_from_new_paper = "SELECT * FROM `news_scroller` ";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
    ?>

        <?php echo $details ?>
    <?php
    }
    ?>
</marquee>