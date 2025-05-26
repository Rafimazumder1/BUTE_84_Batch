<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <title> Bandhan'84, BUET </title>
    <link rel="icon" type="image/png" href="../uploads/Bandhan84.jpeg" />
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

    <!-- Preloader -->
    <div class="preloader-body justify-content-center align-items-center" style="height: 0px;">
        <img class="animation__shake" src="./admin/img/favicon_2x.png" style="display: none" alt="Logo" height="60" width="60">
    </div>

    <!-- Menu  -->
    <!-- mobile menu -->
    <div class="mobile-header-top-area">
        <div class="container-custome">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-header-top text-center">
                        <ul>
                            <li><a href=""> Login</a></li>
                            <!-- <li><a class="text-danger">|</a></li>
                            <li><a href="">Become a member</a></li> -->
                        </ul>
                    </div>
                    <!-- /.mobile-header-top -->
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.mobile-header-top-area -->

    <div class="mobile-main-menu-area">
        <div class="container-custome">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-main-menu">
                        <div class="logo">
                            <a href="">
								<img src="../uploads/Bandhan84.jpeg" alt="">
							</a>
                        </div>
                        <div class="breadcrumb">
                            <img src="./theme/assets/images/icon/burger-menu.png" alt="breadcrumb">
                        </div>
                        <!-- /.breadcrumb -->
                    </div>
                    <!-- /.mobile-main-menu -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.mobile-main-menu-area -->

    <div class="nav-content">
        <!-- /.nav-logo -->
        <ul class="list-unstyled">



            <li>
                <a href="index.php">Home</a>
            </li>

            <li>
                <a class="dropdown-btn" href="#">Bandhan'84
							<svg class="svg-inline--fa fa-chevron-down fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height:14px"><path d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"/></svg>
						</a>
                <ul class="dropdown-container">
                    <li>
                        <a href="" title="">About Us</a>
                    </li>
                    <li>
                        <a href="" title="">Advisory Committe</a>
                    </li>
                    <li>
                        <a href="" title="">Executive Committe</a>
                    </li>
                    <li>
                        <a href="" title="">All Members</a>
                    </li>
                    
                </ul>
            </li>

            <li>
                <a class="dropdown-btn" href="#">Membership
							<svg class="svg-inline--fa fa-chevron-down fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height:14px"><path d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"/></svg>
						</a>
                <ul class="dropdown-container">
                    
                    <li>
                        <a href="" title="">Membership Process</a>
                    </li>
                    <li>
                        <a href="application.php" title="">Become A Member</a>
                    </li>
                    
                </ul>
            </li>

            <li>
                <a href="">News</a>
            </li>

            <li>
                <a href="">Gallery</a>
            </li>

            <li>
                <a href="main_event.php">Events</a>
            </li>

            <li>
                <a href="all_fees.php">All Fees</a>
            </li>

            <li>
                <a href="">Contact Us</a>
            </li>




          



        </ul>
        <!-- /.menu -->
    </div>
    <!-- /.nav-content -->

    <div class="header-top-area" style="background-color: #ac1f25;">
        <div class="container-custome">
            <div class="row">
                <div class="col-5">
                    <div class="mail-phone-area">
                        <div class="mail-phone">
                            <ul>
                                <li><span><i class="far fa-envelope"></i></span></li>
                                <li><span>bandhan84buet@gmail.com</span></li>
                                <li><span>|</span></li>
                                <li><span><i class="fas fa-phone-alt"></i></span></li>
                                <li><span>01912104376</span></li>
                            </ul>
                        </div>
                        <!-- /.mail-phone -->
                    </div>
                    <!-- /.mail-phone-area -->
                </div>
                <!-- /.col-6 -->
                <div class="  col-7 ">
                    <div class="social-area">
                        <ul class="social text-end">

                            <li class="d-inline mx-2"><a target="_blank" href=""><i
										class="fab fa-facebook-f"></i></a></li>
                            <li class="d-inline">|</li>

                            <li class="d-inline mx-2"><a target="_blank" href=""><i
										class="fab fa-twitter"></i></a></li>
                            <li class="d-inline">|</li>

                            <li class="d-inline mx-2"><a target="_blank" href=""><i
										class="fab fa-linkedin-in"></i></a></li>
                            <li class="d-inline">|</li>

                            <li class="d-inline mx-2"><a target="_blank" href="https://www.youtube.com/channel/UCHE25MOAAC7BtycX_MoIxXQ"><i
										class="fab fa-youtube"></i></a></li>
                            <li class="d-inline">|</li>
                            <li class="d-inline mx-2"><span data-bs-toggle="modal" data-bs-target="#searchModal" style="cursor: pointer;">
							<svg width="16" height="16" class="fa-w-16 svg-inline--fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
						</span></li>
                        </ul>
                    </div>
                    <!-- /.social -->
                </div>
                <!-- /.col-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top-area -->
    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Search Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="searchFormHeader" action="" type="GET" autocomplete="off">
                        <div class="input-group">
                            <input autocomplete="off" style="height:42px" type="text" value="" class="form-control autocomplete-input" name="company_name" placeholder="Company Name" data-autocomplete-target="#autocomplete-wrap" class="autocomplete-input">
                            <div style="height:42px" class="btn border" onclick="$('#searchFormHeader').submit();">
                                <i class="fas fa-search text-primary mt-2"></i>
                            </div>
                            <div class="autocomplete-wrap" id="autocomplete-wrap" data-src="" data-view="" data-key="id" data-column="company_name,mid"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- pc logo css  -->
    <style>
        .logo-area img {
            float: left;
            width: 70px;
            height: 60px;
            /* background: #555; */
        }


        .logo-area {
            position: relative;

        }
    </style>


    <div class="main-menu menu-dropdown">
        <div class="container-custome">
            <div class="row">
                <div class="col-lg-3 d-none d-1366-block">
                    <div class="logo-area">
                        <a href="">
							<img src="../uploads/Bandhan84.jpeg" alt="" >
                            <h5 style="color: #ac1f25;">Bandhan'84, BUET</h5>
						</a>
                    </div>
                </div>
                <!-- /.col-lg-2 -->

                <div class="d-none col-md-1 d-1024-1365-block">
                    <div class="logo-area">
                        <a href="">
							<img src="../uploads/Bandhan84.jpeg" alt="" >
                            <h5 style="color: #ac1f25;">Bandhan'84, BUET</h5>
						</a>
                    </div>
                </div>
                <div class="col-xl-6_5 col-md-10">
                    <div class="menu-area">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="dropdown-toggle ">
                                <a data-bs-toggle="dropdown" href="#">Bandhan'84&nbsp;&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li class="">
                                        <a class="dropdown-item" href="" title="">About Us</a>

                                    </li>
                                    <li class="">
                                        <a class="dropdown-item" href="" title="">Advisory Committe</a>

                                    </li>
                                    <li class="">
                                        <a class="dropdown-item" href="" title="">Executive Committe</a>

                                    </li>
                                    <li class="">
                                        <a class="dropdown-item" href="" title="">All Members</a>

                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown-toggle ">
                                <a data-bs-toggle="dropdown" href="#">Membership</a>
                                <ul class="dropdown-menu">
                                    
                                    <li class="">
                                        <a class="dropdown-item" href="" title="">Membership Process</a>

                                    </li>
                                    <li class="">
                                        <a class="dropdown-item" href="application.php" title="">Become A Member</a>

                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="">News</a>
                            </li>
                            <li>
                                <a href="">Gallery</a>
                            </li>
                            <li>
                                <a href="main_event.php">Events</a>
                            </li>
                            <li>
                                <a href="">All Fess</a>
                            </li>
                            <li>
                                <a href="">Contact Us</a>
                            </li>
                        </ul>
                        <!-- /.menu -->
                    </div>
                    <!-- /.menu-area -->
                </div>
                <div class="col-md-1 d-none d-1024-1365-block text-center">
                    <div class="mobile-login">
                        <a href="" class=""><i class="fas fa-sign-in-alt"></i> Login</a>
                    </div>
                </div>

                <div class="col-xl-2_5 d-none d-1366-block">
                    <div class="user-details-area text-right menu-dropdown">
                        <ul>

                            <li><a href="">Login</a></li>
                            <!-- <li>|</li> -->

                            <!-- <li class="dropdown-toggle">
                                <a data-bs-toggle="dropdown" class="menu_name" href="">Become a Member </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="https://www.bcs.org.bd/page/Member-Eligibility" title="">Eligibility</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="https://www.bcs.org.bd/admin/members/create" title="">Online
											Membership</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="https://www.bcs.org.bd/page/Membership-Process" title="">Download Form</a>
                                    </li>
                                </ul>
                            </li> -->

                        </ul>
                    </div>
                    <!-- /.user-details-area -->
                </div>

                <!-- /.col-lg-2 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-menu -->
    <!-- Home Notice  -->
    <!-- Home Notice End -->



    <div class="text-center page-banner" style="background-image:url(https://www.bcs.org.bd/theme/assets/images/background/authentication_bg.png);">
        <div class="container h-100 py-2 py-md-0">
            <div class="row h-100">
                <div class="col-md-6 d-md-block d-none">
                    <div class="align-items-center breadcrumb-banner-left d-flex h-100 justify-content-center justify-content-md-start">
                        <h6>All Fees</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:#ac1f25;">
                                    All Fees</li>
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
            <h4 class="fw-bold pb-3">All Fees Charges</h4>
            <div id="page-content">
                                <ol>
                                  <li style="margin-top: 8px;">
                                  <span style="font-weight: bold;"> <a href="application.php">Life Member Fees:</span>  Tk. 20,000.00 (Twenty thousand only)</a> </li> 
                                  <li style="margin-top: 8px;">
                                  <span style="font-weight: bold;"> <a href="application.php">Initial Member Fees:</span>  Tk. 5,000.00 (Taka five thousand only)</a> </li>
                                  <li style="margin-top: 8px;"> <span style="font-weight: bold;">
                                  Annual Member Fees:</span>  Tk. 3,000.00 (Taka three thousand only)</li>
                                  <li style="margin-top: 8px;"> <span style="font-weight: bold;">
                                  Donation</span>  
                                  </li>
                                  <li style="margin-top: 8px;">  <span style="font-weight: bold;"> <a href="https://bandhan84.com/event_reg/event.php"> Event Registration Fees </a>
                                 </span>   </li>
                                  
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