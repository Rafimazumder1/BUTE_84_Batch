








<?php

include "connection.php";


$sql = "SELECT * FROM EC_COMMITT_NAME ORDER BY POS_TYPE_CODE ASC";
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


    <!-- data table link  -->


    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


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
                        <h6>Executive Committe</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:#ac1f25;">
                                    Executive Committe</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.banner -->
    <div class="container page-body-area page-content">
        <div class="page-body event-page mb-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Member Name</th>
                        <th>Member Mobile No</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    for ($i = 0; $i < count($user_row); $i++) {


                    ?>
                        <tr>
                            <td><?php echo $user_row[$i]['POS_ID'] ?></td>
                            <td><?php echo $user_row[$i]['NAME'] ?></td>
                            <td><?php echo $user_row[$i]['MEM_MOBILE_NO'] ?></td>
                            <td><?php echo $user_row[$i]['POSITION'] ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.content -->


    <footer>
        <!-- <div class="square-shape" style="background-image: url(https://www.bcs.org.bd/theme/assets/images/footer/square-shape.png);"></div> -->
        <!-- /.square-shape -->
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mb-4">
                        <div class="footer-content-area">
                            <div class="footer-logo">
                                <a href="https://www.bcs.org.bd">
                                    <!-- <img src="https://www.bcs.org.bd/uploads/site_footer_logo_footer-logo___1633327007.png" alt=""> -->
                                </a>
                            </div>
                            <p class="pt-4">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid dolores quis consectetur labore voluptatum blanditiis repellat ea ad est! Dicta?
                                <a class="btn btn-link" href="">More</a>
                            </p>


                        </div>
                        <!-- /.footer-content-area -->
                    </div>
                    <!-- /.col-lg-3 -->


                    <div class="col-xl-6  mb-4">
                        <div class="footer-content-area footer-contact-us">
                            <h4>Contact us</h4>
                            <ul>
                                <li>
                                    <div class="row mb-3">
                                        <div class="col-1">

                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="col-10">
                                            <p>Chattagram Bhaban, 3rd Floor, <br>
                                                32 Topkhana Road, Purana Paltan,
                                                Dhaka - 1000 </p>
                                        </div>
                                        <!-- /.col-1 -->
                                    </div>
                                </li>
                                <li>
                                    <div class="row mb-3">
                                        <div class="col-1">
                                            <i class="fas fa-phone-alt"></i>

                                        </div>
                                        <div class="col-10">
                                            <p> +880 9999 11 11 15 </p>
                                        </div>
                                        <!-- /.col-1 -->
                                    </div>
                                </li>

                                <li>
                                    <div class="row mb-3">
                                        <div class="col-1">
                                            <i class="far fa-envelope"></i>

                                        </div>
                                        <div class="col-10">
                                            <p> admin@bandhan.org.bd</p>
                                        </div>
                                        <!-- /.col-1 -->
                                    </div>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                        <!-- /.footer-content-area -->
                    </div>



                    <div class="col-12 text-center mb-4">
                        <img src="./theme/assets/images/footer/footer_aamarPay.png" class="img-fluid" alt="">
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-custome -->
        </div>
        <!-- /.footer-top-area -->

        <div class="footer-bottom">
            <div class="container-custome">
                <div class="row">
                    <div class="col-12">
                        <div class="coppy-right-area">
                            <ul class="text-center">
                                <li>© Bandhan'84 All Right Reserved, Designed & Developed By: <a href="https://itbangla.org/"> IT Bangla Ltd.</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-custome -->
        </div>
        <!-- /.footer-bottom -->
        <div class="square-shape2" style="background-image: url(./theme/assets/images/footer/square-shape.png);"></div>
    </footer>
    <a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>

    <script src="./admin/plugins/axios/axios.min.js"></script>


    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <!-- <script>
       
        var utlt = [];
        utlt["siteUrl"] = function(url) {
            url = typeof url == "undefined" ? "" : url;
            return "https://www.bcs.org.bd/" + url;
        }
    </script> -->





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