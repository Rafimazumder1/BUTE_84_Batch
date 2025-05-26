<?php


error_reporting(0);
set_time_limit(1000);
include "connection.php";


$MOBILE = $_GET['id'];


// $sql1 = "SELECT NAA_MEMBERS.MEM_NAME,NAA_MEMBERS.PRE_EMAIL,NAA_EVENTS_REG.MEM_ID,NAA_EVENTS_REG.MEM_MOBILE_NO,NAA_EVENTS_REG.TOTAL_AMT,NAA_EVENTS_REG.CHILD1_RATE,NAA_EVENTS_REG.CHILD2_RATE,NAA_EVENTS_REG.DRIVER_RATE,NAA_EVENTS_REG.GUEST_RATE,NAA_EVENTS_REG.SPOUSE_RATE,NAA_EVENTS_REG.MEM_RATE,NAA_INVOICE_HDR.INV_NO 
// FROM NAA_MEMBERS,NAA_EVENTS_REG, NAA_INVOICE_HDR
// WHERE NAA_EVENTS_REG.MEM_ID = NAA_MEMBERS.MEM_ID AND NAA_INVOICE_HDR.MEM_ID = NAA_MEMBERS.MEM_ID AND  NAA_EVENTS_REG.MEM_MOBILE_NO = '$MOBILE'";
// $parse = ociparse($conn, $sql1);
// oci_execute($parse);

// // print_r($sql1);
// while ($row = oci_fetch_assoc($parse)) {
//     $user_row[] = $row;
// }

// // var_dump($division);
// // echo count($division);
// oci_free_statement($parse);


$INV_TYPE = '01';
// echo "$INV_TYPE";


/* Start Procedure for Report */
$curs = oci_new_cursor($conn);

$stid = oci_parse($conn, "begin PKG_invoice.dpd_invoice_select(:cur_data,:MOBILE,:INV_TYPE); end;");


oci_bind_by_name($stid, ":cur_data", $curs, -1, OCI_B_CURSOR);
oci_bind_by_name($stid, ":MOBILE", $MOBILE, -1, SQLT_CHR);
oci_bind_by_name($stid, ":INV_TYPE", $INV_TYPE, -1, SQLT_CHR);



oci_execute($stid);
oci_execute($curs);


