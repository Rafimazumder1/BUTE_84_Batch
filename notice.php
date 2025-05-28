<?php 
    include 'connection.php';

    // Notice গুলো লোড করা
    $main = [];
    $sql_notice = "SELECT * FROM NOTICE WHERE STATUS = 'A'";
    $parse_notice = ociparse($conn, $sql_notice);
    oci_execute($parse_notice);

    while ($row = oci_fetch_assoc($parse_notice)) {
        $main[] = $row;
    }

    // Marquee এর জন্য scroll text লোড করা
    $sql1_notice = "SELECT * FROM SCROLL";
    $parse_scroll = ociparse($conn, $sql1_notice);
    oci_execute($parse_scroll);

    $marquee_text = '';
    while ($row = oci_fetch_assoc($parse_scroll)) {
        $marquee_text .= $row['SCROLL_DESC'] . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <title> IET </title>
    <link rel="icon" type="image/png" href="./uploads/logo.jpeg" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
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
   <?php include 'preloader.php'?>
    <!-- preloader ends  -->

    <!-- header starts  -->
    <?php include 'header.php'?>
    <!-- header ends  -->



    <div class="text-center page-banner" style="background-image:url(https://www.bcs.org.bd/theme/assets/images/background/authentication_bg.png);">
        <div class="container h-100 py-2 py-md-0">
            <div class="row h-100">
                <div class="col-md-6 d-md-block d-none">
                    <div class="align-items-center breadcrumb-banner-left d-flex h-100 justify-content-center justify-content-md-start">
                        <h6><span style="color: black ">Notice</span></h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php"><span style="color: black ">Home</span></a></li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:black;">
                                Notice</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.banner -->
    <div class="container page-body-area page-content">
        <div class="page-body event-page mb-4" style="background-color: #c3f3f8">
            <h4 class="fw-bold pb-3"><span style="color: black ">Notice List</span></h4>
            <div id="page-content">
                               

                                <ol>
                                <?php

for ($i = 0; $i < count($main); $i++) {

?>
                                  
                                    <li style="margin-top: 8px;">
                                    <a class="p-1" target="_blank" href="login/<?php echo $main[$i]['NOTICE_IMG'] ?>" style="font-weight: bolder; font-size: 18px;">
                                        
                                    <?php echo $main[$i]['NOTICE_DESC'] ?>
                                    </a></li>


                                    <?php }
                                        ?> 
                                  
                                </ol> 
                
                
            </div>
            <div class="common-share mt-4">
                <p>
                    <span>Share On: </span>
                    <a class="facebook" target="_blank" rel="noopener" href=""><i
				class="fab fa-facebook-f"></i></a>
                    <a class="linkedin" target="_blank" rel="noopener" href=""><i
				class="fab fa-linkedin-in"></i></a>
                    <a class="twitter" target="_blank" rel="noopener" href=""><i
				class="fab fa-twitter"></i></a>
                    <a class="instagram" target="_blank" rel="noopener" href=""><i
				class="fab fa-instagram"></i></a>
                </p>
            </div>
        </div>
    </div>
    <!-- /.content -->
   

    <!-- footer starts  -->
    <?php include 'footer.php'?>
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