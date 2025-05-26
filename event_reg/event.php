<?php


error_reporting(0);
set_time_limit(1000);
include "connection.php";

$sql3 = "SELECT * FROM NAA_PROF_MST";
$parse = ociparse($conn, $sql3);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $profession[] = $row;
}

// var_dump($cadre);
oci_free_statement($parse);

$sql4 = "SELECT * FROM NAA_CAT";
$parse = ociparse($conn, $sql4);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $faculty[] = $row;
}

// var_dump($cadre);
oci_free_statement($parse);

















if (isset($_POST['submit'])) {

    $MEM_PHOTO = $_POST['basedata'];
    $MEM_NAME = $_POST['MEM_NAME'];
    $MEM_MOBILE_NO = $_POST['MEM_MOBILE_NO'];
    // $COLL_ROLL_NO = '';
    $CAT_CODE = $_POST['CAT_CODE'];
    $YR_OF_PASS = '1990';
    $PRE_EMAIL = $_POST['PRE_EMAIL'];
    $PROF_CODE = $_POST['PROF_CODE'];
    $DESIGNATION = $_POST['DESIGNATION'];
    $PRE_DIV = '01';
    $PRE_DIST = '35';
    $PRE_THANA = '199';
    $PRE_POST_CODE = '03';
    // $COLL_SEC = '';
    // $F_NAME = '';
    // $M_NAME = '';
    // $PRE_ADDR  = '';
    // $PRE_DIV = '';
    // $PRE_DIST = '';
    // $PRE_THANA = '';
    // $PRE_PHONE = $_POST['reg_number'];
    
    // $PER_ADDR  = '';
    // $PER_DIV = '';
    // $PER_DIST = '';

    // $PER_THANA = '';
    // $PER_PHONE = '';
    // $PER_EMAIL = '';
    // $PROF_CODE = '';
    // $DESIGNATION = '';
    // $OFFICE_NAME = '';
    // $OFF_ADDR = '';
    // $OFF_DIV = $_POST['OFF_DIV'];
    // $OFF_DIST = $_POST['OFF_DIST'];
    // $OFF_THANA = $_POST['OFF_THANA'];
    // $OFF_PHONE= $_POST['OFF_PHONE'];
    // $OFF_EMAIL = $_POST['OFF_EMAIL'];
    // $mem_type = $_POST['MEM_TYPE'];
    // $DOB = $_POST['DOB'];
    // $DOM = $_POST['DOM'];
    // $PRE_POST_CODE = $_POST['PRE_POST_CODE'];
  








    $returnval = 0;
   



    $stid = oci_parse($conn, "begin PKG__member.DPD_naa_member_INSERT(:o_status,:MEM_PHOTO,:MEM_NAME,:MEM_MOBILE_NO,:COLL_ROLL_NO,:CAT_CODE,:COLL_SEC,:YR_OF_PASS,:F_NAME,:M_NAME,:PRE_ADDR,:PRE_DIV,:PRE_DIST,:PRE_THANA,:PRE_PHONE,:PRE_EMAIL,:PER_ADDR,:PER_DIV,:PER_DIST,:PER_THANA, :PER_PHONE, :PER_EMAIL,:PROF_CODE,:DESIGNATION,:OFFICE_NAME,:OFF_ADDR,
   :OFF_DIV,:OFF_DIST,:OFF_THANA,:OFF_PHONE,:OFF_EMAIL,:mem_type,:DOB,:DOM,:PRE_POST_CODE); end;");


    oci_bind_by_name($stid, ":o_status", $returnval, -1, SQLT_INT);
    oci_bind_by_name($stid, ":MEM_PHOTO", $MEM_PHOTO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":MEM_NAME", $MEM_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":MEM_MOBILE_NO", $MEM_MOBILE_NO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":COLL_ROLL_NO", $COLL_ROLL_NO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":CAT_CODE", $CAT_CODE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":COLL_SEC", $COLL_SEC, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":YR_OF_PASS", $YR_OF_PASS, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":F_NAME", $F_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":M_NAME", $M_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_ADDR", $PRE_ADDR, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_DIV", $PRE_DIV, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_DIST", $PRE_DIST, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_THANA", $PRE_THANA, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_PHONE", $PRE_PHONE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_EMAIL", $PRE_EMAIL, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PER_ADDR", $PER_ADDR, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PER_DIV", $PER_DIV, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PER_DIST", $PER_DIST, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PER_THANA", $PER_THANA, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PER_PHONE", $PER_PHONE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PER_EMAIL", $PER_EMAIL, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PROF_CODE", $PROF_CODE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":DESIGNATION", $DESIGNATION, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFFICE_NAME", $OFFICE_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFF_ADDR", $OFF_ADDR, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFF_DIV", $OFF_DIV, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFF_DIST", $OFF_DIST, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFF_THANA", $OFF_THANA, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFF_PHONE", $OFF_PHONE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":OFF_EMAIL", $OFF_EMAIL, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":mem_type", $mem_type, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":DOB", $DOB, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":DOM", $DOM, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PRE_POST_CODE", $PRE_POST_CODE, -1, SQLT_CHR);

    

    oci_execute($stid);

    // print $returnval;
    //print $returnval;
    if ($returnval === 0) {
        echo '<script>alert("Please carefully fill up all the fields.")</script>';
    } else if ($returnval === 1) {
        header("location: register.php?id=" . $MEM_MOBILE_NO);
    } else if ($returnval === 2) {
        echo '<script>alert("Mobile No Already Used.")
        // window.location.href = "https://ndcaa.iadmissionbd.net/index1.php;
        </script>';
    }
    oci_free_statement($stid);
    // oci_close($conn);

   

















}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet" />
    <title>Bandhan'84, BUET</title>
    <link rel="icon" href="../uploads/Bandhan84.jpeg" type="image/ico">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />

