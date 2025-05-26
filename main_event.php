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
                        <h6>All Events</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:#ac1f25;">
                                    All Events</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.banner -->
    <!-- <div class="page-search-area">
        <div class="container">
            <form id="searchForm" action="./page/events" type="GET">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="page-header">
                            <h3>All Events</h3>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="key-word-date-from">
                            <input type="hidden" name="is_international" value="">
                            <input type="hidden" name="is_local" value="">
                            <input type="hidden" name="upcoming" value="">
                            <input type="hidden" name="current" value="">
                            <input type="hidden" name="previous" value="">
                            <input placeholder="From Date" type="date" value="" name="from_date">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="key-word-date-from">
                            <input placeholder="To Date" type="date" name="to_date" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 position-relative">
                        <div class="key-word-search">
                            <input autocomplete="off" type="text" id="autocomplete-input" value="" name="key" placeholder="Search by Key" class="autocomplete-input" data-autocomplete-target="#autocomplete-key-wrap">
                            <div class="search-icon" onclick="$('#searchForm').submit();">
                                <button class="btn btn-group pt-0 px-3" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="autocomplete-wrap" id="autocomplete-key-wrap" data-src="./common-search/Event" data-view="./page/event/ITEM_KEY" data-key="slug" data-column="title">
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="search-icon">
                            <button class="btn btn-outline-danger" type="button"><i onclick="formReset()"
                                class="fas fa-sync-alt"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <!-- /.section-header -->

    <div class="page-body-area mb-5">
        <div class="container">
            <div class="page-search-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h5 class="text-center mb-3">Total 15 Found</h5>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 px-0">
                            <div class="page-header p-0">
                                <h4>Our National Events</h4>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="page-body event-page mb-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card single-event mb-3">
                            <div class="card-header single-event-img img zoom-in position-relative">
                                <a href=""><img src="./uploads/slider/bandhan.jpg"
                                    class="card-img-top image-fit" ></a>
                            </div>
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-8 p-2">
                                        <div class="event-date">
                                            <img class="icon" src="./theme/assets/images/page/calender.png" alt="">
                                            <p class="d-inline">18th Oct - 18th Oct 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-2">
                                        <img class="icon" src="./theme/assets/images/page/clock.png" alt="">
                                        <p class="d-inline">12:03 PM
                                        </p>
                                    </div>
                                    <div class="col-lg-12 p-2">
                                        <div class="d-flex">
                                            <span class="icon"><img src="./theme/assets/images/page/marker.png"
                                                alt=""></span>
                                            <p class="mx-2 my-auto">Paltan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-event mb-3">
                            <div class="card-header single-event-img img zoom-in position-relative">
                                <a href=""><img src="./uploads/slider/bandhan.jpg"
                                    class="card-img-top image-fit" ></a>
                            </div>
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-8 p-2">
                                        <div class="event-date">
                                            <img class="icon" src="./theme/assets/images/page/calender.png" alt="">
                                            <p class="d-inline">7th Jun - 9th Jun 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-2">
                                        <img class="icon" src="./theme/assets/images/page/clock.png" alt="">
                                        <p class="d-inline">10:02 AM
                                        </p>
                                    </div>
                                    <div class="col-lg-12 p-2">
                                        <div class="d-flex">
                                            <span class="icon"><img src="./theme/assets/images/page/marker.png"
                                                alt=""></span>
                                            <p class="mx-2 my-auto">Rangpur</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-event mb-3">
                            <div class="card-header single-event-img img zoom-in position-relative">
                                <a href=""><img src="./uploads/slider/bandhan.jpg"
                                    class="card-img-top image-fit" ></a>
                            </div>
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-8 p-2">
                                        <div class="event-date">
                                            <img class="icon" src="./theme/assets/images/page/calender.png" alt="">
                                            <p class="d-inline">5th Apr - 5th Apr 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-2">
                                        <img class="icon" src="./theme/assets/images/page/clock.png" alt="">
                                        <p class="d-inline">10:51 AM
                                        </p>
                                    </div>
                                    <div class="col-lg-12 p-2">
                                        <div class="d-flex">
                                            <span class="icon"><img src="./theme/assets/images/page/marker.png"
                                                alt=""></span>
                                            <p class="mx-2 my-auto">Paltan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-event mb-3">
                            <div class="card-header single-event-img img zoom-in position-relative">
                                <a href=""><img src="./uploads/slider/bandhan.jpg"
                                    class="card-img-top image-fit" ></a>
                            </div>
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-8 p-2">
                                        <div class="event-date">
                                            <img class="icon" src="./theme/assets/images/page/calender.png" alt="">
                                            <p class="d-inline">16th Nov - 11th Dec 2022</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-2">
                                        <img class="icon" src="./theme/assets/images/page/clock.png" alt="">
                                        <p class="d-inline">3:07 PM
                                        </p>
                                    </div>
                                    <div class="col-lg-12 p-2">
                                        <div class="d-flex">
                                            <span class="icon"><img src="./theme/assets/images/page/marker.png"
                                                alt=""></span>
                                            <p class="mx-2 my-auto">Dhaka</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-event mb-3">
                            <div class="card-header single-event-img img zoom-in position-relative">
                                <a href=""><img src="./uploads/slider/bandhan.jpg"
                                    class="card-img-top image-fit"></a>
                            </div>
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-8 p-2">
                                        <div class="event-date">
                                            <img class="icon" src="./theme/assets/images/page/calender.png" alt="">
                                            <p class="d-inline">23rd May - 25th May 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-2">
                                        <img class="icon" src="./theme/assets/images/page/clock.png" alt="">
                                        <p class="d-inline">4:17 PM
                                        </p>
                                    </div>
                                    <div class="col-lg-12 p-2">
                                        <div class="d-flex">
                                            <span class="icon"><img src="./theme/assets/images/page/marker.png"
                                                alt=""></span>
                                            <p class="mx-2 my-auto">Khulna </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-event mb-3">
                            <div class="card-header single-event-img img zoom-in position-relative">
                                <a href=""><img src="./uploads/slider/bandhan.jpg"
                                    class="card-img-top image-fit" ></a>
                            </div>
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-8 p-2">
                                        <div class="event-date">
                                            <img class="icon" src="./theme/assets/images/page/calender.png" alt="">
                                            <p class="d-inline">31st May - 31st May 2023</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-2">
                                        <img class="icon" src="./theme/assets/images/page/clock.png" alt="">
                                        <p class="d-inline">11:00 AM
                                        </p>
                                    </div>
                                    <div class="col-lg-12 p-2">
                                        <div class="d-flex">
                                            <span class="icon"><img src="./theme/assets/images/page/marker.png"
                                                alt=""></span>
                                            <p class="mx-2 my-auto">Barishal</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <nav>
                            <ul class="pagination pagination-site">

                                <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>





                                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="">2</a></li>
                                <li class="page-item"><a class="page-link" href="">3</a></li>


                                <li class="page-item">
                                    <a class="page-link" href="" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
            

        </div>
        <!-- /.container -->
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