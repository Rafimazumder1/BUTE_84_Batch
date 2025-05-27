<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
}
?>

<?PHP
//set_time_limit(300);
include 'connection.php';

$session_id = $_SESSION['id'];
$sql10 = "SELECT * FROM NAA_MEMBERS WHERE MEM_ID = $session_id";
$parse = ociparse($conn, $sql10);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $main1[] = $row;
    // print_r($main1);

    foreach ($row as $key => $data) {

        if (is_object($data)) {
            $abc[$key] = $data->load();
            //	base64_to_jpeg($data->load(),'abc.jpg');
        } else {
            $abc[$key] = $data;
        }
    }
    $abc = array_map('utf8_encode', $abc);
}

$photoout = $abc['MEM_PHOTO'];


if (isset($_POST['submit'])) {

     //  echo "<pre>";
    //  print_r($_POST);
    //   echo "</pre>";

    $MEM_PHOTO = $_POST['basedata'];
    $MEM_NAME = $_POST['MEM_NAME'];
    $MEM_MOBILE_NO = $_POST['MEM_MOBILE_NO'];
    $YR_OF_PASS = $_POST['YR_OF_PASS'];
    $PRE_EMAIL = $_POST['PRE_EMAIL'];
    $PRE_ADDR  = $_POST['PRE_ADDR'];
    // $PRE_DIV = $_POST['PRE_DIV'];
    $PRE_DIST = $_POST['PRE_DIST'];
    $PRE_POST_CODE = $_POST['PRE_POST_CODE'];
    $PRE_THANA = '';


    $PER_POST_CODE = $_POST['PER_POST_CODE'];


    
    $CAT_CODE = $_POST['CAT_CODE'];
    $PROF_CODE = $_POST['PROF_CODE'];
    $DESIGNATION = $_POST['DESIGNATION'];
    $OFFICE_NAME = $_POST['OFFICE_NAME'];
    $OFF_ADDR = $_POST['OFF_ADDR'];
    
    $PER_ADDR  = $_POST['PER_ADDR'];
    $PER_DIST  = $_POST['PER_DIST'];
    // $PER_DIV = $_POST['PER_DIV'];
   
    $DOB = $_POST['DOB'];
    $BLD_GROUP = $_POST['BLOOD_DESC'];
    $COLL_SEC = $_POST['COLL_SEC'];
    $YR_OF_ENRO = $_POST['YR_OF_ENRO'];
    $LAST_DEGREE = $_POST['LAST_DEGREE'];
    $LAST_INSTI = $_POST['LAST_INSTI'];
    $COUNTRY = $_POST['COUNTRY'];
    $T_SHIRT = $_POST['T_SHIRT'];
    $COUNTRY_2 = $_POST['COUNTRY_2'];
    $OTHER_OCCU = $_POST['OTHER_OCCU'];




    $returnval = 0;




    $stid = oci_parse($conn, "begin PKG__member.DPD_naa_members_UPd_short(:o_status,:MEM_PHOTO,:MEM_NAME,:MEM_MOBILE_NO,:COLL_ROLL_NO,:CAT_CODE,:COLL_SEC,:YR_OF_PASS,:F_NAME,:M_NAME,:PRE_ADDR,:PRE_DIV,:PRE_DIST,:PRE_THANA,:PRE_PHONE,:PRE_EMAIL,:PER_ADDR,:PER_DIV,:PER_DIST,:PER_THANA, :PER_PHONE, :PER_EMAIL,:PROF_CODE,:DESIGNATION,:OFFICE_NAME,:OFF_ADDR,
   :OFF_DIV,:OFF_DIST,:OFF_THANA,:OFF_PHONE,:OFF_EMAIL,:mem_type,:DOB,:T_SHIRT,:PRE_POST_CODE,:BLD_GROUP,:YR_OF_ENRO,:LAST_DEGREE,:LAST_INSTI,:COUNTRY,:PER_POST_CODE,:COUNTRY_2,:OTHER_OCCU); end;");


    oci_bind_by_name($stid, ":o_status", $o_status, 20); // Output parameter
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
   oci_bind_by_name($stid, ":T_SHIRT", $T_SHIRT, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":PRE_POST_CODE", $PRE_POST_CODE, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":BLD_GROUP", $BLD_GROUP, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":YR_OF_ENRO", $YR_OF_ENRO, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":LAST_DEGREE", $LAST_DEGREE, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":LAST_INSTI", $LAST_INSTI, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":COUNTRY", $COUNTRY, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":PER_POST_CODE", $PER_POST_CODE, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":COUNTRY_2", $COUNTRY_2, -1, SQLT_CHR);
   oci_bind_by_name($stid, ":OTHER_OCCU", $OTHER_OCCU, -1, SQLT_CHR);
   

    // oci_bind_by_name($stid, ":SECT_CODE", $SECT_CODE, -1, SQLT_CHR);

    

    oci_execute($stid);

    //print $returnval;
    if ($returnval === 0) {
        echo '<script>alert("Please carefully fill up all the fields.")</script>';
    } else if ($returnval === 1) {
        echo '<script>
            alert("Your Application is Updated!!");

            // window.location.href = "http://localhost/ndc/index.php";
            window.location.href = "Mem_edit.php";
        </script>';
    } else if ($returnval === 2) {
        echo '<script>alert("Your SMS contact number is a duplicate! Please try another number!")</script>';
    }

    oci_free_statement($stid);
    // oci_close($conn);

}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IET</title>
    <link rel="icon" href="../uploads/logo.jpeg" type="image/ico">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatable  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=c6b24f8a56e04fcee6105a02f4027462.css" rel="stylesheet" type="text/css" />

    <style>
        /* for excel button design start */
        .dt-buttons {
            visibility: hidden;
        }

        .dt-buttons button:after {
            /* content: 'Download Excel';
        visibility: visible;
        background-color: #11c7e0;
        margin-left: 50px;
        padding: 5px;
        margin-top: 5px;
        color: white; */

            content: 'Download Excel';
            visibility: visible;
            background-color: #11c7e0;
            margin-left: 200px;
            padding: 10px;
            /* margin-top: -19px !important; */
            color: white;
            border-radius: 11px;
            font-size: 15px;
        }

        .btn .btn-info {
            margin-bottom: -35px !important;
            margin-left: 385px !important;
        }

        /* for excel button design start */
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'dashboard.php' ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php' ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #69bbf0;">
                            <!-- <h6 class="m-0 font-weight-bold text-primary text-center m-4">Suhrawardy Hall Alumni Association, BUET</h6> -->
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">IET School Foram,Narayangonj</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Edit Information </h4>
                            <!-- <h6 class=" text-center m-4" style="color: white; font-weight: bold;">Reunion 2024</h6> -->

                        </div>
                        <div class="card-body">
                            

                           <!--  <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="Date" class="text-center font-weight-bold">Life Member No :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 ">
                                            <input type="text" class="form-control" name="" id="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr> -->


                            

                            <div class="form-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row m-3" style="padding-top: 20px;">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row">
                                                <!-- <div class="">
                                                    <label for="text" class="font-weight-bold">Membership <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div> -->
                                               
                                            </div>

                                        </div>

                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Photograph <label style="color:red; font-weight:bold">*</label> :</label>

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input type="file" accept="image/*" name="file" id="file" onchange="preview_image(event)" >
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                    <img src="data:image/jpeg;base64,<?php echo $photoout; ?>" id="output_image" width="130px" height="130px" style="border: 1px solid #52BE80;"></img>
                                                    <input type="text" class="form-control" value="<?php echo $photoout; ?>"  name="basedata" id="basedata" hidden>


                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row m-3">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Name of Applicant <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="MEM_NAME" id="MEM_NAME" placeholder="Enter Applicant Name" value="<?php echo $main1[0]['MEM_NAME']  ?>">


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="Date" class="text-center font-weight-bold" >Date of Birth <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                    <input type="Date" class="form-control" name="DOB" id="DOB" value="<?php if (isset($main1[0]['DOB'])) {
                                                                                                         echo strftime('%Y-%m-%d', strtotime($main1[0]['DOB']));
                                                                                                      } ?>">


                                                </div>


                                            </div>
                                        </div>




                                    </div>


                                    <div class="row m-3">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-5 col-md-5 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Blood Group<label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-12">
                                                    <input type="text" class="form-control" name="BLD_GROUP" id="BLD_GROUP" placeholder="Enter  Blood Group" value="<?php echo $main1[0]['BLD_GROUP']  ?>">


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold" >Eudcation Level <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12 ">
                                                    <input type="text" class="form-control" name="EDU_LVL" id="EDU_LVL" placeholder="Enter Your Eudcation Level" value="<?php echo $main[0]['EDU_LVL']  ?>">


                                                </div>


                                            </div>
                                        </div>




                                    </div>



                                    <div class="row m-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Work Place <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="OFFICE_NAME" id="OFFICE_NAME" placeholder="Enter Your Work Place" value="<?php echo $main[0]['OFFICE_NAME']  ?>">


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="Date" class="text-center font-weight-bold" >Designation <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="DESIGNATION" id="DESIGNATION" placeholder="Enter Your Designation" value="<?php echo $main[0]['DESIGNATION']  ?>">


                                                </div>


                                            </div>
                                        </div>




                                    </div>


                                    <div class="row m-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Father's Name <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="F_NAME" id="F_NAME" placeholder="Enter Your Father's Name" value="<?php echo $main[0]['F_NAME']  ?>">


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Mother's Name <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="M_NAME" id="M_NAME" placeholder="Enter Your Mother's Name" value="<?php echo $main[0]['M_NAME']  ?>">


                                                </div>
                                            </div>
                                        </div>




                                    </div>



                                    <div class="row m-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Spous's Name :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="SPO_NAME" id="SPO_NAME" placeholder="Enter Your Spous's Name" value="<?php echo $main[0]['SPO_NAME']  ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold"> Children 1 :</label>


                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="CHILD_1" id="CHILD_1" placeholder="Enter Your Children Name" value="<?php echo $main[0]['CHILD_1']  ?>">


                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row m-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Children 2 :</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="CHILD_2" id="CHILD_2" placeholder="Enter Your Children Name" value="<?php echo $main[0]['CHILD_2']  ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold"> Children 3 :</label>


                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <input type="text" class="form-control" name="CHILD_3" id="CHILD_3" placeholder="Enter Your Children Name" value="<?php echo $main[0]['CHILD_3']  ?>">


                                                </div>
                                            </div>
                                        </div>

                                    </div>


