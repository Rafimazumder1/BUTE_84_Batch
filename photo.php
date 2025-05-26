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



    
    <!-- /.banner -->
   
   

   <!-- main photo div starts  -->
   <!-- /.main-menu -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" />
    <style>
        .slider {
            width: 50%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }

        .slick-active {
            opacity: .5;
        }

        .slick-current {
            opacity: 1;
        }
    </style>


    <div class="text-center page-banner" style="background-image:url(https://www.bcs.org.bd/theme/assets/images/background/authentication_bg.png);">
        <div class="container h-100 py-2 py-md-0">
            <div class="row h-100">
                <div class="col-md-6 d-md-block d-none">
                    <div class="align-items-center breadcrumb-banner-left d-flex h-100 justify-content-center justify-content-md-start">
                        <h6>Photos</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item text-start active">photo gallery</li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:#ac1f25;">
                                    photos</li>
                                    
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.banner -->

    <div class="page-search-area">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12">
                    <div class="col-12">
                        <h5 class="text-center mb-3">Total 17 Found</h5>
                    </div>
                </div> -->
                <div class="col-lg-5">
                    <div class="page-header">
                        <h5 class="fw-bold"><a href="main_gallery.php" class="gallery-back"><i
                                class="fas fa-arrow-alt-circle-left"></i></a> All Photos</h5>
                    </div>
                    <!-- /.header -->
                </div>

            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.section-header -->
    <input id="album-id" type="hidden" value="40">
    <style>
        .card-headline {
            height: 18px;
            overflow: hidden;
        }
    </style>

    <div class="page-body-area feature-blog mb-5">
        <div class="container">
            <div class="gallery-container">
                <div class="row lightgallery">
                    <a href="uploads/albums/thumbnails/egm_2023.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/egm_2023.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023</p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>
                    <a href="uploads/albums/thumbnails/egm_2023_1.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/egm_2023_1.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>
                    <a href="uploads/albums/thumbnails/egm_2023_2.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/egm_2023_2.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>
                    <a href="uploads/albums/thumbnails/ec_met.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/ec_met.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>
                    <a href="uploads/albums/thumbnails/ec_met_1.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/ec_met_1.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>
                    <a href="uploads/albums/thumbnails/get_2022.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/get_2022.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>

                    <a href="uploads/albums/thumbnails/get_2022_1.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/get_2022_1.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>

                    <a href="uploads/albums/thumbnails/get_2022_2.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/get_2022_2.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>

                    <a href="uploads/albums/thumbnails/get_2022_3.jpg" class="light-gallery-link" data-sub-html="">
                        <div class="photo-col ">
                            <div class="photo-card">
                                <div class="photo-thum position-relative zoom-in">
                                    <img class="image-fit" src="uploads/albums/thumbnails/get_2022_3.jpg" alt="">
                                </div>
                                <div class="btm-card">
                                    <div class="card-headline">
                                        <h4></h4>
                                    </div>
                                    <p>
                                    November 30,2023 </p>
                                </div>
                            </div>
                            <!-- /.photo-card -->
                        </div>
                        <!-- /.photo-col -->
                    </a>

                </div>
                <!-- /.row -->
                <!-- <div class="d-flex justify-content-center">
                    <nav>
                        <ul class="pagination pagination-site">

                            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>





                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="https://www.bcs.org.bd/page/photos/40?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="https://www.bcs.org.bd/page/photos/40?page=3">3</a></li>


                            <li class="page-item">
                                <a class="page-link" href="https://www.bcs.org.bd/page/photos/40?page=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                            </li>
                        </ul>
                    </nav>

                </div> -->


            </div>
            <!-- /.gallery-container -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.page-body-area -->



    <script src="https://www.bcs.org.bd/theme/assets/lightgallery/lightgallery.min.js"></script>


    <script type="text/javascript">
        lightGallery(document.querySelector('.lightgallery'));
    </script>


    

   <!-- main photo div ends  -->
   
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