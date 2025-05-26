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
    <link rel="icon" type="image/png" href="../uploads/Bandhan84.jpeg" />
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
    <!-- Executive Committe Starts-->
    <div class="executive-content container">
        <div class="executive-box overflow-hidden p-3">

            <div class="row box-top">
                <div class="col-md-6 text-start">
                    <h2>Our Executive Committee</h2>
                </div>


                <div class="col-12">
                    <hr>
                </div>
            </div>
            <img class="middle-pattern" src="./theme/assets/images/pattern/executive_group_pattern.png" alt="">
            <img class="right-pattern" src="./theme/assets/images/pattern/box_pattern.png" alt="">

            <div class="row card-container px-2">
                <?php

                for ($i = 0; $i < count($user_row); $i++) {
                    if($user_row[$i]['POS_TYPE_CODE'] == '01'){
                        ?>

                        <div class="col-md-0 col-lg-4 temp-div"></div>

                    <div class="col-md-6 col-lg-4 mx-auto card-column">
                        <div class="card-box animated-card text-center">
                            <div class="color">
                                <div class="top-content text-center p-2 pt-5">
                                    <img src="./uploads/committee_photo/default_profile_pic.png" alt="">
                                    <div class="name mt-4 w-100">
                                        <h3><?php echo $user_row[$i]['NAME'] ?></h3>
                                    </div>
                                    <!-- <p class="my-2">SPEED TECHNOLOGY &amp; ENGINEERING LTD.</p> -->
                                    <h5> <?php echo $user_row[$i]['POSITION'] ?></h5>
                                </div>
                                <div class="btm-content card-btm w-100">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#member<?php echo $user_row[$i]['POS_ID'] ?>">VIEW
                                        PROFILE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-0 col-lg-4 temp-div"></div>

                        <?php
                    }else{
                        ?>
                        <div class="col-md-6 col-lg-4 mx-auto card-column">
                        <div class="card-box animated-card text-center">
                            <div class="color">
                                <div class="top-content text-center p-2 pt-5">
                                    <img src="./uploads/committee_photo/default_profile_pic.png" alt="">
                                    <div class="name mt-4 w-100">
                                        <h3><?php echo $user_row[$i]['NAME'] ?></h3>
                                    </div>
                                    <!-- <p class="my-2">SPEED TECHNOLOGY &amp; ENGINEERING LTD.</p> -->
                                    <h5> <?php echo $user_row[$i]['POSITION'] ?></h5>
                                </div>
                                <div class="btm-content card-btm w-100">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#member<?php echo $user_row[$i]['POS_ID'] ?>">VIEW
                                        PROFILE</button>
                                </div>
                            </div>
                        </div>
                    </div>


                     <?php
                    }


                ?>

                    

                    <!-- Modal -->
                    <div class="modal fade" id="member<?php echo $user_row[$i]['POS_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content executive-modal">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Executive Committee Members</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center px-4">
                                    <img class="pattern-1" src="./theme/assets/images/pattern/Vector_1.png" alt="">
                                    <img class="pattern-2" src="./theme/assets/images/pattern/Vector_2.png" alt="">
                                    <img class="pattern-3" src="./theme/assets/images/pattern/Vector_3.png" alt="">
                                    <img class="pattern-4" src="./theme/assets/images/pattern/Vector_4.png" alt="">
                                    <img class="pattern-5" src="./theme/assets/images/pattern/Vector_5.png" alt="">

                                    <img class="modal-image" src="./uploads/committee_photo/default_profile_pic.png" alt="">

                                    <h3 class="modal-name"><?php echo $user_row[$i]['NAME'] ?></h3>
                                    <h5 class="modal-designation"><?php echo $user_row[$i]['POSITION'] ?> </h5>
                                    <hr>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-start">Profession</td>
                                                <td>:</td>
                                                <td class="modal-company text-start"><?php echo $user_row[$i]['PROFESSION'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-start">Mobile</td>
                                                <td>: </td>
                                                <td class="modal-mobile text-start"><?php echo $user_row[$i]['MEM_MOBILE_NO'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-start">Email</td>
                                                <td>: </td>
                                                <td class="modal-email text-start"><?php echo $user_row[$i]['EMAIL'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-start">Address</td>
                                                <td>:</td>
                                                <td class="modal-address text-start"> <?php echo $user_row[$i]['ADDRESS'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- modal-body  -->
                                <!-- <img class="w-100" src="./theme/assets/images/background/modal-decoration.png" alt=""> -->
                            </div>
                        </div>
                    </div>



                <?php
                }
                ?>







            </div>

        </div>
        <img class="executive-btm-pattern-right" src="./theme/assets/images/page/page_left_pattern.png" alt="">




    </div>
    <!-- /.executive-content -->







    <!-- Executive Committe Ends -->


    <!-- footer starts  -->
    <?php include 'footer.php'?>
    <!-- footer ends  -->

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