<style>
    @media only screen and (max-width: 600px) {
        #PER_ADDR {
            width: 100%; /* Adjust as needed */
        }
    }

    @media only screen and (max-width: 600px) {
        #PRE_ADDR {
            width: 100%; /* Adjust as needed */
        }
    }
</style>

                                    <div class="row m-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="col-lg-5 col-md-5 col-sm-12" style="margin-top: 20px;">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold">Permanent Address :</label>


                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <textarea name="PER_ADDR" id="PER_ADDR" cols="50" rows="3"><?php echo $main[0]['PER_ADDR']  ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 20px;">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold">Present Address :</label>


                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <textarea name="PRE_ADDR" id="PRE_ADDR" cols="50" rows="3"><?php echo $main[0]['PRE_ADDR']  ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        </div>


                                        <div class="row m-3">
                                           <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="row ">
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold">Mobile No :</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                                        <input type="number" class="form-control" name="MEM_MOBILE_NO" id="MEM_MOBILE_NO" placeholder="Enter Your Mobile No" value="<?php echo $main[0]['MEM_MOBILE_NO']  ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="row ">
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold"> Email :</label>


                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                                        <input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="Enter Your Email" value="<?php echo $main[0]['EMAIL']  ?>">


                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success m-3" name='submit' id='submit' onclick="return Validate()" Enabled>
                                                Update
                                            </button>
                                        </div>

                                        </div>

                                        





                                    </div>





                                </form>
















































                            </div>












                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- datatable start -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->

    <!-- excel starts  -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>


    <!-- using online scripts -->



    <!-- student Image show and Size Validation   starts  -->
    <script type="text/javascript">
        const MAX_WIDTH = 300;
        const MAX_HEIGHT = 300;
        const MAX_SIZE_KB = 50;
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

                let quality = QUALITY;
                let dataURL = canvas.toDataURL(MIME_TYPE, quality);
                let dataSize = dataURL.length * 3 / 4 / 1024; // Size in KB

                while (dataSize > MAX_SIZE_KB && quality >= 0.1) {
                    quality -= 0.1;
                    dataURL = canvas.toDataURL(MIME_TYPE, quality);
                    dataSize = dataURL.length * 3 / 4 / 1024;
                }

                document.getElementById('output_image').setAttribute('src', dataURL);
                dataURL = dataURL.replace(/^data:image\/[a-z]+;base64,/, "");
                document.getElementById('basedata').value = dataURL;
                console.log("Compressed image size: " + dataSize + " KB");
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
    <!--student Image show and Size Validation  ends  -->




</body>

</html>