<?php
$capchaval = substr(str_shuffle("1234abcdefghijkmnpqrABCDEFGHIJKL123456789stvwxyzMNPQRSTVWXYZ56789"), 0, 8);
include "connection.php";



// $sql = "SELECT TP_CODE,TP_NAME||',' ||FEE amount  from NAA_MEM_TYPE";
$sql = "SELECT TP_CODE,TP_NAME||'( Fee:' ||fee||' Tk)' as AMOUNT  from NAA_MEM_TYPE";
$parse = ociparse($conn, $sql);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $mem_type[] = $row;
}




$sql1 = "SELECT * FROM NAA_DIVISION_MST";
$parse = ociparse($conn, $sql1);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $division[] = $row;
}



$sql2 = "SELECT * FROM NAA_CAT";
$parse = ociparse($conn, $sql2);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $ctaegory[] = $row;
}



$sql3 = "SELECT * FROM NAA_PROF_MST";
$parse = ociparse($conn, $sql3);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $profession[] = $row;
}


$sql4 = "SELECT * FROM NAA_YEAR_MST";
$parse = ociparse($conn, $sql4);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $passing_year[] = $row;
}




if (isset($_POST['submit'])) {

    $MEM_PHOTO = $_POST['basedata'];
    $MEM_NAME = $_POST['MEM_NAME'];
    $MEM_MOBILE_NO = $_POST['MEM_MOBILE_NO'];
    $COLL_ROLL_NO = $_POST['COLL_ROLL_NO'];
    $CAT_CODE = $_POST['CAT_CODE'];
    $COLL_SEC = $_POST['COLL_SEC'];
    $YR_OF_PASS = '1990';
    $F_NAME = $_POST['F_NAME'];
    $M_NAME = $_POST['M_NAME'];
    $PRE_ADDR  = $_POST['PRE_ADDR'];
    $PRE_DIV = $_POST['PRE_DIV'];
    $PRE_DIST = $_POST['PRE_DIST'];
    $PRE_THANA = $_POST['PRE_THANA'];
    // $PRE_PHONE = $_POST['reg_number'];
    $PRE_EMAIL = $_POST['PRE_EMAIL'];
    $PER_ADDR  = $_POST['PER_ADDR'];
    $PER_DIV = $_POST['PER_DIV'];
    $PER_DIST = $_POST['PER_DIST'];

    $PER_THANA = $_POST['PER_THANA'];
    $PER_PHONE = $_POST['PER_PHONE'];
    $PER_EMAIL = $_POST['PER_EMAIL'];
    $PROF_CODE = $_POST['PROF_CODE'];
    $DESIGNATION = $_POST['DESIGNATION'];
    $OFFICE_NAME = $_POST['OFFICE_NAME'];
    $OFF_ADDR = $_POST['OFF_ADDR'];
    $OFF_DIV = $_POST['OFF_DIV'];
    $OFF_DIST = $_POST['OFF_DIST'];
    $OFF_THANA = $_POST['OFF_THANA'];
    $OFF_PHONE= $_POST['OFF_PHONE'];
    $OFF_EMAIL = $_POST['OFF_EMAIL'];
    $mem_type = $_POST['MEM_TYPE'];
    $DOB = $_POST['DOB'];
    $DOM = $_POST['DOM'];
    $PRE_POST_CODE = $_POST['PRE_POST_CODE'];
  








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

    //print $returnval;
    if ($returnval === 0) {
        echo '<script>alert("Please carefully fill up all the fields.")</script>';
    } else if ($returnval === 1) {
        echo '<script>
            alert("Your Application is submitted!!");

            // window.location.href = "http://localhost/ndc/index.php";
            window.location.href = "http://103.106.118.10/buet_90";
        </script>';
    } else if ($returnval === 2) {
        echo '<script>alert("Your SMS contact number is a duplicate! Please try another number!")</script>';
    }

    oci_free_statement($stid);
    // oci_close($conn);

   

















}





?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
     <link rel="icon" type="image/png" href="../uploads/Bandhan84.jpeg" />
    <!-- using online links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style>
        span {
            font-size: 12px;
        }

        h2,h3,label{
            color: #ac1f25;
        
    }


    .header img {
            float: left;
            width: 100px;
            height: 100px;
            /* background: #555; */
        }

        .header h1,
        h3,
        h4,
        h5,
        h6 {
            position: relative;
            top: 18px;
            left: 10px;
        }


    </style>

   

</head>