while (($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {

   $user_row[] = $row;
}


$MEM_ID = $user_row[0]['MEM_ID'];
// echo "$MEM_ID";























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
    <link rel="icon" href="../uploads/Bandhan84.jpeg"type="image/ico">

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
    }
</style>

<body style="background-color: #7DCF8B;">
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
                                <div class="card-header " style="background-color:#fff"; font-weight: bold;>

                                    <div class="abcd">

                                        <!-- <img src="./image/logo_BCSWN.png" style="border-radius:50%" class="" alt="BD Logo"> -->


                                        <div class="text-center">
                                        <h5 style="font-size:22px;"> <span style="color: #559526;font-weight: bold;">Bandhan'84, BUET  Reunion - 2024 Registration Form </span> <br>
                                            <!-- <span style="color: #E67E22;font-size:15px;"> স্থান-   </span><br> -->
                                            <!-- <span style="color: #E67E22;font-size:15px;">  তারিখ ও বার- ১৬ জুন ২০২৩ শুক্রবার </span> <br>  -->
                                            <!-- <span style="color: red;font-size:15px;">(অনলাইন সার্ভিস চার্জ প্রযোজ্য)</span> <br> -->
                                            <!-- <span style="color: #000 ;font-size:15px;"> Contact Us : 01718929297</span> -->

                                        </h5> <br>


                                        </div>

                                    </div>

                                </div>

                                <div class="card-body">







                                    <form action="aamarPay_cURL/process.php" method="POST" enctype="multipart/form-data">


                                        <div class="row">
                                            
                                            <!-- name starts  -->
                                            <div class="form-group col-md-4 col-lg-4 col-sm-12 pl-0">
                                            <label class="form-label" for="validationServer03">Total Amount <label style="color:#559526; font-weight:bold">*</label> :</label>
                                                   
                                                   <input style="width: 50%;" type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Enter Amount" name="TOTAL_PAYABLE" id="TOTAL_PAYABLE" value="<?php echo $user_row[0]['TOTAL_PAYABLE'] ?>" readonly>


                                                   


                                            </div>
                                            <!-- name ends  -->

                                            


                                            <!-- name starts  -->
                                            <div class="form-group col-md-8 col-lg-8 col-sm-12 pl-0">
                                            <div style="margin-top:30px;text-align: center; font-size: 14px;font-weight: bold; border: 2px solid #559526;">
                                                    <p style="padding-top: 10px;">আপনার Payment প্রক্রিয়াটি সঠিকভাবে সম্পূর্ণ হওয়ার পরে <span style="color: red;"> Bandhan'84 </span> হতে প্রাপ্ত <span style="color: red;"> SMS </span> টি সংরক্ষণ করে রাখুন।</p>
                                                </div>


                                            </div>
                                            <!-- name ends  -->


                                            


                                           


                                          


                                            <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:20px;">

                                            <div class="row">
                                                <div class="col-xl-2 col-md-2 col-lg-2 col-sm-12"></div>

                                                <div class="col-xl-8 col-md-8 col-lg-8 col-sm-12" >
                                                <img src="../image/bkashss.png" alt="" style="width: 100%;">

                                                <h5 style="color: red; font-weight: bold;text-align:justify;"> Payment প্রক্রিয়াটি পরিপূর্ণভাবে সম্পূর্ণ করতে হলে Payment করার পর উপরের ছবির পেইজটিতে কিছুক্ষণ অপেক্ষা করতে হবে। কিছুক্ষণ অপেক্ষা করার পর নিচের ছবির পেইজটি ওপেন হবে। নিচের ছবির পেইজটিতে ok বাটন চেপে আপনার Payment প্রক্রিয়াটি সম্পূর্ণ করতে হবে। অন্যথায় আপনার Payment প্রক্রিয়াটি অসম্পূর্ণ থেকে যাবে ।  </h5>

                                                <img src="../image/successss.png" alt="" style="width: 100%;margin-top:20px;">
                                                </div>


                                                <div class="col-xl-2 col-md-2 col-lg-2 col-sm-12"></div>
                                            </div>
                                       
                                    </div>




                                             <!-- name starts  -->
                                             <div class="form-group col-md-4 col-lg-4 col-sm-12 pl-0" hidden>
                                            <label class="form-label" for="validationServer03">Invoice No <label style="color:#559526; font-weight:bold">*</label> :</label>
                                                   
                                                   <input style="width: 50%;" type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Enter Amount" name="INV_NO" id="INV_NO" value="<?php echo $user_row[0]['INV_NO'] ?>" readonly>


                                            </div>
                                            <!-- name ends  -->
                                            


                                           

                                            <!-- name starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0" hidden>
                                                <label class="form-label" for="validationServer03">Name<label style="color:red; font-weight:bold">*</label> :</label>

                                                <input type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Enter Amount" name="MEM_NAME" id="MEM_NAME" value="<?php echo $user_row[0]['MEM_NAME'] ?>" readonly>


                                            </div>
                                            <!-- name ends  -->


                                            







                                            <!-- Email starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0" hidden>
                                                <label class="form-label" for="validationServer03">Email<label style="color:red; font-weight:bold">*</label> :</label>

                                                <input type="email" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Enter Email" name="PRE_EMAIL" id="PRE_EMAIL" value="<?php echo $user_row[0]['PRE_EMAIL'] ?>" readonly>


                                            </div>
                                            <!-- Email ends  -->


                                            <!-- Invoice Amount starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0" hidden>
                                                <label class="form-label" for="validationServer03">Invoice Amount<label style="color:red; font-weight:bold">*</label> :</label>

                                                <input type="email" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Invoice Amount" name="INVOICE_AMOUNT" id="INVOICE_AMOUNT" value="<?php echo $user_row[0]['INVOICE_AMOUNT'] ?>" readonly>


                                            </div>
                                            <!-- Invoice Amount ends  -->


                                            <!-- OTC Charge starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0" hidden>
                                                <label class="form-label" for="validationServer03">OTC Charge<label style="color:red; font-weight:bold">*</label> :</label>

                                                <input type="email" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="OTC Charge" name="OTC_CHARGE" id="OTC_CHARGE" value="<?php echo $user_row[0]['OTC_CHARGE'] ?>" readonly>


                                            </div>
                                            <!-- OTC Charget ends  -->







                                            <!-- Mobile starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0" hidden>
                                                <label class="form-label" for="validationServer03">Mobile Number<label style="color:red; font-weight:bold">*</label> :</label>

                                                <input type="number" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Enter Email" name="MEM_MOBILE_NO" id="MEM_MOBILE_NO" value="<?php echo $user_row[0]['MEM_MOBILE_NO'] ?>" readonly>


                                            </div>
                                            <!-- Mobile ends  -->



                                            <!-- Mobile starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0" hidden>
                                                <label class="form-label" for="validationServer03">Mem Id<label style="color:red; font-weight:bold">*</label> :</label>

                                                <input type="number" class="form-control is-invalid" aria-describedby="validationServer03Feedback" placeholder="Enter Email" name="MEM_ID" id="MEM_ID" value="<?php echo $user_row[0]['MEM_ID'] ?>" readonly>


                                            </div>
                                            <!-- Mobile ends  -->



                                            <!-- Mobile starts  -->
                                            <div class="col-md-12 col-lg-12 col-sm-12">
                                                <div class="form-check">
                                                  <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault" Required>
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                    I have read and agree to the website <a href="https://bandhan84.com/terms_condition.php" style="color: red;">terms and conditions </a>,<a href="https://bandhan84.com/Privacy_policy.php" style="color: red;">Privacy Policy</a>,<a href="https://bandhan84.com/return_policy.php" style="color: red;">Return Policy</a>,<a href="https://bandhan84.com/refund.php" style="color: red;">Refund Policy</a> 
                                                  </label>
                                                </div>
                                                

                                              


                                            </div>
                                            <!-- Mobile ends  -->




                                        </div>





                                        


                                        <div class="container mt-4 col-md-4 col-sm-4" style="margin-right: 315px;">




                                            <button type='submit' class='btn btn-md btn-success btn-block' name='submit' id='submit' style="color: #fff; width: 80%;"> <b>
                                                    Make Payment</b></button>

                                        </div>

                                    </form>

                                   


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
            var total = amount * nos_val;
            document.getElementById("total").value = total;


            var amount1 = document.getElementById("amount1").value;
            var amount1 = parseInt(amount1, 10);
            var nos_val1 = document.getElementById("nos_val1").value;
            var nos_val1 = parseInt(nos_val1, 10);
            var total1 = amount1 * nos_val1;
            document.getElementById("total1").value = total1;


            var amount2 = document.getElementById("amount2").value;
            var amount2 = parseInt(amount2, 10);
            var nos_val2 = document.getElementById("nos_val2").value;
            var nos_val2 = parseInt(nos_val2, 10);
            var total2 = amount2 * nos_val2;
            document.getElementById("total2").value = total2;


            var amount3 = document.getElementById("amount3").value;
            var amount3 = parseInt(amount3, 10);
            var nos_val3 = document.getElementById("nos_val3").value;
            var nos_val3 = parseInt(nos_val3, 10);
            var total3 = amount3 * nos_val3;
            document.getElementById("total3").value = total3;


            var amount4 = document.getElementById("amount4").value;
            var amount4 = parseInt(amount4, 10);
            var nos_val4 = document.getElementById("nos_val4").value;
            var nos_val4 = parseInt(nos_val4, 10);
            var total4 = amount4 * nos_val4;
            document.getElementById("total4").value = total4;



            var amountAM = document.getElementById("amountAM").value;
            var amountAM = parseInt(amountAM, 10);
            var total = document.getElementById("total").value;
            var total = parseInt(total, 10);
            var total1 = document.getElementById("total1").value;
            var total1 = parseInt(total1, 10);
            var total2 = document.getElementById("total2").value;
            var total2 = parseInt(total2, 10);
            var total3 = document.getElementById("total3").value;
            var total3 = parseInt(total3, 10);
            var total4 = document.getElementById("total4").value;
            var total4 = parseInt(total4, 10);
            var totalAM = amountAM + total + total1+ total2 + total3 + total4;
            document.getElementById("totalAM").value = totalAM;


            var nos_val5 = document.getElementById("nos_val5").value;
            var nos_val5 = parseInt(nos_val5, 10);
            var nos_val = document.getElementById("nos_val").value;
            var nos_val = parseInt(nos_val, 10);
            var nos_val1 = document.getElementById("nos_val1").value;
            var nos_val1 = parseInt(nos_val1, 10);
            var nos_val2 = document.getElementById("nos_val2").value;
            var nos_val2 = parseInt(nos_val2, 10);
            var nos_val3 = document.getElementById("nos_val3").value;
            var nos_val3 = parseInt(nos_val3, 10);
            var nos_val4 = document.getElementById("nos_val4").value;
            var nos_val4 = parseInt(nos_val4, 10);
            var total_nos = nos_val5 + nos_val + nos_val1 + nos_val2 + nos_val3 + nos_val4;
            document.getElementById("total_nos").value = total_nos;



           



        }
    </script>



<script>
        // Restricts input for the given textbox to the given inputFilter.
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
                        // Rejected value - restore the previous one
                        this.classList.add("input-error");
                        this.setCustomValidity(errMsg);
                        this.reportValidity();
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        // Rejected value - nothing to restore
                        this.value = "";
                    }
                });
            });
        }


        // Install input filters.

        setInputFilter(document.getElementById("nos_val"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value) && (value === "" || parseInt(value) <= 5);
        }, "Please Enter Your Spouse");


        setInputFilter(document.getElementById("nos_val1"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value) && (value === "" || parseInt(value) <= 10);
        }, "Please Enter Your Child");


        setInputFilter(document.getElementById("pcr"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value) && (value === "" || parseInt(value) <= 1000000);
        }, "Please Enter Your Personal Contribution");
    </script>




















</body>

</html>