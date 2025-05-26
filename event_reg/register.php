<?php


error_reporting(0);
set_time_limit(1000);
include "connection.php";


$MOBILE = $_GET['id'];
// echo "$MOBILE";
$sql1 = "SELECT *  FROM NAA_MEMBERS WHERE MEM_MOBILE_NO = '$MOBILE'";
$parse = ociparse($conn, $sql1);
oci_execute($parse);

// print_r($sql1);
while ($row = oci_fetch_assoc($parse)) {
    $user_row[] = $row;
}

// var_dump($division);
// echo count($division);
oci_free_statement($parse);


$MEM_ID = $user_row[0]['MEM_ID'];
// echo "$MEM_ID";


$MEM_MOBILE_NO = $user_row[0]['MEM_MOBILE_NO'];
// echo "$MEM_MOBILE_NO";



$sql1 = "SELECT *  FROM NAA_SIZE_MST";
$parse = ociparse($conn, $sql1);
oci_execute($parse);

// print_r($sql1);
while ($row = oci_fetch_assoc($parse)) {
    $size_chart[] = $row;
}

// var_dump($division);
// echo count($division);
oci_free_statement($parse);








if (isset($_POST['submit'])) {

    $NO_OF_MEM = 1;
    $MEM_RATE = $_POST['amountAM'];
    // $NO_OF_SPOUSE = $_POST['nos_val'];
    // $SPOUSE_RATE = $_POST['total'];
    // $NO_OF_CHILD1 = $_POST['nos_val1'];
    // $CHILD1_RATE = $_POST['total1'];
    // $NO_OF_CHILD2 = $_POST['nos_val2'];
    // $CHILD2_RATE = $_POST['total2'];
    // $NO_OF_GUEST = $_POST['nos_val3'];
    // $GUEST_RATE = $_POST['total3'];
    $NO_OF_DRIVER = $_POST['nos_val'];
    $DRIVER_RATE = $_POST['total'];
    // $PER_CONT = $_POST['pcr'];
    $TOTAL_AMT = $_POST['totalAM'];
    //    echo "$TOTAL_AMT ";
    $GIS_CODE = $_POST['GIS_CODE'];
    $EVENT_CODE = '01';








    $returnval = 0;




    $stid = oci_parse($conn, "begin PKG_event_reg.DPD_naa_Event_reg_INSERT1(:o_status,:MEM_MOBILE_NO,:NO_OF_MEM,:MEM_RATE,:NO_OF_SPOUSE,:SPOUSE_RATE,:NO_OF_CHILD,:CHILD_RATE,:PER_CONT,:TOTAL_AMT,:EVENT_CODE,:GIS_CODE,:MEM_ID,:PRE_CODE); end;");


    oci_bind_by_name($stid, ":o_status", $returnval, -1, SQLT_INT);
    oci_bind_by_name($stid, ":MEM_MOBILE_NO", $MEM_MOBILE_NO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":NO_OF_MEM", $NO_OF_MEM, -1, SQLT_INT);
    oci_bind_by_name($stid, ":MEM_RATE", $MEM_RATE, -1, SQLT_INT);
    oci_bind_by_name($stid, ":NO_OF_SPOUSE", $NO_OF_SPOUSE, -1, SQLT_INT);
    oci_bind_by_name($stid, ":SPOUSE_RATE", $SPOUSE_RATE, -1, SQLT_INT);
    oci_bind_by_name($stid, ":NO_OF_CHILD", $NO_OF_CHILD, -1, SQLT_INT);
    oci_bind_by_name($stid, ":CHILD_RATE", $CHILD_RATE, -1, SQLT_INT);
    // oci_bind_by_name($stid, ":NO_OF_CHILD2", $NO_OF_CHILD2, -1, SQLT_INT);
    // oci_bind_by_name($stid, ":CHILD2_RATE", $CHILD2_RATE, -1, SQLT_INT);
    // oci_bind_by_name($stid, ":NO_OF_GUEST", $NO_OF_GUEST, -1, SQLT_INT);
    // oci_bind_by_name($stid, ":GUEST_RATE", $GUEST_RATE, -1, SQLT_INT);
    // oci_bind_by_name($stid, ":NO_OF_DRIVER", $NO_OF_DRIVER, -1, SQLT_INT);
    // oci_bind_by_name($stid, ":DRIVER_RATE", $DRIVER_RATE, -1, SQLT_INT);
    oci_bind_by_name($stid, ":PER_CONT", $PER_CONT, -1, SQLT_INT);
    oci_bind_by_name($stid, ":TOTAL_AMT", $TOTAL_AMT, -1, SQLT_INT);
    oci_bind_by_name($stid, ":EVENT_CODE", $EVENT_CODE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":GIS_CODE", $GIS_CODE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":MEM_ID", $MEM_ID, -1, SQLT_INT);
    oci_bind_by_name($stid, ":PRE_CODE", $PRE_CODE, -1, SQLT_CHR);





    oci_execute($stid);

    // print $returnval;
    if ($returnval === 0) {
        echo '<script>alert("Please carefully fill up all the fields.")</script>';
    } else if ($returnval === 1) {
        header("location: event_pay.php?id=" . $MEM_MOBILE_NO);
    } else if ($returnval === 2) {
        echo '<script>alert("Your SMS contact number is a duplicate! Please try another number!")</script>';
    }

    oci_free_statement($stid);







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
        color: #559526;
        font-weight: bold;
    }


    /* .header img {
        float: left;
        width: 65px;
        height: 65px;
       
    } */


    .abcd img {
        float: left;
        width: 100px;
        height: 100px;
        margin-top: 30px;

    }

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
        width: 65px;
        height: 65px;
        /* background: #555; */
    }

    .header h2 {
        position: relative;
        color: #559526;
        top: 10px;
        font-weight: bold;
        /* text-shadow: 3px 3px 5px rgba(150, 150, 150, 1); */
        font-size: 30px;
        text-align: center;
    }

    .pop{
        width: 120px;
    }

    .pop1{
            width: 60px;
        }

        .pop2{
            width: 120px;
        }

    @media screen and (max-width: 600px) {
        .header h2 {
            position: relative;
            color: #559526;
            top: 10px;
            font-weight: bold;
            /* text-shadow: 3px 3px 5px rgba(150, 150, 150, 1); */
            font-size: 20px;
            text-align: center;

            
        }

        .hhhghh{
            width: fit-content;
        }

        .pop{
            width: 70px;
        }

        .pop1{
            width: 40px;
        }


        .pop2{
            width: 70px;
        }


        
    }
