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

$sql10 = "SELECT *
FROM NAA_MEMBERS WHERE MEM_ID = '$session_id'";

$parse = ociparse($conn, $sql10);
oci_execute($parse);

// print_r($sql10);
while ($row = oci_fetch_assoc($parse)) {
    $main[] = $row;
}

$MEM_ID = $_GET['id'];
$sql10 = "SELECT * FROM NAA_MEMBERS WHERE STATUS = 'P' AND MEM_ID = $MEM_ID";
$parse = ociparse($conn, $sql10);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $all_data[] = $row;

    
}



if (isset($_POST['submit'])) {

   
    $MEM_MOBILE_NO = $_POST['MEM_MOBILE_NO'];
    $APP_TYPE = $_POST['APP_TYPE'];
   




    $sql6 = "UPDATE NAA_MEMBERS SET MEM_MOBILE_NO= '".$MEM_MOBILE_NO."',STATUS = '".$APP_TYPE."' WHERE MEM_ID = '$MEM_ID' ";
    //  print_r($sql6);
    
     $parseresult=ociparse($conn,$sql6);
    //  oci_execute($parseresult);
     if (oci_execute($parseresult)) {
     header("Location: pending_member.php");
     exit;
    }

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

    <title>CMK</title>
    <link rel="icon" href="img/logo.png" type="image/ico">

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
                        <div class="card-header py-3" style="background-color: #BB8FCE;">
                            <!-- <h6 class="m-0 font-weight-bold text-primary text-center m-4">Suhrawardy Hall Alumni Association, BUET</h6> -->
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Greater Kushtia Officer’s Kallyan Forum Dhaka</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Member Approve </h4>
                            <!-- <h6 class=" text-center m-4" style="color: white; font-weight: bold;">Reunion 2024</h6> -->

                        </div>
                        <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row mt-3" style="padding-top: 20px;">
                                        <!-- name starts  -->
                                        <div class="form-group col-md-4 col-lg-4 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Name <label style="color:red; font-weight:bold">*</label> :</label>
                                                <input style="width:70%;" type="text" class="form-control" placeholder="Enter Name" name="MEM_NAME" id="MEM_NAME" value="<?php echo $all_data[0]['MEM_NAME']  ?>" readonly>
                                            </div>
                                            <!-- name ends  -->


                                            <!-- mobile starts  -->
                                            <div class="form-group col-md-4 col-lg-4 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Mobile <label style="color:red; font-weight:bold">*</label> :</label>
                                                <input style="width:70%;" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" class="form-control"  name="MEM_MOBILE_NO" id="MEM_MOBILE_NO" value="<?php echo $all_data[0]['MEM_MOBILE_NO'] ?>" placeholder="Mobile Number" readonly>

                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    Please provide a valid Mobile Number.
                                                </div>
                                            </div>
                                            <!-- mobile ends  -->
                                          <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row">
                                             <div class="col-lg-12 col-md-12 col-sm-12">
                                             <label class="form-label" for="validationServer03">Member Approve Type <label style="color:red; font-weight:bold">*</label>:</label>
                                             </div>

                                             <div class="col-lg-12 col-md-12 col-sm-12">
                                             <select class="form-control" style="width:80%;"  name="APP_TYPE" id="APP_TYPE" required>
                                                    <option value="">Select Member Approve Type </option>
                                                    <option value="Y">YES </option>
                                                    <option value="N">NO </option>
                                                    
                                                </select>
                                                
                                            </div>

                                            </div>
                                          </div>
                                            

                                        </div>


                                        <div class="container mt-4 col-md-4 col-sm-4">
                                            <button type='submit' class='btn btn-md btn-primary btn-block' name='submit' id='submit' style="color: #000;"> <b>
                                                    Submit</b></button>
                                        </div>
                                    </form>


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


  



</body>

</html>