<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php'?>

    <!-- static css -->
    <!-- <style>
        .news-img::after {
            background-image: url("https://bcs.org.bd/theme/assets/images/our-partner/bcs.png");
        }
    </style> -->
    <style>
        .trending-sectiion {
            border: 1px solid #e8e8e8;
            box-shadow: 0px 4px 12px rgb(199 199 199 / 25%);
            border-radius: 10px;
            padding: 20px;
            background: #ffffff;
        }

        .trending-sectiion .description a {
            color: #035aa6 !important;
            padding: 8px 0px 0px 0px;
            font-weight: bold;
            font-size: 1rem;
        }

        .trending-sectiion .description p {
            font-size: 15px;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .trending-sectiion .title h2 {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 800;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: unset;
            line-height: 26px;
        }
    </style>
</head>

<body>
   
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

    <div class="text-center page-banner" style="background-image:url(https://bcs.org.bd/theme/assets/images/background/authentication_bg.png);">
        <div class="container h-100 py-2 py-md-0">
            <div class="row h-100">
                <div class="col-md-6 d-md-block d-none">
                    <div class="align-items-center breadcrumb-banner-left d-flex h-100 justify-content-center justify-content-md-start">
                        <h6>News</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="align-items-center breadcrumb-banner-right d-flex h-100 justify-content-center justify-content-md-end text-capitalize">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item text-start"><a href="https://bcs.org.bd">Home</a></li>
                                
                                <li class="breadcrumb-item active breadcrumb-last text-start" style="font-weight: bold;color:#ac1f25;">
                                    news</li>
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
            <form id="searchForm" action="" type="GET">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12">
                            <h5 class="text-center mb-3">Total 29 Found</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header">
                            <h3>News</h3>
                        </div>
                        <!-- /.header -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <!-- <div class="col-lg-2">
                        <div class="key-word-date-from">
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
                            <input autocomplete="off" type="text" id="autocomplete-input" value="" name="key" placeholder="Search Key" class="autocomplete-input" data-autocomplete-target="#autocomplete-key-wrap">
                            <div class="search-icon" onclick="$('#searchForm').submit();">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <div class="autocomplete-wrap" id="autocomplete-key-wrap" data-src="https://bcs.org.bd/all-news-search" data-view="https://bcs.org.bd/page/ITEM_KEY" data-key="slug" data-column="title">
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="search-icon">
                            <button class="btn btn-outline-danger" type="button"><i onclick="formReset()" class="fas fa-sync-alt"></i></button>
                        </div>
                    </div> -->
                </div>
            </form>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.section-header -->
    <div class="page-body-area press-realise mb-5">
        <div class="container">
            <div class="pagination-top mb-5">
                <div class="row">
                    <div class="col-lg-6 mb-5">
                        <div class="trending-sectiion shadow-lg">
                            <a href="">
                                <div class="img position-relative">
                                    <img class="image-fit" src="./uploads/slider/bandhan.jpg" >
                                </div>
                            </a>
                            <div class="date mt-4">
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                            <!-- /.date -->
                            <a href="">
                                <div class="title">
                                    <h2>Lorem ipsum dolor sit amet.</h2>
                                </div>
                                <!-- /.title -->
                            </a>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, minima hic maxime nobis quas quisquam.s...
                                </p>
                                <a class="btn mt-4 text-dark" href="">Read More →</a>
                            </div>
                            <!-- /.description -->
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="trending-sectiion shadow-lg">
                            <a href="">
                                <div class="img position-relative">
                                    <img class="image-fit" src="./uploads/slider/bandhan.jpg" >
                                </div>
                            </a>
                            <div class="date mt-4">
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                            <!-- /.date -->
                            <a href="">
                                <div class="title">
                                    <h2>Lorem ipsum dolor sit amet.</h2>
                                </div>
                                <!-- /.title -->
                            </a>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed magnam id numquam. Autem, quos pariatur!...
                                </p>
                                <a class="btn mt-4 text-dark" href="">Read More →</a>
                            </div>
                            <!-- /.description -->
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="trending-sectiion shadow-lg">
                            <a href="">
                                <div class="img position-relative">
                                    <img class="image-fit" src="./uploads/slider/bandhan.jpg" >
                                </div>
                            </a>
                            <div class="date mt-4">
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                            <!-- /.date -->
                            <a href="">
                                <div class="title">
                                    <h2>Lorem ipsum dolor sit amet.</h2>
                                </div>
                                <!-- /.title -->
                            </a>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non repellendus quas alias nobis commodi vero....
                                </p>
                                <a class="btn mt-4 text-dark" href="">Read More →</a>
                            </div>
                            <!-- /.description -->
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="trending-sectiion shadow-lg">
                            <a href="">
                                <div class="img position-relative">
                                    <img class="image-fit" src="./uploads/slider/bandhan.jpg">
                                </div>
                            </a>
                            <div class="date mt-4">
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                            <!-- /.date -->
                            <a href="">
                                <div class="title">
                                    <h2>Lorem ipsum dolor sit amet.</h2>
                                </div>
                                <!-- /.title -->
                            </a>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, facere sint quis nemo porro veniam!...
                                </p>
                                <a class="btn mt-4 text-dark" href="">Read More →</a>
                            </div>
                            <!-- /.description -->
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
            <!-- /.page-body-head-area -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.page-body-area -->
    <!-- footer starts  -->
<?php include 'footer.php'?>
<!-- footer ends  -->

<!-- script starts  -->
<?php include 'script.php'?>
<!-- script ends  -->
    
</body>

</html>