</style>

<body style="background-color: #7DCF8B;">
    <div class="container-fluid hhhghh" >
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
                            <div class="card " style="margin-top:20px;width: fit-content;">
                                <div class="card-header " style="background-color:#fff; font-weight: bold;">

                                    <div class="abcd">

                                        <!-- <img src="./image/logo_BCSWN.png" style="border-radius:50%" class="" alt="BD Logo"> -->


                                        <div class="text-center">
                                        <h5 style="font-size:22px;"> <span style="color: #559526;font-weight: bold;">Bandhan'84 - 2023 Registration Form</span> <br>
                                            <!-- <span style="color: #E67E22;font-size:15px;"> স্থান- </span><br> -->
                                            <span style="color: #E67E22;font-size:15px;"> তারিখ ও বার- ১৬ জুন ২০২৩ শুক্রবার </span> <br> 
                                            <!-- <span style="color: red;font-size:15px;">(অনলাইন সার্ভিস চার্জ প্রযোজ্য)</span> <br> -->
                                            <!-- <span style="color: #000 ;font-size:15px;"> Contact Us : 01718929297</span> -->

                                        </h5> <br>


                                        </div>

                                    </div>

                                </div>

                                <div class="card-body" >







                                    <form action="" method="POST" enctype="multipart/form-data">


                                        


                                        <div class="row m-3">
                                            <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
                                                <table class="table" style="color: #559526;">
                                                    <thead>
                                                        <tr>
                                                            <th >Fees</th>
                                                            <th >Rate</th>
                                                            <th ></th>
                                                            <th >Nos</th>
                                                            <th></th>
                                                            <th>Amount</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Bandhan'84 Alumni Member</th>
                                                            <th class=" text-center"><input type="number" class="form-control pop" name="amoun" id="amoun" placeholder="Enter amount" value="1500" readonly> </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop1" name="nos_val5" id="nos_val5" placeholder="nos" value="1" readonly >
                                                            </th>
                                                            <th class="text-center">=</th>

                                                            <th>
                                                                <input type="number" class="form-control pop2" name="amountAM" id="amountAM" placeholder="Enter amount" value="1500" readonly>
                                                            </th>

                                                        </tr>
                                                         <tr>
                                                            <th>Spouse</th>
                                                            <th class=" text-center"><input type="number" class="form-control pop" name="amoun" id="amoun" placeholder="Enter amount" value="1500" readonly> </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop1" name="nos_val5" id="nos_val5" placeholder="nos" value="1" readonly >
                                                            </th>
                                                            <th class="text-center">=</th>

                                                            <th>
                                                                <input type="number" class="form-control pop2" name="amountAM" id="amountAM" placeholder="Enter amount" value="1500" readonly>
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th>Child(Above 5 Years)</th>
                                                            <th class=" text-center"><input type="number" class="form-control pop" name="amoun" id="amoun" placeholder="Enter amount" value="1500" readonly> </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop1" name="nos_val5" id="nos_val5" placeholder="nos" value="1" readonly >
                                                            </th>
                                                            <th class="text-center">=</th>

                                                            <th>
                                                                <input type="number" class="form-control pop2" name="amountAM" id="amountAM" placeholder="Enter amount" value="1500" readonly>
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th>Child(Below 5 Years)</th>
                                                            <th class=" text-center"><input type="number" class="form-control pop" name="amoun" id="amoun" placeholder="Enter amount" value="1500" readonly> </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop1" name="nos_val5" id="nos_val5" placeholder="nos" value="1" readonly >
                                                            </th>
                                                            <th class="text-center">=</th>

                                                            <th>
                                                                <input type="number" class="form-control pop2" name="amountAM" id="amountAM" placeholder="Enter amount" value="1500" readonly>
                                                            </th>

                                                        </tr>

                                                        <tr>
                                                            <th>Guest</th>
                                                            <th class=" text-center"><input type="number" class="form-control pop" name="amoun" id="amoun" placeholder="Enter amount" value="1500" readonly> </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop1" name="nos_val5" id="nos_val5" placeholder="nos" value="1" readonly >
                                                            </th>
                                                            <th class="text-center">=</th>

                                                            <th>
                                                                <input type="number" class="form-control pop2" name="amountAM" id="amountAM" placeholder="Enter amount" value="1500" readonly>
                                                            </th>

                                                        </tr>

                                                        <tr>
                                                            <th> Driver</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop" name="amount" id="amount" placeholder="Enter amount" value="500" readonly>
                                                            </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">

                                                                <input type="text" class="form-control pop1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" maxlength="2" name="nos_val" id="nos_val" placeholder="nos" value="0" oninput="calc();">

                                                            </th>
                                                            <th class="text-center">=</th>
                                                            <th>
                                                                <input type="number" class="form-control pop2" name="total" id="total" placeholder="Enter Amount" value="0" oninput="calc();">
                                                            </th>

                                                        </tr>
                                                        <!-- <tr>
                                                            <th>Child (Above Ten)</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop" name="amount1" id="amount1" placeholder="Enter Student Name" value="1500" readonly>
                                                            </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">

                                                                <input type="text" class="form-control pop1" name="nos_val1" id="nos_val1" placeholder="nos" value="0" oninput="calc();">

                                                            </th>
                                                            <th class="text-center">=</th>
                                                            <th>
                                                                <input type="number" class="form-control pop2" name="total1" id="total1" placeholder="Enter Amount" value="0" oninput="calc();">
                                                            </th>

                                                        </tr> -->

                                                        <!-- <tr>
                                                            <th>Parent/Guest</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop" name="amount3" id="amount3" placeholder="Enter Student Name" value="2000" readonly>
                                                            </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">

                                                                <input type="text" class="form-control pop1" name="nos_val3" id="nos_val3" placeholder="nos" value="0" oninput="calc();">

                                                            </th>
                                                            <th class="text-center">=</th>
                                                            <th>
                                                                <input type="number" class="form-control pop2" name="total3" id="total3" placeholder="Enter Amount" value="0" oninput="calc();">
                                                            </th>

                                                        </tr> -->


                                                        <!-- <tr>
                                                            <th>Driver</th>
                                                            <th class="text-center">
                                                                <input type="number" class="form-control pop" name="amount4" id="amount4" placeholder="Enter Student Name" value="1000" readonly>
                                                            </th>
                                                            <th class=" text-center">x</th>
                                                            <th class="text-center">

                                                                <input type="text" class="form-control pop1" name="nos_val4" id="nos_val4" placeholder="nos" value="0" oninput="calc();">

                                                            </th>
                                                            <th class="text-center">=</th>
                                                            <th>
                                                                <input type="number" class="form-control pop2" name="total4" id="total4" placeholder="Enter Amount" value="0" oninput="calc();">
                                                            </th>

                                                        </tr> -->
                                                        <tr>
                                                            <th>&emsp;</th>
                                                            <th class=" text-center"></th>
                                                            <th class=" text-center">Total Nos:</th>
                                                            <th>
                                                                <input type="number" class="form-control pop1" name="total_nos" id="total_nos" placeholder="nos" value="1" readonly>
                                                            </th>
                                                            <th class="text-center">Total Tk=</th>
                                                            <th>
                                                                <input type="number" class="form-control pop2" name="totalAM" id="totalAM" placeholder="Enter Amount" value="1500" readonly>
                                                            </th>
                                                        </tr>

                                                    </tbody>
                                                </table>


                                            </div>


                                            
                                        </div>


                                        <div class="row">
                                          <!-- batch starts  -->
                                            <!-- name starts  -->
                                            <!-- <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Polo Shirt Confirm :</label>
                                                <select class="form-control" style="width:70%;"  name="GIS_CODE" id="GIS_CODE" required>
                                                    <option value="">Select Polo Shirt Size </option>
                                                    <?php
                                                for ($i = 0; $i < count($size_chart); $i++) {

                                                    echo "<option value='" . $size_chart[$i]["SIZE_CODE"] . "'>" . $size_chart[$i]["SIZE_NAME"] . "</option>";
                                                }

                                                ?>
                                                   
                                                </select>

                                               
                                            </div> -->
                                            <!-- name ends  -->
                                            <!-- batch ends  -->
                                        </div>



                                        


                                        <div class="container mt-4 col-md-4 col-sm-4" style="margin-right: 315px;">




                                            <button type='submit' class='btn btn-md btn-success btn-block' name='submit' id='submit' style="color: #fff; width: 80%;"> <b>
                                                    Next</b></button>

                                        </div>

                                    </form>

                                    <div class="row">
                                        <!-- name starts  -->
                                        <div class="form-group col-md-12 col-lg-12 col-sm-12 pl-0">
                                                <div style="margin-top:30px;text-align: center; font-size: 14px;font-weight: bold;">
                                                    <p style="padding-top: 10px;">আপনার Payment প্রক্রিয়াটি সঠিকভাবে সম্পূর্ণ হওয়ার পরে <span style="color: red;"> Bandhan'84 </span> হতে প্রাপ্ত <span style="color: red;"> SMS </span> টি সংরক্ষণ করে রাখুন।</p>
                                                </div>


                                            </div>
                                            <!-- name ends  -->
                                    </div>


                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 ">

                                        </div>

                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 text-center">
                                            <p class="lead marginbottom" style="color: #061442;font-family: Monotype Corsiva; font-size: 20px; font-weight: bold;">Powered by </p>

                                            <!-- <p class="lead marginbottom" style="color: #061442;font-family: Monotype Corsiva; font-size: 40px; font-weight: bold;">Ishop Trading</p> -->
                                            <img src="../image/itbl_icon_1.jpeg" height="60px" width="250px" alt="">
                                            <p style="color: #061442; font-size: 12px; font-weight: bold;">Mobile No: 01718929297, Email : mzr071@gmail.com</p>
                                            <!-- <p style="color: #061442; font-size: 22px; font-weight: bold;">Email : mzr071@gmail.com</p> -->
                                            <p style="color: #061442; font-size: 12px; font-weight: bold;">Address : 32 Topkhana Road,Chattagram Bhaban, 3rd Floor,
                                                           Purana Paltan, Dhaka - 1000</p>


                                        </div>


                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 ">
                                        </div>


                                    </div>



                                    <div class="col-md-12 col-lg-12 col-sm-12" style="border: 3px solid #559526;margin-top:20px;">
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




      <!-- using online scripts -->
      <script>
        function calc() {
            var amount = document.getElementById("amount").value;
            var amount = parseInt(amount, 10);
            var nos_val = document.getElementById("nos_val").value;
            var nos_val = parseInt(nos_val, 10);

            
            
            var total = nos_val * amount;
            document.getElementById("total").value = total;




            // var amount1 = document.getElementById("amount1").value;
            // var amount1 = parseInt(amount1, 10);
            // var nos_val1 = document.getElementById("nos_val1").value;
            // var nos_val1 = parseInt(nos_val1, 10);
            // var total1 = amount1 * nos_val1;
            // document.getElementById("total1").value = total1;


          


            // var amount3 = document.getElementById("amount3").value;
            // var amount3 = parseInt(amount3, 10);
            // var nos_val3 = document.getElementById("nos_val3").value;
            // var nos_val3 = parseInt(nos_val3, 10);
            // var total3 = amount3 * nos_val3;
            // document.getElementById("total3").value = total3;


            // var amount4 = document.getElementById("amount4").value;
            // var amount4 = parseInt(amount4, 10);
            // var nos_val4 = document.getElementById("nos_val4").value;
            // var nos_val4 = parseInt(nos_val4, 10);
            // var total4 = amount4 * nos_val4;
            // document.getElementById("total4").value = total4;



            var amountAM = document.getElementById("amountAM").value;
            var amountAM = parseInt(amountAM, 10);
            var total = document.getElementById("total").value;
            var total = parseInt(total, 10);

            // var total1 = document.getElementById("total1").value;
            // var total1 = parseInt(total1, 10);
            // var total3 = document.getElementById("total3").value;
            // var total3 = parseInt(total3, 10);
            // var total4 = document.getElementById("total4").value;
            // var total4 = parseInt(total4, 10);

            // var totalAM = amountAM + total + total1 + total3 + total4;
            var totalAM = amountAM + total;
            document.getElementById("totalAM").value = totalAM;


            var nos_val5 = document.getElementById("nos_val5").value;
            var nos_val5 = parseInt(nos_val5, 10);
            var nos_val = document.getElementById("nos_val").value;
            var nos_val = parseInt(nos_val, 10);

            // var nos_val1 = document.getElementById("nos_val1").value;
            // var nos_val1 = parseInt(nos_val1, 10);
            // var nos_val3 = document.getElementById("nos_val3").value;
            // var nos_val3 = parseInt(nos_val3, 10);
            // var nos_val4 = document.getElementById("nos_val4").value;
            // var nos_val4 = parseInt(nos_val4, 10);

            // var total_nos = nos_val5 + nos_val + nos_val1  + nos_val3 + nos_val4;
            var total_nos = nos_val5 + nos_val;
            document.getElementById("total_nos").value = total_nos;



           



        }
    </script>



<script>
      
        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
                textbox.addEventListener(event, function(e) {
                    if (inputFilter(this.value)) {
                        // Accepted value
                        if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                            this.classList.remove("input-error");
                            this.setCustomValidity("");
                        }
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        
                        this.classList.add("input-error");
                        this.setCustomValidity(errMsg);
                        this.reportValidity();
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        
                        this.value = "";
                    }
                });
            });
        }


      

        setInputFilter(document.getElementById("nos_val"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value) && (value === "" || parseInt(value) <= 1);
        }, "Please Enter Your Driver Number 1");


        setInputFilter(document.getElementById("total_nos"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value) && (value === "" || parseInt(value) == 2);
        }, "Please Enter Your Child");


        setInputFilter(document.getElementById("total"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value) && (value === "" || parseInt(value) == 500);
        }, "Please Enter Your Personal Contribution");
    </script>




















</body>

</html>