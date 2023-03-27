<h2 class="text-uppercase fw-bold text-center" data-aos="fade-up"><span class="secondary_color">Honorable </span>Speakers</h2>


<div class="container" data-aos="fade-up-right">
    <?php
    $select_from_new_paper = "SELECT * FROM `speakers` ";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
    ?>
        <div class="row row-cols-1 row-cols-md-4 g-2 d-flex justify-content-center">
            <?php
            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                extract($row);
            ?>
                <div class="col-md-3">
                    <div class="card speaker_hover our-team">
                        <div class="picture">
                            <img src="Images/logo.png" class="card-img-top" alt="..." style="height:30vh; object-fit:contain;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title primary_color"><?php echo $speaker_name ?></h5>
                            <p class="card-text"><?php echo $speaker_university ?><br />
                                Speaking on <b class="secondary_color"><?php echo $speaker_topic ?></b></p>
                        </div>
                        <ul class="social">
                            <li>
                                <a class="facebook" href="#fb">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="#twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dribbble" href="#dribble">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <li>
                                <a class="linkedin" href="#linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>