<?php

include 'connection.php';
error_reporting(0);
$pos_id = $_GET['id'];


$sql = "SELECT * FROM EC_COMMITT_NAME WHERE POS_ID = $pos_id";
$parse = ociparse($conn, $sql);
oci_execute($parse);

// print_r($sql);
while ($row = oci_fetch_assoc($parse)) {
    $user_row[] = $row;
}

// var_dump($division);
// echo count($division);
oci_free_statement($parse);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <title> Bandhan'84, BUET </title>
    <link rel="icon" type="image/png" href="./uploads/buet.png" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="./theme/assets/vendor/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="./theme/assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./theme/assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="./theme/assets/vendor/animated-event-calendar/dist/simple-calendar.css">
    <link href="https://cdn.jsdelivr.net/gh/vaibhav111tandon/vov.css@latest/vov.min.css" rel="stylesheet" type="text/css">
    <!-- Callender -->
    <!-- main css -->
    <link rel="stylesheet" href="./theme/assets/css/main.css?v=132">
    <!-- Responsive css -->
    <link rel="stylesheet" href="./theme/assets/css/responsive.css?v=132">

    <!-- static css -->
    <style>
        .news-img::after {
            background-image: url("./theme/assets/images/our-partner/bcs.png");
        }
    </style>
    <style type="text/css">
        .committee-nav .exicutive-committee-branch-carousel .item:has(> .tablinks.active) {
            opacity: 1;
        }

        .committee-nav .exicutive-committee-branch-carousel .owl-item>.item {
            opacity: 0.5;
        }

        .tablinks.active {
            color: #35a651 !important;
            font-weight: bold;
        }

        .item:has(> .tablinks.active)>.icon-area>svg {
            color: #35a651;
        }
    </style>
</head>