</head>

<style>
    /* body {
        position: relative;
        overflow-x: hidden;
        
        font-family: "Roboto", sans-serif;
        background-image: url(./image/bg3.jpg);
        background-size: 100vh 100vw;
        background-position: center;
        

    } */

    a:hover {
        color: white;
        text-decoration: none;
    }

    body,
    html {
        height: 100%;
        scroll-behavior: smooth;
        /* background-color: #257150; */

    }

    label {
        color: #ac1f25;
        font-weight: bold;
    }


    


    /* .abcd img {
        float: left;
        width: 100px;
        height: 100px;
        margin-top: 30px;

    }*/

    .abcd h1,
    h3,
    h4,
    h5,
    h6 {
        position: relative;
        top: 18px;
        left: 10px;
    } 



    .header img {
        float: left;
        width: 80px;
        height: 80px;
        /* background: #555; */
    }

    .header h2
     {
        position: relative;
        color: #ac1f25;  top:10px; font-weight: bold; font-size:30px;text-align: center;
    }

    @media screen and (max-width: 600px) {
        .header h2
     {
        position: relative;
        color: #ac1f25;  top:10px; font-weight: bold;  font-size:20px;text-align: center;
    }
}
    
</style>

<body style="background-color: #ac1f25;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">


                <div class="row" style="background-color: #fff">
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="col-md-8 col-sm-8">
                        <div class="header" >
                            <img src="../uploads/Bandhan84.jpeg" style="border: 1px solid #ac1f25;" class="mr-4 " alt="BD Logo">
                            <h2>
                            Bandhan'84, BUET </h2>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <!-- <img src="./image/logo_BCSWN.jpg" style="border-radius:50%" class="abcd" alt="BD Logo" height="60px" width="60px">  -->
                    </div>
                </div>



            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">

                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
                            <div class="card " style="margin-top:20px;">
                                <div class="card-header " style="background-color:#fff">

                                <div class="abcd">

                                    <!-- <img src="./image/logo_BCSWN.png" style="border-radius:50%" class="" alt="BD Logo"> -->


                                    <div class="text-center">
                                        <h5 style="font-size:22px;"> <span style="color: #ac1f25;font-weight: bold;">Event Registration </span> <br>
                                            <!-- <span style="color: #E67E22;font-size:15px;"> স্থান-ভাওয়াল ন্যাশনাল পার্ক( চম্পা স্পট) </span><br>
                                            <span style="color: #0AFD80;font-size:15px;"> চাঁদার পরিমাণ- 2000/- <br> </span> <span style="color: red;font-size:15px;">(অনলাইন সার্ভিস চার্জ প্রযোজ্য)</span> <br>
                                            <span style="color: #E0E3E1 ;font-size:15px;"> Contact Us : 01718929297,01712205975,01711326254,01715096700 </span> -->

                                        </h5> <br>


                                    </div>

                                    </div>

                                </div>

                                <div class="card-body">

                                  <!-- mobile search button  -->
                                    <!-- <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Mobile <label style="color:red; font-weight:bold">*</label> :</label>
                                                <input style="width:70%;" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" class="form-control is-invalid" aria-describedby="validationServer03Feedback" name="mem_mobile" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" id="mem_mobile" value="" placeholder="11 digit Mobile no Example(017********)" required>

                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    Please provide a valid Mobile Number.
                                                </div>
                                            </div>
                                           


                                         
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <button type='submit1' class='btn btn-md btn-primary btn-block' name='submit1' id='submit1' style="color: #000;width:90%; margin-top: 40px;"> <b>
                                                        Existing Information Search</b></button>




                                            </div>
                                          

                                        </div>
                                    </form> -->






                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row m-3" style="padding-top: 20px;">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-12">


                                            </div> -->

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold" style="color: #ac1f25">Photograph :</label>

                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                        <input type="file" accept="image/*" name="file" id="file" onchange="preview_image(event)" required>


                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <img id="output_image" width="130px" height="130px"></img>
                                                        <input type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" name="basedata" id="basedata" hidden>
                                                        <h6 style="color: red;font-size: 10px;">Image size must be 100kb * 100kb</h6>

                                                        
                                                    </div>


                                                    <div class="col-lg-2 col-md-2 col-sm-12"></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <!-- name starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Name <label style="color:red; font-weight:bold">*</label> :</label>
                                                <!-- <input type="text" name="u_id" id="u_id" value="<?php echo $W_ID; ?>" hidden> -->
                                                <!-- <input type="text" name="pass" id="pass" value="<?php echo $W_PASSWORD; ?>" hidden> -->
                                                <input style="width:70%;" type="text" class="form-control" placeholder="Enter Name" name="MEM_NAME" id="MEM_NAME" value="" required>

                                                

                                            </div>
                                            <!-- name ends  -->


                                            <!-- mobile starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Mobile <label style="color:red; font-weight:bold">*</label> :</label>
                                                <input style="width:70%;" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" class="form-control"  name="MEM_MOBILE_NO" id="MEM_MOBILE_NO" value="" placeholder="Mobile Number" required>

                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    Please provide a valid Mobile Number.
                                                </div>
                                            </div>
                                            <!-- mobile ends  -->







                                            <!-- batch starts  -->
                                            <!-- name starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Batch  :</label>
                                                
                                                <input style="width:70%;" type="text" class="form-control placeholder="Enter Your Batch" name="YR_OF_PASS" id="YR_OF_PASS" value="1984" readonly>

                                               

                                            </div>
                                            <!-- name ends  -->
                                            <!-- batch ends  -->



                                            <!-- work station starts  -->
                                            <!-- <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                    <label class="form-label" for="validationServer03">Present Work Station <label style="color:red; font-weight:bold">*</label> :</label>
                                                    
                                                    <input type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Present Work Station" name="o_office" id="o_office" value="" required>

                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        Please provide Your Present Work Station .
                                                    </div>

                                                </div> -->
                                            <!-- work station ends  -->



                                            <!-- Faculty starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Department <label style="color:red; font-weight:bold">*</label>:</label>
                                                <select class="form-control" style="width:70%;"  name="CAT_CODE" id="CAT_CODE" required>
                                                    <option value="">Select Faculty</option>
                                                    <?php
                                                    for ($i = 0; $i < count($faculty); $i++) {

                                                        echo "<option value='" . $faculty[$i]["CAT_CODE"] . "'>" . $faculty[$i]["CAT_NAME"] . "</option>";
                                                    }

                                                    ?>
                                                </select>

                                               
                                            </div>
                                            <!-- Faculty ends  -->



                                            <!-- Profession starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Profession <label style="color:red; font-weight:bold">*</label>:</label>
                                                <select class="form-control" style="width:70%;"  name="PROF_CODE" id="PROF_CODE" required>
                                                    <option value="">Select Profession</option>
                                                    <?php
                                                    for ($i = 0; $i < count($profession); $i++) {

                                                        echo "<option value='" . $profession[$i]["PROF_CODE"] . "'>" . $profession[$i]["PROF_NAME"] . "</option>";
                                                    }

                                                    ?>
                                                </select>

                                               
                                            </div>
                                            <!-- Profession ends  -->








                                            <!-- designation starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Designation :</label>

                                                <input style="width:70%;" type="text" class="form-control"  placeholder="Designation" name="DESIGNATION" id="DESIGNATION" value="" required>


                                               


                                            </div>
                                            <!-- designation ends  -->













                                            <!-- email starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Email <label style="color:red; font-weight:bold">*</label> :</label>
                                                
                                                <input style="width:70%;" type="email" class="form-control"  placeholder="Email Address" name="PRE_EMAIL" id="PRE_EMAIL" value="" required>


                                            </div>
                                            <!-- email ends  -->



                                            <!-- payment starts  -->
                                            <!-- <div class="form-group col-6 pl-0">
                                                    <label class="form-label" for="validationServer03">Payment <label style="color:red; font-weight:bold">*</label> :</label>
                                                    
                                                    <input type="number" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Payment" name="number" id="number" value="" required>

                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        Only We Accept a Bkash Payment
                                                    </div>


                                                    <p style="margin-top: 10px; font-weight: bold; color: red;">Merchant bKash Wallet No: 015 3333 6666</p>


                                                </div> -->
                                            <!-- payment ends  -->
                                        </div>


                                        <div class="container mt-4 col-md-4 col-sm-4">




                                            <button type='submit' class='btn btn-md btn-primary btn-block' name='submit' id='submit' style="color: #000;"> <b>
                                                    Next</b></button>

                                        </div>

                                    </form>


                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 ">

                                        </div>

                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                            <p class="lead marginbottom" style="color: #061442;font-family: Monotype Corsiva; font-size: 20px; font-weight: bold;">Powered by </p>
                                            <img src="../image/itbl_icon_1.jpeg" height="40px" width="250px" alt="">


                                        </div>


                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 ">
                                        </div>


                                    </div>



                                    <div class="col-md-12 col-lg-12 col-sm-12" style="border: 3px solid #F35F73;margin-top:20px;">
                                        <img src="../image/footer_aamarPay.png" alt="" style="width: 100%;">
                                    </div>




                                </div>


                            </div>
                        </div>
                    </div>






                </div>

            </div>
        </div>
    </div>






















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>




    <script type='text/javascript'>
        /*function preview_image(event) 
        {
           var reader = new FileReader();
           reader.onload = function()
           {
              var output = document.getElementById('output_image');
              output.src = reader.result;
           }
           reader.readAsDataURL(event.target.files[0]);
        }*/
        const MAX_WIDTH = 70;
        const MAX_HEIGHT = 80;
        const MIME_TYPE = "image/jpeg";
        const QUALITY = 0.9;

        const input = document.getElementById("file");
        input.onchange = function(ev) {
            const file = ev.target.files[0]; // get the file
            const blobURL = URL.createObjectURL(file);
            const img = new Image();
            img.src = blobURL;
            img.onerror = function() {
                URL.revokeObjectURL(this.src);
                // Handle the failure properly
                console.log("Cannot load image");
            };
            img.onload = function() {
                URL.revokeObjectURL(this.src);
                const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                const canvas = document.createElement("canvas");
                canvas.width = newWidth;
                canvas.height = newHeight;
                const ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
                canvas.toBlob(
                    (blob) => {
                        // Handle the compressed image. es. upload or save in local state
                        //displayInfo('Original file', file);
                        //displayInfo('Compressed file', blob);
                    },
                    MIME_TYPE,
                    QUALITY
                );
                var dataURL = canvas.toDataURL();
                document.getElementById('output_image')
                    .setAttribute(
                        'src', dataURL
                    );
                dataURL = dataURL.replace(/^data:image\/[a-z]+;base64,/, "");
                document.getElementById('basedata').value = dataURL;
                console.log(dataURL);
            };
        };

        function calculateSize(img, maxWidth, maxHeight) {
            let width = img.width;
            let height = img.height;

            // calculate the width and height, constraining the proportions
            if (width > height) {
                if (width > maxWidth) {
                    height = Math.round((height * maxWidth) / width);
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width = Math.round((width * maxHeight) / height);
                    height = maxHeight;
                }
            }
            return [width, height];
        }
    </script>















</body>

</html>