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

    $MEM_PHOTO = $_POST['basedata'];
    $MEM_TYPE = $_POST['MEM_TYPE'];
    $MEM_NAME = $_POST['MEM_NAME'];
    // $DOB = $_POST['DOB'];
    $DOB = date('d-m-Y', strtotime($_POST['DOB']));;
    $BLD_GROUP = $_POST['BLD_GROUP'];
    $EDU_LVL = $_POST['EDU_LVL'];
    $OFFICE_NAME = $_POST['OFFICE_NAME'];
    $DESIGNATION = $_POST['DESIGNATION'];
    $F_NAME = $_POST['F_NAME'];
    $M_NAME = $_POST['M_NAME'];
    $SPO_NAME = $_POST['SPO_NAME'];
    $CHILD_1 = $_POST['CHILD_1'];
    $CHILD_2 = $_POST['CHILD_2'];
    $CHILD_3 = $_POST['CHILD_3'];
    $PER_ADDR  = $_POST['PER_ADDR'];
    $PRE_ADDR  = $_POST['PRE_ADDR'];
    $MEM_MOBILE_NO = $_POST['MEM_MOBILE_NO'];
    $EMAIL = $_POST['EMAIL'];




    $returnval = 0;




    $stid = oci_parse($conn, "begin PKG_IET_member.DPD_naa_member_UPDATE(:o_status,:MEM_ID,:p_MEM_PHOTO,:p_MEM_NAME,:p_MEM_MOBILE_NO,:p_F_NAME,:p_M_NAME,:P_PRE_ADDR,:p_EMAIL,:p_PER_ADDR,:p_DESIGNATION,:p_OFFICE_NAME,:p_EDU_LVL,:p_CHILD_1,:p_CHILD_2,:p_CHILD_3,:p_mem_type,:p_dob,:p_BLD_GROUP,:p_SPO_NAME); end;");


    oci_bind_by_name($stid, ":o_status", $returnval, -1, SQLT_INT);
    oci_bind_by_name($stid, ":MEM_ID", $session_id, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_MEM_PHOTO", $MEM_PHOTO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_MEM_NAME", $MEM_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_MEM_MOBILE_NO", $MEM_MOBILE_NO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_F_NAME", $F_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_M_NAME", $M_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":P_PRE_ADDR", $PRE_ADDR, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_EMAIL", $EMAIL, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_PER_ADDR", $PER_ADDR, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_DESIGNATION", $DESIGNATION, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_OFFICE_NAME", $OFFICE_NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_EDU_LVL", $EDU_LVL, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_CHILD_1", $CHILD_1, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_CHILD_2", $CHILD_2, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_CHILD_3", $CHILD_3, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_mem_type", $MEM_TYPE, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_dob", $DOB, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_BLD_GROUP", $BLD_GROUP, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":p_SPO_NAME", $SPO_NAME, -1, SQLT_CHR);

    

    

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatable  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link
        href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=c6b24f8a56e04fcee6105a02f4027462.css"
        rel="stylesheet" type="text/css" />

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

        <!-- Main Content -->


        <!-- Topbar -->
        <?php include 'topbar.php' ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->


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


                <div class="col-md-12">
                    <div class="form-group row">

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="personal" id="personal"
                                placeholder="Personal Informanation" value="" disabled=""
                                style="background-color: #69bbf0; color: white;">
                        </div>
                    </div>
                </div>


                    <div class="row m-3" style="padding-top: 20px;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">
                                        Photograph <label style="color:red; font-weight:bold">*</label> :
                                    </label>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <input type="file" accept="image/*" name="file" id="file"
                                        onchange="preview_image(event)">
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <img src="data:image/jpeg;base64,<?php echo $photoout; ?>" id="output_image"
                                        width="150px" height="150px"
                                        style="border: 1px solid #69bbf0; border-radius: 50%;">

                                    <input type="text" class="form-control" value="<?php echo $photoout; ?>"
                                        name="basedata" id="basedata" hidden>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row m-3">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Name <label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="MEM_NAME" id="MEM_NAME"
                                        placeholder="Enter  Name"
                                        value="<?php if (isset($_POST['MEM_NAME'])) echo $_POST['MEM_NAME']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>

                        <!-- Mobile No -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Mobile No <label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="MEM_MOBILE_NO" id="MEM_MOBILE_NO"
                                        placeholder="Enter Mobile No"
                                        value="<?php if (isset($_POST['MEM_MOBILE_NO'])) echo $_POST['MEM_MOBILE_NO']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- DOB & Blood Group -->
                    <div class="row m-3">
                        <!-- DOB -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Date of Birth<label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="DOB" id="DOB"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>

                        <!-- Blood Group -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Blood Group:</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_BLOOD_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="BLOOD_DESC" id="BLOOD_DESC" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select Your Blood Group</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['BLOOD_DESC'] . '" ' . ($row['BLOOD_DESC'] == $user_row[0]['BLOOD_DESC'] ? 'selected' : '') . '>' . $row['BLOOD_DESC'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Year of Passing & Group -->
                    <div class="row m-3">
                        <!-- Year of Passing -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">SSC Year<label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_YEAR_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="YR_OF_PASS" id="YR_OF_PASS" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select Your SSC Year</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['YEAR_CODE'] . '" ' . ($row['YEAR_CODE'] == $user_row[0]['YR_OF_PASS'] ? 'selected' : '') . '>' . $row['YEAR_NAME'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>

                                </div>
                            </div>
                        </div>

                        <!-- Group -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Group:</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_CAT";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="CAT_CODE" id="CAT_CODE" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select Your Group</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['CAT_CODE'] . '" ' . ($row['CAT_CODE'] == $user_row[0]['CAT_CODE'] ? 'selected' : '') . '>' . $row['CAT_NAME'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Shift & Year of Enrolment -->
                    <div class="row m-3">
                        <!-- Shift -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Shift:</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_SECTION";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="COLL_SEC" id="COLL_SEC" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select Your Shift</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['SECT_CODE'] . '" ' . ($row['SECT_CODE'] == $user_row[0]['SECT_CODE'] ? 'selected' : '') . '>' . $row['SECT_NAME'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>

                        <!-- Year of Enrolment -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Year of
                                    Enrolment</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="YR_OF_ENRO" id="YR_OF_ENRO"
                                        placeholder="Enter  Year of Enrolment"
                                        value="<?php if (isset($_POST['DESIGNATION'])) echo $_POST['DESIGNATION']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Last Degree & Last Institution -->
                    <div class="row m-3">
                        <!-- Last Degree -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Last Degree:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="LAST_DEGREE" id="LAST_DEGREE"
                                        placeholder="Enter Last Degree"
                                        value="<?php if (isset($_POST['F_NAME'])) echo $_POST['F_NAME']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>

                        <!-- Last Institution -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Last
                                    Institution:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="LAST_INSTI" id="LAST_INSTI"
                                        placeholder="Enter Last Institution"
                                        value="<?php if (isset($_POST['OFFICE_NAME'])) echo $_POST['OFFICE_NAME']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Email & Tshirt -->
                    <div class="row m-3">
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Email:</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="EMAIL" id="EMAIL"
                                        placeholder="Enter Your Email"
                                        value="<?php if (isset($_POST['EMAIL'])) echo $_POST['EMAIL']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>

                        <!-- Tshirt -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">T-shirt</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_SIZE_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="T_SHIRT" id="T_SHIRT" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select T-shirt Size</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['SIZE_CODE'] . '" ' . ($row['SIZE_CODE'] == $user_row[0]['SIZE_CODE'] ? 'selected' : '') . '>' . $row['SIZE_NAME'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="row m-3">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="personal" id="personal"
                                        placeholder="Present Address" value="" disabled=""
                                        style="background-color: #69bbf0; color: white;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> </label>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">Address Area</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="PRE_ADDR" id="PRE_ADDR"
                                        placeholder="Enter Address Area"
                                        value="<?php if (isset($_POST['PRE_ADDR'])) echo $_POST['PRE_ADDR']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> Postal/Zip
                                        Code</label>


                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="PRE_POST_CODE" id="PRE_POST_CODE"
                                        placeholder="Enter Postal/Zip Code"
                                        value="<?php if (isset($_POST['CHILD_3'])) echo $_POST['CHILD_3']; ?>"
                                        style="border: 2px solid #69bbf0; ">


                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row m-3">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">District</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_DISTRICT_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="PRE_DIST" id="PRE_DIST" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select DISTRICT</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['DIST_ID'] . '" ' . ($row['DIST_ID'] == $user_row[0]['DIST_ID'] ? 'selected' : '') . '>' . $row['DIST_DESC'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>







                        <!-- Country Group -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Country:</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_COUNTRY_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="COUNTRY" id="COUNTRY" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select Your Country</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                            echo '<option value="' . $row['CUNT_CODE'] . '" ' . ($row['CUNT_CODE'] == $user_row[0]['CUNT_CODE'] ? 'selected' : '') . '>' . $row['CUNT_DESC'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="row m-3">
                        <div class="form-group">
                            <div style="display: flex; align-items: center;">
                                <input type="checkbox" id="exampleCheckbox" name="exampleCheckbox"
                                    style="width: 20px; height: 20px; accent-color: #69bbf0; border: 2px solid white; cursor: pointer; margin-right: 10px;">
                                <label for="exampleCheckbox" style="font-weight: bold; cursor: pointer;">Click here to
                                    Same Address</label>
                            </div>

                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="personal" id="personal"
                                        placeholder="Permanent Address" value="" disabled=""
                                        style="background-color: #69bbf0; color: white;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">Address Area</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="PER_ADDR" id="PER_ADDR"
                                        placeholder="Enter Address Area"
                                        value="<?php if (isset($_POST['PER_ADDR'])) echo $_POST['PER_ADDR']; ?>"
                                        style="border: 2px solid #69bbf0; ">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> Postal/Zip Code</label>


                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="PER_POST_CODE" id="PER_POST_CODE"
                                        placeholder="Enter Postal/Zip Code"
                                        value="<?php if (isset($_POST['PER_POST_CODE'])) echo $_POST['PER_POST_CODE']; ?>"
                                        style="border: 2px solid #69bbf0; ">


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row m-3">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">District</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_DISTRICT_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="PER_DIST" id="PER_DIST" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select DISTRICT</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['DIST_ID'] . '" ' . ($row['DIST_ID'] == $user_row[0]['DIST_ID'] ? 'selected' : '') . '>' . $row['DIST_DESC'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>
                                </div>
                            </div>
                        </div>


                        <!-- Country Group -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Country:</label>
                                <div class="col-md-8">
                                    <?php
                                            include 'connection.php';
                                            $sql = "select * from NAA_COUNTRY_MST";
                                            $parseresults = ociparse($conn, $sql);
                                            ociexecute($parseresults);
                                            echo '<select class="form-select" name="COUNTRY_2" id="COUNTRY_2" style="border: 2px solid #69bbf0;">';
                                            echo '<option value="">Select Your Country</option>';
                                            while ($row = oci_fetch_assoc($parseresults)) {
                                                echo '<option value="' . $row['CUNT_CODE'] . '" ' . ($row['CUNT_CODE'] == $user_row[0]['CUNT_CODE'] ? 'selected' : '') . '>' . $row['CUNT_DESC'] . '</option>';
                                            }
                                            echo '</select>';
                                            oci_free_statement($parseresults);
                                            oci_close($conn);
                                            ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="personal" id="personal"
                                        placeholder="Occupation Details" value="" disabled=""
                                        style="background-color: #69bbf0; color: white;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label font-weight-bold">Occupation<label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <div class="col-md-8">
                                    <?php
                                        include 'connection.php';
                                        $sql = "select * from NAA_PROF_MST";
                                        $parseresults = ociparse($conn, $sql);
                                        ociexecute($parseresults);
                                        echo '<select class="form-select" name="PROF_CODE" id="PROF_CODE" style="border: 2px solid #69bbf0;">';
                                        echo '<option value="">Select Your Occupation</option>';
                                        while ($row = oci_fetch_assoc($parseresults)) {
                                        echo '<option value="' . $row['PROF_CODE'] . '" ' . ($row['PROF_CODE'] == $user_row[0]['PROF_CODE'] ? 'selected' : '') . '>' . $row['PROF_NAME'] . '</option>';
                                        }
                                        echo '</select>';
                                        oci_free_statement($parseresults);
                                        oci_close($conn);
                                        ?>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> Designation</label>


                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="DESIGNATION" id="DESIGNATION"
                                        placeholder="Enter Designation"
                                        value="<?php if (isset($_POST['DESIGNATION'])) echo $_POST['DESIGNATION']; ?>"
                                        style="border: 2px solid #69bbf0; ">


                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold"> Organization</label>


                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="OFFICE_NAME" id="OFFICE_NAME"
                                        placeholder="Enter Organization"
                                        value="<?php if (isset($_POST['OFFICE_NAME'])) echo $_POST['OFFICE_NAME']; ?>"
                                        style="border: 2px solid #69bbf0; ">


                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row m-3">
                        <div class="form-group">
                            <div style="display: flex; align-items: center;">
                                <input type="checkbox" id="exampleCheckbox" name="exampleCheckbox"
                                    style="width: 20px; height: 20px; accent-color: red; border: 2px solid red; cursor: pointer; margin-right: 10px;">
                                <label for="exampleCheckbox" style="font-weight: bold; cursor: pointer;">I agree to
                                    the End User License Agreement</label required>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success m-3" name='submit' id='submit'
                            onclick="return Validate()" Enabled>
                            Update
                        </button>
                    </div>

                                    

                                        







                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>



                    <!-- datatable start -->
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                        crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                        crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
                        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                        crossorigin="anonymous"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
                    </script>

                    <script type="text/javascript"
                        src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>

                    <script type="text/javascript"
                        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
                    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->

                    <!-- excel starts  -->
                    <script type="text/javascript"
                        src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
                    <script type="text/javascript"
                        src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>


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
              </div>      



</body>

</html>