<?PHP
//set_time_limit(300);
include 'connection.php';
error_reporting(0);
// Establish a connection to the Oracle database (ensure $conn is set up correctly)

$slider = [];
$sql_slider = "SELECT * FROM SLIDER";
$parse = ociparse($conn, $sql_slider);

if (!$parse) {
    $e = oci_error($conn);
    echo "Parse Error: " . $e['message'];
    exit;
}

if (!oci_execute($parse)) {
    $e = oci_error($parse);
    echo "Execution Error: " . $e['message'];
    exit;
}

// Fetch the data
while ($row = oci_fetch_assoc($parse)) {
    $slider[] = $row;
}



$main = [];
$sql1_notice = "SELECT *FROM SCROLL ";
$parse = ociparse($conn, $sql1_notice);
oci_execute($parse);

$marquee_text = '';
while ($row = oci_fetch_assoc($parse)) {
    $marquee_text .= $row['SCROLL_DESC'] . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '; // Add spacing between notices
}
// var_dump($marquee_text);

$selectedStatus = isset($_GET['status']) ? $_GET['status'] : '';

// Prepare SQL query with optional status filtering
$sql = "SELECT GALLARYNAME, PIC_LOC, STATUS FROM GALLERY";
if (!empty($selectedStatus)) {
    $sql .= " WHERE STATUS = :status";
}
$sql .= " ORDER BY GALLARYNAME";

$parse = oci_parse($conn, $sql);
if (!empty($selectedStatus)) {
    oci_bind_by_name($parse, ':status', $selectedStatus);
}
oci_execute($parse);

// Organize data by gallery name
$gallery = [];
while ($row = oci_fetch_assoc($parse)) {
    $galleryName = $row['GALLARYNAME'];
    $gallery[$galleryName][] = $row['PIC_LOC'];
}
oci_free_statement($parse);

?>

<?php
                    include 'connection.php';
                    $main = [];
                    $sql_notice = "SELECT * FROM NOTICE WHERE STATUS = 'A'";
                    $parse = ociparse($conn, $sql_notice);
                    oci_execute($parse);

                    while ($row = oci_fetch_assoc($parse)) {
                        $main[] = $row;
                    }

                    // var_dump()

                    $main5 = [];
                    $sql_process = "SELECT * FROM PROCEED WHERE STATUS = 'A'";
                    $parse = ociparse($conn, $sql_process);
                    oci_execute($parse);

                    while ($row = oci_fetch_assoc($parse)) {
                        $main5[] = $row;
                    }


                    $sql = "SELECT GALLARYNAME, PIC_LOC FROM GALLERY WHERE STATUS = 'A' ORDER BY GALLARY_ID DESC";

                    // print_r($sql);

                    $parseresult = ociparse($conn, $sql);

                    oci_execute($parseresult);
                    $gallery = array(); // Initialize the $gallery array

                    while ($row = oci_fetch_assoc($parseresult)) {
                        $gallery[$row['GALLARYNAME']][] = $row['PIC_LOC'];
                    }

                    ?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <title> Bandhan'84, BUET </title>
    <link rel="icon" type="image/png" href="../uploads/Bandhan84.jpeg" />

    

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./UI/FrontEnd/css/style.css">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="./UI/FrontEnd/css/responsive.css">

    <script type="text/javascript" src="./UI/FrontEnd/js/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



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

    <!-- Main slider  -->
    <style>
    .main-slider-content-area .main-slider .slider-img img {
        height: 450px !important;
    }

    .slider-img {
        width: 100%;
        height: 450px;
        overflow: hidden;
        position: relative;
    }

    .slider-img img {
        width: 100%;
        height: 100%;
    }

    .centered-zoom {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1);
        color: #ffffff;
        font-size: 32px;
        font-weight: bold;
        text-align: center;
        z-index: 2;
        animation: zoomIn 2s ease-in-out infinite alternate;
        pointer-events: none;
        white-space: nowrap;
    }

    @keyframes zoomIn {
        0% {
            transform: translate(-50%, -50%) scale(1);
        }
        100% {
            transform: translate(-50%, -50%) scale(1.1);
        }
    }