<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SD6WTZ74VB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SD6WTZ74VB');
    </script>
    <style>
        #from-date:focus {
            background-color: white;
        }

        #to-date:focus {
            background-color: white;
        }

        #from-date:hover {
            background-color: white;
        }

        #to-date:hover {
            background-color: white;
        }

        .key-word-date-from input:focus {
            background-color: white;
        }

        .key-word-date-from input:hover {
            background-color: white;
        }
    </style>

    <!-- preloader starts  -->
    <?php include 'preloader.php' ?>
    <!-- preloader ends  -->

    <!-- header starts  -->
    <?php include 'header.php' ?>
    <!-- header ends  -->



    <div class="text-center page-banner" style="background-image:url(https://www.bcs.org.bd/theme/assets/images/background/authentication_bg.png);">
        <div class="container h-100 py-2 py-md-0">
            <div class="row h-100">
                <div class="col-md-6 d-md-block d-none">
                    <div class="align-items-center breadcrumb-banner-left d-flex h-100 justify-content-center justify-content-md-start">
                        <h6>Member Details</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:#ac1f25;">
                                    Member Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Starts -->
    <style>
        .rs-team-single-section .rs-team-single-image .player-info {
            padding: 20px;
            border: 1px solid #f9f9f9
        }

        .rs-team-single-section .rs-team-single-image .player-info .player-title {
            margin: 0 0 10px;
            font-weight: 700
        }

        .rs-team-single-section .rs-team-single-image .player-info span {
            font-size: 18px;
            display: block;
            margin: 0 0 5px
        }

        .rs-team-single-section .rs-team-single-image .player-info span.player-club {
            font-weight: 500
        }

        .rs-team-single-section .rs-team-single-image .player-info .social-icon {
            margin-top: 10px
        }

        .rs-team-single-section .rs-team-single-image .player-info .social-icon a {
            padding-right: 10px
        }

        .rs-team-single-section .rs-team-single-text h3 {
            font-size: 24px;
            font-family: Poppins, sans-serif;
            font-weight: 600
        }

        .rs-team-single-section .rs-team-single-text .single-details {
            margin-left: 0;
            margin-right: 0;
            padding: 20px;
            background-color: #1f6ce0
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-info {
            padding: 0
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr td h3 {
            font-size: 15px;
            font-family: Poppins, sans-serif;
            font-weight: 500;
            margin: 0 0 15px
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr td h4 {
            font-size: 15px;
            font-family: Poppins, sans-serif;
            font-weight: 400;
            color: #505050;
            margin: 0 0 15px
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr td i {
            margin: 0 10px 0 0;
            color: #505050
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr td i:hover {
            color: #fff
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr:last-child h3,
        .rs-team-single-section .rs-team-single-text .single-details .single-team-info table tr:last-child h4 {
            margin: 0
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-text {
            padding: 0
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-text .text-section p {
            font-size: 15px;
            font-family: Poppins, sans-serif;
            font-weight: 500;
            color: #000;
            margin: 0;
            font-style: italic
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-text .signature-section .sign-left {
            float: left
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-text .signature-section .sign-left h1 {
            font-size: 15px;
            font-family: Poppins, sans-serif;
            font-weight: 500;
            margin: 25px 0 0
        }

        .rs-team-single-section .rs-team-single-text .single-details .single-team-text .signature-section .sign-right {
            float: right
        }

        .rs-team-single-section .rs-team-single-text .team-information-text p {
            margin-bottom: 15px;
            font-family: Poppins, sans-serif;
            font-size: 15px;
            font-weight: 400
        }

        .rs-team-single-section .team-single-details-text {
            padding: 30px 0 50px
        }

        .rs-team-single-section .team-single-details-text p {
            margin: 0;
            font-family: Poppins, sans-serif;
            font-size: 15px;
            font-weight: 400
        }

        .rs-team-single-section .team-single-comment h3 {
            font-size: 24px;
            font-family: Poppins, sans-serif;
            font-weight: 600
        }

        .rs-team-single-section .team-single-comment textarea {
            width: 100%;
            height: 145px;
            color: #ccc;
            font-size: 15px;
            font-style: italic;
            text-transform: uppercase;
            padding: 20px 0 0 25px;
            border: 1px solid #ebebeb
        }

        .rs-team-single-section .team-single-comment input[type=submit] {
            float: right;
            font-size: 15px;
            text-transform: uppercase;
            font-family: Poppins, sans-serif;
            color: #000;
            background-color: #1f6ce0;
            margin-top: 30px;
            border: none;
            width: 170px;
            height: 45px;
            text-align: center;
            line-height: 45px;
            transition: .4s;
            -webkit-transition: .4s;
            -ms-transition: .4s
        }

        .rs-team-single-section .team-single-comment input[type=submit]:hover {
            background: #111;
            color: #fff
        }
    </style>

    <div class="rs-team-single-section team-inner-page sec-spacer" style="margin-bottom: 100px;">

        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="rs-team-single-image">
                        <img src="./uploads/committee_photo/default_profile_pic.png" height="300" width="300px" alt="" style=" border: solid 1px #D5D4D3" />
                        <div class="player-info">
                            <h3 class="player-title" style="font-size: 22px;"><?php echo $user_row[0]['NAME'] ?></h3>
                            <span class="player-position"><?php echo $user_row[0]['PROFESSION'] ?></span>
                            <!-- <span class="player-club">Membership No: 3616</span> -->


                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="rs-team-single-text mb-50">
                        <h3>Personal Info</h3>
                        <div class="row single-details mb-30" style="background-color: #FAFBFB !important;">
                            <div class="col-md-12 single-team-info">
                                <table>
                                    <tr>
                                        <td>
                                            <h3>Full Name</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3><?php echo $user_row[0]['NAME'] ?></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Email</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3><?php echo $user_row[0]['EMAIL'] ?></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Address</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3><?php echo $user_row[0]['ADDRESS'] ?></h3>
                                        </td>
                                    </tr>

                                    <!-- <tr>
                                        <td>
                                            <h3>Home District</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3>BHOLA</h3>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>
                                            <h3>Blood Group</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3>O+</h3>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>
                                            <h3>Present Address</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3> H-7, Flat-10 R-5 Dhanmondi R/A, Dhaka</h3>
                                        </td>
                                    </tr> -->
                                </table>
                            </div>
                        </div>
                        <h3>Career Info</h3>
                        <div class="row single-details" style="background-color: #FAFBFB !important;">
                            <div class="col-md-12 single-team-info">
                                <table>
                                    <!-- <tr>
                                        <td>
                                            <h3>Cadre</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3>BCS (Administration)</h3>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>
                                            <h3>Occupation</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3><?php echo $user_row[0]['PROFESSION'] ?> </h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Position in Committee</h3>
                                        </td>
                                        <td style="width: 40px; text-align: center">
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <h3> <?php echo $user_row[0]['POSITION'] ?></h3>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    <!-- /.section-header -->


    <!-- gallery Ends -->


    <!-- footer starts  -->
    <?php include 'footer.php' ?>
    <!-- footer ends  -->

    <script src="./admin/plugins/axios/axios.min.js"></script>
    <!-- <script>
       
        var utlt = [];
        utlt["siteUrl"] = function(url) {
            url = typeof url == "undefined" ? "" : url;
            return "https://www.bcs.org.bd/" + url;
        }
    </script> -->

    <!-- fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery -->
    <script src="./theme/assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <!-- bootstrap -->
    <script src="./theme/assets/vendor/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <!-- owl-carousel -->
    <script src="./theme/assets/vendor/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js"></script>
    <!-- Mix it up -->
    <script src="./theme/assets/vendor/mixitup/dist/mixitup.min.js"></script>
    <!-- main css -->
    <script src="./theme/assets/js/script.js?v=132"></script>
    <script src="./theme/assets/vendor/animated-event-calendar/dist/jquery.simple-calendar.js"></script>
    <script src="./theme/assets/vendor/jquery.da-share.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./admin/js/custom.js?v=132"></script>
    <script src="./admin/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Share socila paltform -->
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6166857286572e0012d91e40&product=inline-share-buttons" async="async"></script>

    <!--  Added by mahmud 2021/26-->
    <!-- Scroll to top start js -->
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 20) {
                    $('#toTopBtn').fadeIn();
                } else {
                    $('#toTopBtn').fadeOut();
                }
            });
            $('#toTopBtn').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                return false;
            });
        });
    </script>
    <!-- Scroll to top End js -->


</body>

</html>