<body >




    <form action="" onsubmit="return myfun()" method="POST" enctype="multipart/form-data">

        <div class="container">
            <div class="card" style="background-color: #fff;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <div class="header">
                            <img src="../uploads/Bandhan84.jpeg" alt="logo" width="60px" height="60px" style="border: 1px solid #F35F73;" />
                            <h2 class="text-center"> Bandhan'84, BUET</h2>
                            <h3 class="text-center">MEMBERSHIP REGISTRATION FORM</h3>
                            <!-- <h6>Applied For Admission to Study : <label for="">Science(bangla)</label></h6> -->
                        </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                    <!-- <div class="row">
                      <div class="col-md-12">
                        <h4 style="color: red;">আপনার রেজিস্ট্রেশন প্রক্রিয়াটি সঠিকভাবে সম্পূর্ণ করার পর মেসেজের মাধ্যমে প্রাপ্ত মোবাইল নাম্বার ও পাসওয়ার্ড দিয়ে Sign In করে Dashboard এর Event Button এ ক্লিক করে Reunion 2023 এর জন্য নিবন্ধন করুন ।</h4>
                      </div>
                    </div> -->



                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                 <label for="Date" class="text-center font-weight-bold">Life Member No :</label>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-12 ">
                                 <input type="text" class="form-control" name="DOB" id="" readonly>
                              </div>
                           </div>
                        </div>
                    </div>

                    <hr>


                    <!-- <div class="row">
                        <div class="col-md-3">
                            <p>Receipt No. <span style="border-bottom: dotted;border-width: 2px;">12134567</span> </p>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                            <p>L.M No. <span style="border-bottom: dotted;border-width: 2px;">12134567</span> </p>
                        </div>
                    </div> -->

                    <div class="form-body">
                        <form action="" method="">
                            <div class="row m-3" style="padding-top: 20px;">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold" >Membership <label style="color:red; font-weight:bold">*</label>  :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="MEM_TYPE" id="MEM_TYPE">
                                                <option value="">Select Your Membership Type:</option>

                                                <?php
                                                for ($i = 0; $i < count($mem_type); $i++) {

                                                    echo "<option value='" . $mem_type[$i]["TP_CODE"] . "'>" . $mem_type[$i]["AMOUNT"] . "</option>";
                                                }

                                                ?>

                                            </select>

                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold" >Photograph <label style="color:red; font-weight:bold">*</label> :</label>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <input type="file" accept="image/*" name="file" id="file" onchange="preview_image(event)" required>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <img id="output_image" width="130px" height="130px" style="border: 1px solid #F35F73;"></img>
                                            <input type="text" class="form-control"  name="basedata" id="basedata" hidden>

                                           
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row m-3">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Name of Applicant <label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12">
                                            <input type="text" class="form-control" name="MEM_NAME" id="MEM_NAME" placeholder="Enter Applicant Name" value="<?php if (isset($_POST['MEM_NAME'])) echo $_POST['MEM_NAME']; ?>" >

                                            
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12">
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                 <label for="Date" class="text-center font-weight-bold" style="float: right;">Date of Birth <label style="color:red; font-weight:bold">*</label> :</label>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 ">
                                 <input type="Date" class="form-control" name="DOB" id="DOB">

                                 
                              </div>

                              
                           </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12">
                           <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-12">
                                 <label for="text" class="text-center font-weight-bold">Blood Group:</label>
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-12 ">
                                 <input type="text" class="form-control" placeholder="Enter Blood Group" name="DOM" id="DOM">

                              </div>
                           </div>
                        </div>

                            </div>


                            




                           <!--  <div class="row m-3">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Roll No:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="COLL_ROLL_NO" id="COLL_ROLL_NO" placeholder="Enter Your Roll No" value="<?php if (isset($_POST['COLL_ROLL_NO'])) echo $_POST['COLL_ROLL_NO']; ?>">
                                        </div>
                                    </div>
 -->

                                </div>


                                


                                



                                <!-- <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Batch<label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                        <input type="text" class="form-control" name="YR_OF_PASS" id="YR_OF_PASS" placeholder="Enter Your Batch" value="1984" readonly>

                                            
                                        </div>
                                    </div>

                                </div> -->


                                <!-- <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Faculty <label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <select class="form-select "  name="CAT_CODE" id="CAT_CODE">
                                                <option value="">Select Your Faculty :</option>
                                                <?php
                                                for ($i = 0; $i < count($ctaegory); $i++) {

                                                    echo "<option value='" . $ctaegory[$i]["CAT_CODE"] . "'>" . $ctaegory[$i]["CAT_NAME"] . "</option>";
                                                }

                                                ?>

                                            </select>

                                        </div>
                                    </div>

                                </div> -->



                                <!-- <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Section:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <select class="form-select" name="COLL_SEC" id="naa_section">
                                                <option value="">Select Your Section :</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div> -->





                            <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Father's Name :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12">
                                            <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Father's Name" value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Mother's Name :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Mother's Name" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Spous's Name :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12">
                                            <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Spous's Name" value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">No. Of Children :</label>
                                            <p>(May Specify)</p>

                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter No. Of Children" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                            

                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row m-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Name Of Hall :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12">
                                            <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Your Hall Name " value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>">
                                        </div>
                                    </div>
                                </div> 

                            </div>


                            <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Room No. :</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Your Room No." value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Department :</label>
                                            
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Your Department Name" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                            

                                        </div>
                                    </div>
                                </div>

                            </div>




                            <!-- <div class="row m-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Mother's Name :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Mother's Name" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div> -->








                            <!-- <div class="row m-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">Present Address:</label>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">Division<label style="color:red; font-weight:bold">*</label>  :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="PRE_DIV" id="p_division">
                                                <option value="">Select Your Division :</option>
                                                <?php
                                                for ($i = 0; $i < count($division); $i++) {

                                                    echo "<option value='" . $division[$i]["DIV_CODE"] . "'>" . $division[$i]["DIV_DESC"] . "</option>";
                                                }

                                                ?>

                                            </select>

                                            
                                        </div>
                                    </div>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">District<label style="color:red; font-weight:bold">*</label>  :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="PRE_DIST" id="p_district">
                                                <option value="">Select Your District </option>

                                            </select>


                                            
                                        </div>
                                    </div>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">Upazilla/Thana <label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select"  name="PRE_THANA" id="p_upazilla">
                                                <option value="">Select Your Upazilla </option>

                                            </select>
                                            
                                        </div>
                                    </div>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Phone <label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="number" class="form-control"  name="MEM_MOBILE_NO" id="MEM_MOBILE_NO" placeholder="Enter Your Phone No" value="<?php if (isset($_POST['MEM_MOBILE_NO'])) echo $_POST['MEM_MOBILE_NO']; ?>">

                                            
                                        </div>
                                    </div>


                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Email <label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="email" class="form-control"  name="PRE_EMAIL" id="PRE_EMAIL" placeholder="Enter Your Email Address" value="<?php if (isset($_POST['PRE_EMAIL'])) echo $_POST['PRE_EMAIL']; ?>">

                                            
                                        </div>
                                    </div>

                                </div> -->


                                <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Post Code <label style="color:red; font-weight:bold">*</label> :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="text" class="form-control"  name="PRE_POST_CODE" id="PRE_POST_CODE" placeholder="Enter Your Post Code" value="<?php if (isset($_POST['PRE_POST_CODE'])) echo $_POST['PRE_POST_CODE']; ?>">

                                        </div>
                                    </div>

                                </div> -->




                                <!-- <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Address<label style="color:red; font-weight:bold">*</label>  :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="PRE_ADDR" id="PRE_ADDR"  acols="41" rows="2"></textarea>


                                            
                                        </div>
                                    </div>
                                </div> -->





                            


                             <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Present Address :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="PER_ADDR" id="PER_ADDR" cols="50" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="col-lg-8 col-md-8 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Permanent Address :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="PER_ADDR" id="PER_ADDR" cols="50" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div> 




                           <!--  <div class="row m-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">Permanent Address:</label>
                                </div> -->


                                <!--  <div class="col-lg-4 col-md-4 col-sm-12">

                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">Division :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="PER_DIV" id="per_division">
                                                <option value="">Select Your Division :</option>
                                                <?php
                                                for ($i = 0; $i < count($division); $i++) {

                                                    echo "<option value='" . $division[$i]["DIV_CODE"] . "'>" . $division[$i]["DIV_DESC"] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>  -->



                               <!--  <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">District :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="PER_DIST" id="per_district">
                                                <option value="">Select Your District </option>

                                            </select>
                                        </div>
                                    </div>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">Upazilla/Thana :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="PER_THANA" id="per_upazilla">
                                                <option value="">Select Your Upazilla </option>

                                            </select>
                                        </div>
                                    </div>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Address :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="PER_ADDR" id="PER_ADDR" cols="41" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div> -->





                               <!--  <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Phone:</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="number" class="form-control" name="PER_PHONE" id="PER_PHONE" placeholder="Enter Your Phone Number" value="<?php if (isset($_POST['PER_PHONE'])) echo $_POST['PER_PHONE']; ?>">
                                        </div>
                                    </div>


                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Email:</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="email" class="form-control" name="PER_EMAIL" id="PER_EMAIL" placeholder="Enter Your Email Address" value="<?php if (isset($_POST['PER_EMAIL'])) echo $_POST['PER_EMAIL']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div> -->







                            <!-- <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Phone:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="number" class="form-control" name="religious_sect" id="religious_sect" placeholder="Enter Your Religion Sect" value="<?php if (isset($_POST['religious_sect'])) echo $_POST['religious_sect']; ?>">
                                        </div>
                                    </div>


                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Email:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="email" class="form-control" name="religious_sect" id="religious_sect" placeholder="Enter Your Religion Sect" value="<?php if (isset($_POST['religious_sect'])) echo $_POST['religious_sect']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div> -->





                           <!--  <div class="row m-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">Professional Details :</label>
                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Profession:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                        <select class="form-select" name="PROF_CODE" id="PROF_CODE">
                                                <option value="">Select Your Profession </option>
                                                <?php
                                                for ($i = 0; $i < count($profession); $i++) {

                                                    echo "<option value='" . $profession[$i]["PROF_CODE"] . "'>" . $profession[$i]["PROF_NAME"] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>


                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Designation:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="DESIGNATION" id="DESIGNATION" placeholder="Enter Your Designation" value="<?php if (isset($_POST['DESIGNATION'])) echo $_POST['DESIGNATION']; ?>">
                                        </div>
                                    </div>

                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Office Name:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="OFFICE_NAME" id="OFFICE_NAME" placeholder="Enter Your Office Name" value="<?php if (isset($_POST['OFFICE_NAME'])) echo $_POST['OFFICE_NAME']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div> -->



                             <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Place Of Work :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="PER_ADDR" id="PER_ADDR" cols="70" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                </div>



                               
                            </div> 


                            <div class="row m-3">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">Phone No:</label>
                                  </div><br> <br>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Office :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Phone No" value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Residence :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Phone No" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Tel :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Phone No" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="row m-3">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">E-Address:</label>
                                  </div><br> <br>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Email :</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Your Email" value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Facebook/URL- :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Your Facebook/URL" value="<?php if (isset($_POST['M_NAME'])) echo $_POST['M_NAME']; ?>">
                                        </div>
                                    </div>
                                </div>

                                

                            </div>
                                

                               <!--  <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Address :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="PER_ADDR" id="PER_ADDR" cols="41" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>  -->


                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">Division :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                        <select class="form-select" name="OFF_DIV" id="off_division">
                                                <option value="">Select Your Division :</option>
                                                <?php
                                                for ($i = 0; $i < count($division); $i++) {

                                                    echo "<option value='" . $division[$i]["DIV_CODE"] . "'>" . $division[$i]["DIV_DESC"] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div> -->



                               <!--  <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">

                                        <div class="">
                                            <label for="text" class="font-weight-bold">District :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="OFF_DIST" id="off_district">
                                                <option value="">Select Your District </option>

                                            </select>
                                        </div>
                                    </div>
                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="">
                                            <label for="text" class="font-weight-bold">Upazilla/Thana :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 ">
                                            <select class="form-select" name="OFF_THANA" id="off_upazilla">
                                                <option value="">Select Your Upazilla </option>

                                            </select>
                                        </div>
                                    </div>
                                </div> -->


                               <!--  <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Holding/Village :</label>


                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="OFF_ADDR" id="OFF_ADDR" cols="41" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div> -->



                               <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Phone:</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="number" class="form-control" name="OFF_PHONE" id="OFF_PHONE" placeholder="Enter Your Office Phone Number" value="<?php if (isset($_POST['OFF_PHONE'])) echo $_POST['OFF_PHONE']; ?>">
                                        </div>
                                    </div>


                                </div> -->



                                <!-- <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Email:</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input type="email" class="form-control" name="OFF_EMAIL" id="OFF_EMAIL" placeholder="Enter Your Office E-mail Address" value="<?php if (isset($_POST['OFF_EMAIL'])) echo $_POST['OFF_EMAIL']; ?>">
                                        </div>
                                    </div>

                                </div> -->

                            </div>



                            <!-- <div class="row m-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Phone:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="number" class="form-control" name="religious_sect" id="religious_sect" placeholder="Enter Your Religion Sect" value="<?php if (isset($_POST['religious_sect'])) echo $_POST['religious_sect']; ?>">
                                        </div>
                                    </div>


                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Email:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input type="email" class="form-control" name="religious_sect" id="religious_sect" placeholder="Enter Your Religion Sect" value="<?php if (isset($_POST['religious_sect'])) echo $_POST['religious_sect']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div> -->








                            <!-- <div style="padding: 20px;" class="text-center">
                                <div class="input-group">
                                    <div id="notcp" class="input-group-append">
                                        <span class="input-group-text"><?php echo $capchaval; ?></span>
                                    </div>
                                    <input type="text" name="iptval" id="iptval" class="form-control input_user" value="" placeholder="Input captcha">
                                    <button class="btn btn-primary" id="Verify">Verify</button>
                                </div>
                            </div> -->
                            <div class="text-center">

                                <label style="color: red; font-size: large; font-weight: bold;" id="levelcap"></label>
                            </div>

                            <div>
                                <span id="error"></span>
                            </div>

                            <!-- <div class="col text-center">
                                <button type="submit" class="btn btn-success m-3" name='submit' id='submit' onclick="return Validate()" disabled>
                                    Submit
                                </button>
                            </div> -->


                        </form>
















































                    </div>












                </div>







            </div>









        </div>
































































        <!-- using online scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



        <!--  <script>
        $('#ad_cat').on('change', function() {
            var ad_cat = this.value;
            $.ajax({
                type: "POST",
                url: "getVersion.php",
                data: 'CAT_CODE=' + ad_cat,
                success: function(result) {
                    console.log(result);
                    $("#version_ssc").html(result);
                }
            });
        });
    </script>

     <script>
        $('#ad_cat').on('change', function() {
            var ad_cat = this.value;
            $.ajax({
                type: "POST",
                url: "getGrp.php",
                data: 'CAT_CODE=' + ad_cat,
                success: function(result) {
                    console.log(result);
                    $("#ssc_group").html(result);
                }
            });
        });
    </script> -->

        <script type='text/javascript'>
            $(document).ready(function() {
                $("#ssc_group").change(function() {
                    $(this).find("option:selected").each(function() {
                        var optionValue = $(this).attr("value");
                        if (optionValue) {
                            $(".group").not("." + optionValue).hide();
                            $("." + optionValue).show();
                        } else {
                            $(".group").hide();
                        }
                    });
                }).change();
            });

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
            const MAX_WIDTH = 90;
            const MAX_HEIGHT = 108;
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
        <script>
            $(document).ready(function() {
                $("#Verify").click(function() {
                    var bla = $('#iptval').val();
                    var php_var = "<?php echo $capchaval; ?>";
                    if (bla === "") {
                        document.getElementById('levelcap').innerHTML = 'To Enable Submit Button Please Verify';
                    } else {
                        if (bla === php_var) {
                            document.getElementById('levelcap').innerHTML = 'Successfully Verified. Now You Can Update Your Information.';
                            document.getElementById("submit").disabled = false;
                        } else {
                            document.getElementById("submit").disabled = true;
                            document.getElementById('levelcap').innerHTML = 'Failed To Verify';
                        }
                    }

                    return false;
                });
            });
            $('#notcp').bind('cut copy paste', function(e) {
                e.preventDefault();
            });
        </script>


<!-- present ajax start -->

<script>
		// district code cascading starts 
		$('#p_division').on('change', function() {
			var divisionID = $(this).val();

			// console.log(divisionID);
			if (divisionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_dist.php',
					data: 'div_id=' + divisionID,
					success: function(html) {
						$('#p_district').html(html);
					}
				});
			} else {
				$('#p_district').html('<option value="">Select division first</option>');
			}
		});
		// distirct code cascading ends
	</script>
	<script>
		// district code cascading starts 
		$('#p_district').on('change', function() {
			var districtID = $(this).val();

			// console.log(divisionID);
			if (districtID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_dis_upo.php',
					data: 'dis_id=' + districtID,
					success: function(html) {
						$('#p_upazilla').html(html);
					}
				});
			} else {
				$('#p_upazilla').html('<option value="">Select upazilla first</option>');
			}
		});
		// distirct code cascading ends
	</script>


    <!-- present ajax end -->




    <!-- permanent ajax start -->

<script>
		// district code cascading starts 
		$('#per_division').on('change', function() {
			var divisionID = $(this).val();

			// console.log(divisionID);
			if (divisionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_dist.php',
					data: 'div_id=' + divisionID,
					success: function(html) {
						$('#per_district').html(html);
					}
				});
			} else {
				$('#per_district').html('<option value="">Select division first</option>');
			}
		});
		// distirct code cascading ends
	</script>
	<script>
		// district code cascading starts 
		$('#per_district').on('change', function() {
			var districtID = $(this).val();

			// console.log(divisionID);
			if (districtID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_dis_upo.php',
					data: 'dis_id=' + districtID,
					success: function(html) {
						$('#per_upazilla').html(html);
					}
				});
			} else {
				$('#per_upazilla').html('<option value="">Select upazilla first</option>');
			}
		});
		// distirct code cascading ends
	</script>


    <!-- permanent ajax end -->




     <!-- office ajax start -->

<script>
		// district code cascading starts 
		$('#off_division').on('change', function() {
			var divisionID = $(this).val();

			// console.log(divisionID);
			if (divisionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_dist.php',
					data: 'div_id=' + divisionID,
					success: function(html) {
						$('#off_district').html(html);
					}
				});
			} else {
				$('#off_district').html('<option value="">Select division first</option>');
			}
		});
		// distirct code cascading ends
	</script>
	<script>
		// district code cascading starts 
		$('#off_district').on('change', function() {
			var districtID = $(this).val();

			// console.log(divisionID);
			if (districtID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_dis_upo.php',
					data: 'dis_id=' + districtID,
					success: function(html) {
						$('#off_upazilla').html(html);
					}
				});
			} else {
				$('#off_upazilla').html('<option value="">Select upazilla first</option>');
			}
		});
		// distirct code cascading ends
	</script>


    <!-- office ajax end -->




    <!-- section ajax start -->

<script>
		// district code cascading starts 
		$('#CAT_CODE').on('change', function() {
			var sectionID = $(this).val();

			// console.log(divisionID);
			if (sectionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_section.php',
					data: 'sec_id=' + sectionID,
					success: function(html) {
						$('#naa_section').html(html);
					}
				});
			} else {
				$('#naa_section').html('<option value="">Select Section first</option>');
			}
		});
		// distirct code cascading ends
	</script>
	


    <!-- section ajax end -->








    <script type="text/javascript">
        function Validate() {
            var MEM_TYPE = document.getElementById("MEM_TYPE");
            var basedata = document.getElementById("basedata");

            var MEM_NAME = document.getElementById("MEM_NAME");
            var DOB = document.getElementById("DOB");
            // var YR_OF_PASS = document.getElementById("YR_OF_PASS");
            var CAT_CODE = document.getElementById("CAT_CODE");
            var p_division = document.getElementById("p_division");
            var p_district = document.getElementById("p_district");
            var p_upazilla = document.getElementById("p_upazilla");
            var MEM_MOBILE_NO = document.getElementById("MEM_MOBILE_NO");
            var PRE_EMAIL = document.getElementById("PRE_EMAIL");
            var PRE_POST_CODE = document.getElementById("PRE_POST_CODE");
            var PRE_ADDR = document.getElementById("PRE_ADDR");
           

            

            if (MEM_TYPE.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Select Your Membership Type!");
                return false;
            }

            if (basedata.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Enter Image!");
                return false;
            }




            if (MEM_NAME.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please enter application name!");
                return false;
            }


            if (DOB.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Enter Your Date of Birth!");
                return false;
            }

            // if (YR_OF_PASS.value == "") {
            //     //If the "Please Select" option is selected display error.
            //     alert("Please Enter Your Passing Year!");
            //     return false;
            // }


            if (CAT_CODE.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Enter Your Group");
                return false;
            }


            if (p_division.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Select Your Present Division");
                return false;
            }


            if (p_district.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Select Your Present District");
                return false;
            }



            if (p_upazilla.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Select Your Present Upazilla/Thana");
                return false;
            }


            if (MEM_MOBILE_NO.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please Enter Your Phone Number");
                return false;
            }


            if (PRE_EMAIL.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please enter Your  Email Address!");
                return false;
            }


            if (PRE_POST_CODE.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please enter Your Post Code!");
                return false;
            }


            if (PRE_ADDR.value == "") {
                //If the "Please Select" option is selected display error.
                alert("Please enter Your Present Address!");
                return false;
            }


            
            return true;
        }

        
    </script>

</body>

</html>