</style>
<section class="main-slider-area">
    <div id="main-slider" class="main-slider-content-area owl-carousel owl-theme">
        <?php
        // Connect to Oracle and fetch slider data
        $slider_names = [];

        $sql_slider = "SELECT SLIDER_YNAME, PIC_LOC FROM SLIDER WHERE STATUS = 'A'";
        $parse = ociparse($conn, $sql_slider);
        oci_execute($parse);

        while ($row = oci_fetch_assoc($parse)) {
            $pic_loc = basename($row['PIC_LOC']);
            $filename = pathinfo($pic_loc, PATHINFO_FILENAME);
            $slider_names[$filename] = $row['SLIDER_YNAME'];
        }

        // Load actual images from directory
        $target_dir = "uploads/albums/thumbnails/";
        $images = glob($target_dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        if (!$images) {
            echo "<!-- No images found in directory: $target_dir -->";
        }

        foreach ($images as $image) {
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $slider_yname = isset($slider_names[$filename]) ? $slider_names[$filename] : 'No Title Found';

            echo '
            <div class="main-slider item">
                <a href="#">
                    <div class="slider-img">
                        <img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($slider_yname) . '">
                        <div class="centered-zoom">' . htmlspecialchars($slider_yname) . '</div>
                    </div>
                    <div class="box-shadow"></div>
                </a>
            </div>';
        }
        ?>
    </div>
</section>

    <div class="about-us-area section-padding-top section-padding-bottom">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5 vov fade-in-left slow">
                    <div class="card animated-card about-us-card shadow-lg border-0 p-2 br-10 h-100">
                        <div class="card-body">
                            <div class="heading mb-2">
                                <h5>About Us</h5>
                            </div>
                            <div class="description">

                                <p>
                                   Bandhan'84 BUET is a non-profitable organization consisting of BUET Alumni who Started class on 7th April 1980 at BUET.
                                </p>
                            
                                <p>
                                   The Objectives of the organization are
                                </p>
                                
                                 <ol>
                                  <li>
                                  To create bond among the members....</li>
                                  
                                </ol> 




                            </div>
                            <a class="btn read-more-sm" href="about_us.php">Read
                            More →</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 vov fade-in-right slow">
                    <div class="card animated-card notice-board-card shadow-lg border-0 p-2 br-10 h-100"
                        style="background-color: #8ce2eb">
                        <div class="card-body mb-2">
                            <div class="heading mb-2">
                                <h5><span style="color: black ">Notice Board</span></h5>
                            </div>
                            <div class="description">
                                <ul>
                                    <?php

                                    for ($i = 0; $i < count($main); $i++) {

                                    ?>
                                    <li class="d-block mb-1">
                                        <a class="p-1" target="_blank"
                                            href="login/<?php echo $main[$i]['NOTICE_IMG'] ?>"
                                            style="font-weight: bolder;font-size: 13px;">
                                            <i class="fas fa-caret-right me-2"></i>
                                            <?php echo $main[$i]['NOTICE_DESC'] ?>
                                        </a>
                                    </li>
                                    <?php }
                                    ?>


                                </ul>
                            </div>
                            <div class="text-start">
                                <a class="read-more-sm btn" href=""><span style="color: black ">See All
                                        Notice</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /.about-->

    <!-- counter starts  -->
    <?php include 'counter.php'?>
    <!-- counter ends  -->

  <!-- index_executive_commitee starts  -->
    <?php include 'index_executive_commitee.php'?>
    <!-- index_executive_commitee ends  -->


    <div class="member-fes section-padding-top section-padding-bottom">
        <div class="container">
            <div class="row facilities-border g-5">
                <div class="col-lg-6">
                    <div class="border-0 card animated-card h-100 member-facility-box br-10 shadow-lg">
                        <div class="card-body p-4">
                            <h5>Member Facilities</h5>
                            <div style="line-height: 1.5;">
                                <div style="line-height: 2;">
                                    <div style="line-height: 2;"><span style="font-family: latoR;">&nbsp;</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">1. Subsidized Rental and other Facilities.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">2. National Exhibition&nbsp;and Conference.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">3. Joining International Exhibition and Conferences.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">4. Training&nbsp;Facility for Employees.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">5. Seminars and Workshops.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">6. Market Analysis.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">7. Ensure Government Facilities for Business.</span></div>
                                    <div style="line-height: 2;"><span style="font-family: latoR;">8. Support on 'Made in Bangladesh'.</span></div>
                                </div>
                                <div style="line-height: 1.5;">
                                    <div>&nbsp;</div>
                                </div>
                            </div>

                            <div class="apply-now text-center py-4 mt-2">
                                <h3>Become A</h3>
                                <h4>Member</h4>
                                <button class="btn-hover color-9 mt-3 p-2 px-4"><a class="w-100 text-white"
                                    href="application.php">Apply Now</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-md-block d-none">
                    <div class="border-0 card animated-card h-100 member-facility-box br-10 shadow-lg">
                        <div class="card-body p-4">

                            <div class="align-items-center apply-now-btn d-flex h-100 justify-content-center text-center w-100">
                                <div>
                                    <h2 class="fw-bold">Become A Member</h2>
                                    <button class="btn-hover color-9 mt-3 p-3 px-5"><a class="w-100 text-white"
                                        href="application.php">APPLY NOW</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="member-pattern">
            <img src="./theme/assets/images/pattern/member-leftr.png" class="member-left" alt="">
        </div>
    </div>
    <!-- /.member-fes-->

    <!-- <div class="events-area section-padding-top section-padding-bottom">
        <div class="container">
            <div class="events">
                <div class="section-header text-center mb-4">
                    <h2>Events</h2>
                </div>
                <div class="events-tab-area">
                    
                        

                            <div class="row justify-content-between g-5">
                                <div class="col-md-6">
                                    <div class="event-national-area br-10 shadow-lg">
                                        <div class="event-national">
                                            <div class="event-img mb-4 zoom-in position-relative">
                                                <a href=""><img
                                                    class="image-fit" src="uploads/event_banner/dummy.png"
                                                    alt=""></a>
                                            </div>
                                            <div class="event-national-content">
                                                <h3 class="mb-2"><a href="">Lorem ipsum dolor sit amet consectetur </a></h3>

                                                <div class="event-content">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ullam officia facilis nobis. Dolorem exercitationem vel nemo sint excepturi saepe vitae qui tenetur maiores harum....
                                                    </p>
                                                </div>
                                                <a href="" class="mt-4 more">View
                                                More →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="event-national-area br-10 shadow-lg">
                                        <div class="event-national">
                                            <div class="event-img mb-4 zoom-in position-relative">
                                                <a href=""><img
                                                    class="image-fit" src="uploads/event_banner/dummy.png"
                                                    alt=""></a>
                                            </div>
                                            <div class="event-national-content">
                                                <h3 class="mb-2"><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a></h3>

                                                <div class="event-content">
                                                    <p>

                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus natus consectetur quasi! Nisi, natus assumenda ex quod ratione fugit? Qui ipsa delectus eius repellat...
                                                    </p>
                                                </div>
                                                <a href="" class="mt-4 more">View
                                                    More →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        
                    <div class="text-center mt-5">
                        <a href="" class="btn btn-outline-danger rounded-pill py-2 px-3">View
                        All Events
                        →</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.events-area -->

    <div class="our-gallery-area section-padding-top">
        <div class="container">
            <div class="our-gallery">
                <div class="section-header text-center mb-4">
                    <h2>Our Gallery</h2>
                </div>
                <div class="shortable-gallery mb-5">
                    
                    <!-- /.short-able-menu -->
                    <div class="row text-center mb-5">
        <div class="col-md-4">
            <a href="main_gallery.php?status=S">
                <div class="card shadow">
                    <img src="login/upload/gallery/group_photo.jpeg" class="card-img-top"
                        style="height: 200px; object-fit: cover;" alt="School">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title m-0">Group Photo</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="main_gallery.php?status=N">
                <div class="card shadow">
                    <img src="login/upload/gallery/event_photo.jpeg" class="card-img-top"
                        style="height: 200px; object-fit: cover;" alt="School">
                    <div class="card-body bg-success text-white">
                        <h5 class="card-title m-0">Event Photo</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="main_gallery.php?status=T">
                <div class="card shadow">
                    <img src="login/upload/gallery/school_photo.jpeg" class="card-img-top"
                        style="height: 200px; object-fit: cover;" alt="School">
                    <div class="card-body bg-info text-white">
                        <h5 class="card-title m-0">Our School</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
                    <!-- /.short-able-item -->
                    <div class="short-able-button">
                        <ul>
                            <li><a href="main_gallery.php" class="btn btn-outline-danger rounded-pill">View Photos →</a></li>
                            <!-- <li><a href="https://www.bcs.org.bd/page/video-gallery">View Videos →</a></li> -->
                        </ul>
                    </div>
                    <!-- /.short-able-button -->
                </div>
                <!-- /.shortable-gallery -->
                <!-- /.row -->
            </div>
            <!-- /.our-gallery -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.our-gallery -->
    <!-- news room -->
    
    <!-- <div class="news-room section-padding-top section-padding-bottom" style="background:#F5F7F7;">
        <div class="container">
            <div class="news-border">
                <h4 class="text-center">News Room</h4>
                <div class="row">
                    <div class="col-lg-12 news-central">
                        <div class="row">
                            
                            <div class="col-lg-4 news-box">
                                <div class="border-0 card br-10 shadow-lg">
                                    <div class="news-banner-box">
                                        <div class="news-img zoom-in position-relative">
                                            <a href=""><img class="news-img1 image-fit"
                                                src="uploads/albums/thumbnails/dummy.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="news-content">
                                        <div class="publish-date">
                                            8th Nov 2023
                                        </div>
                                        <div class="news-title my-3">
                                            <h5><a href="">Lorem ipsum dolor sit amet.</a></h5>
                                        </div>
                                        <div class="news-details">

                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod officiis nobis accusantium quo iste cupiditate....
                                        </div>
                                        <a href="" class="btn more">Read
                                        More →</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 news-box">
                                <div class="border-0 card br-10 shadow-lg">
                                    <div class="news-banner-box">
                                        <div class="news-img zoom-in position-relative">
                                            <a href=""><img class="news-img1 image-fit"
                                                src="uploads/albums/thumbnails/dummy.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="news-content">
                                        <div class="publish-date">
                                            5th Oct 2023
                                        </div>
                                        <div class="news-title my-3">
                                            <h5><a href="">Lorem ipsum dolor sit amet consectetur.</a></h5>
                                        </div>
                                        <div class="news-details">

                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam fugiat minus accusantium similique sit vero cupiditate quis itaque eum minima.
                                        </div>
                                        <a href="" class="btn more">Read
                                        More →</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 news-box">
                                <div class="border-0 card br-10 shadow-lg">
                                    <div class="news-banner-box">
                                        <div class="news-img zoom-in position-relative">
                                            <a href=""><img class="news-img1 image-fit"
                                                src="uploads/albums/thumbnails/dummy.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="news-content">
                                        <div class="publish-date">
                                            11th Apr 2023
                                        </div>
                                        <div class="news-title my-3">
                                            <h5><a href="">Lorem ipsum dolor sit amet.</a></h5>
                                        </div>
                                        <div class="news-details">

                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis blanditiis dolorum praesentium atque libero reiciendis sit ratione quod a culpa?...
                                        </div>
                                        <a href="" class="btn more">Read
                                        More →</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 all-news-sm news-all text-center mb-2">
                                <a href="" class="btn btn-outline-danger me-4 mt-4 rounded-pill">All News →</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 d-none d-sm-block">
                        <div class="text-center mt-5">
                            <a href="" class="me-4 btn btn-outline-danger rounded-pill py-2 px-3">All News →</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.news-room -->
   

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