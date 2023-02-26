<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Complete ecommerce site using MERN" />
    <Link rel="icon" type="image/x-icon" href="Images/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Here is the AOS CSS file  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <Link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <title>JKKNIU CONFERENCE</title>
    <!-- <style>
        body {
            height: auto;
        }
    </style> -->
</head>

<body>
    <header>
        <?php include_once('header.php') ?>
    </header>
    <section class="HomepageSection" id="HomeBanner">
        <?php include_once('home_banner.php') ?>
    </section>

    <section>
        <?php include_once('chief_patron.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="AboutEvent">
        <?php include_once('about_event.php') ?>
    </section>

    <section class="HomepageSection mt-5 text-center" id="Countdown">
        <?php include_once('count_down.php') ?>
    </section>

    <section class="HomepageSection mt-5 text-center" id="Speakers">
        <?php include_once('speakers.php') ?>
    </section>

    <section class="HomepageSection mt-5 text-center" id="Committee">
        <?php include_once('committee.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="CallForPaper">
        <?php include_once('call_for_paper.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="GuideLines">
        <?php include_once('guidelines.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="ImportantDates">
        <?php include_once('important_dates.php') ?>
    </section>

    <section class="HomepageSection mt-5" id="Schedule">
        <?php include_once('schedule.php') ?>
    </section>

    <section>
        <?php include_once('event_venue.php') ?>
    </section>

    <footer class="pt-5 mt-5 pb-1 bg-dark text-light" data-aos="fade-up">
        <?php include_once('footer.php') ?>
    </footer>

    <!-- Here we hook our AOS JS file  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Activate AOS Library -->
    <script>
        AOS.init();
    </script>
</body>
</body>

</html>