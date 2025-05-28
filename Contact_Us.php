<?PHP
//set_time_limit(300);
include 'connection.php';
error_reporting(0);
// Establish a connection to the Oracle database (ensure $conn is set up correctly)


$main = [];
$sql_notice = "SELECT * FROM SCROLL ";
$parse = ociparse($conn, $sql_notice);
oci_execute($parse);

$marquee_text = '';
while ($row = oci_fetch_assoc($parse)) {
    $marquee_text .= $row['SCROLL_DESC'] . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '; // Add spacing between notices
}
// var_dump($marquee_text);

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <title> IET </title>
    <link rel="icon" type="img/logo.jpeg" href="img/logo.jpeg"/>
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
                        <h6><span style="color: black ">Contact Us</span></h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php"><span style="color:black ">Home</span></a></li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:black;">
                                contact-us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.banner -->
    <div class="contact-details contact-us-container">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-5">
                    <div class="head-office-left p-3">
                        <h1 class="mb-4" style="font-weight: bolder; font-size: 20px;">Department of Civil Engineering, BUET </h1>
                        <ul>
                            <li>
                                <div class="d-flex my-3 ">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <p class="mx-3">BUET Campus, Dhaka.</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex my-3 ">
                                    <span class="icon"><i class="far fa-envelope"></i></span>
                                    <p class="mx-3">bandhan84buet@gmail.com</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex my-3">
                                    <span class="icon"><i class="fas fa-phone-alt"></i></span>
                                    <p class="mx-3">01912-104376</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex my-3 align-items-center">
                                    <span class="icon"><i class="fas fa-globe"></i></span>
                                    <p class="mx-3 mb-0">
                                        <a href="https://.org/" target="_blank" style="color: inherit; text-decoration: underline;">
                                           .org/
                                        </a>
                                    </p>
                                </div>

                            </li>
                        </ul>
                        <h4 class="follow-us">Follow us on</h4>
                        <div class="social-icon  pt-4 pb-4">
                            <ul>
                                <li>
                                    <!-- <a href="https://www.facebook.com/IET.School"> -->
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                </li>
                               <!--  <li>
                                    <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 contact-form ">
                    <form id="contactForm" class="shadow-lg">
                        <h3 class="mb-3">Feedback / Queries</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger ps-2">*</span></label>
                                    <input name="name" id="name" class="w-100 p-2 " type="text" placeholder="Enter Your Name">
                                    <span class="d-none invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="email">Email<span class="text-danger ps-2">*</span></label>
                                    <input class="w-100 p-2 " name="email" id="email" type="email" placeholder="Enter Your Email">
                                    <span class="d-none invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="phone">Phone<span class="text-danger ps-2">*</span></label>
                                    <input class="w-100 p-2" name="phone" type="text" placeholder="Enter Your Phone Number">
                                    <span class="d-none invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="">Subject<span class="text-danger ps-2">*</span></label>
                                    <input class="w-100 p-2" type="text" name="subject" placeholder="Enter Subject">
                                    <span class="d-none invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="">Message<span class="text-danger ps-2">*</span></label>
                                    <textarea name="message" class="w-100 p-2" id="w3review" name="w3review" rows="2" placeholder="Write Something For Us"></textarea>
                                    <span class="d-none invalid-feedback"></span>
                                </div>
                            </div>

                            <div>
                                <button type="button" id="addContactBtn" class="btn px-4 py-2">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 p-3 pt-5">
                    <div class="contact-map">
                        <span class="shape8"></span>
                        <span class="shape9"></span>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.5832856969423!2d90.39008467484504!3d23.72657078969172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8dd4855f073%3A0x27aa71bcab92ae5a!2sBangladesh%20University%20of%20Engineering%20and%20Technology%20(BUET)!5e0!3m2!1sen!2sus!4v1748341117162!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                
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