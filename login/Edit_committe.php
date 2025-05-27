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

$EC_ID = $_GET['id'];
$sql10 = "SELECT * FROM EC_COMMITT_NAME WHERE EC_ID = $EC_ID";
$parse = ociparse($conn, $sql10);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $all_data[] = $row;

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
    $NAME = $_POST['NAME'];
    $MEM_MOBILE_NO = $_POST['MEM_MOBILE_NO'];
    $POS_CODE = $_POST['POS_CODE'];
    $PROFESSION = $_POST['PROFESSION'];
    $DESIGNATION = $_POST['DESIGNATION'];
    $EMAIL = $_POST['EMAIL'];
    $ADDRESS = $_POST['ADDRESS'];
    $COM_TYPE = $_POST['COM_TYPE'];




    $returnval = 0;
   



    $stid = oci_parse($conn, "begin PKG_Ec_Comm.DPD_cmk_Ec_Comm_UPDATE(:o_status,:EC_ID,:POS_CODE,:NAME,:MEM_MOBILE_NO,:MEM_PHOTO,:PROFESSION,:ADDRESS,:EMAIL,:DESIGNATION,:COM_TYPE); end;");


    oci_bind_by_name($stid, ":o_status", $returnval, -1, SQLT_INT);
    oci_bind_by_name($stid, ":EC_ID", $EC_ID, -1, SQLT_INT);
    oci_bind_by_name($stid, ":POS_CODE", $POS_CODE, -1, SQLT_INT);
    oci_bind_by_name($stid, ":NAME", $NAME, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":MEM_MOBILE_NO", $MEM_MOBILE_NO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":MEM_PHOTO", $MEM_PHOTO, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":PROFESSION", $PROFESSION, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":ADDRESS", $ADDRESS, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":EMAIL", $EMAIL, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":DESIGNATION", $DESIGNATION, -1, SQLT_CHR);
    oci_bind_by_name($stid, ":COM_TYPE", $COM_TYPE, -1, SQLT_CHR);
    

    oci_execute($stid);

    //print $returnval;
    //print $returnval;
    if ($returnval === 0) {
        echo '<script>alert("Please carefully fill up all the fields.")</script>';
    } else if ($returnval === 1) {
        header("location: committe.php");
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
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Edit Information </h4>
                            <!-- <h6 class=" text-center m-4" style="color: white; font-weight: bold;">Reunion 2024</h6> -->

                        </div>
                        <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row mt-3" style="padding-top: 20px;">
                                          <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row">
                                             <div class="col-lg-12 col-md-12 col-sm-12">
                                             <label class="form-label" for="validationServer03">Committie Type <label style="color:red; font-weight:bold">*</label>:</label>
                                             </div>

                                             <div class="col-lg-12 col-md-12 col-sm-12">
                                                <?php
                                                        include 'connection.php';

                                                        $sql = "SELECT * FROM EC_COM_MST";
                                                        $parseresults = ociparse($conn, $sql);
                                                        ociexecute($parseresults);

                                                        echo '<select class="form-control" style="width:70%;"  name="COM_TYPE" id="COM_TYPE" required>' ;
                                                        echo '<option value="">Select Committie Type</option>';
                                                        while ($row = oci_fetch_assoc($parseresults)) {
                                                            if ($row['COM_CODE'] == $all_data[0]['COM_TYPE']) {
                                                                echo '<option value=' . $row['COM_CODE'] . ' selected>' . $row['COM_DESC'] . '</option>';
                                                            } else {
                                                                echo '<option value=' . $row['COM_CODE'] . '>' . $row['COM_DESC'] . '</option>';
                                                            }
                                                        }
                                                        echo '</select>';
                                                        oci_free_statement($parseresults);
                                                        oci_close($conn);
                                                        ?>
                                            </div>

                                            </div>
                                          </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold" style="color: #BB8FCE">Photograph :</label>

                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                        <input type="file" accept="image/*" name="file" id="file" onchange="preview_image(event)" required>


                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <img src="data:image/jpeg;base64,<?php echo $photoout; ?>"  id="output_image" width="130px" height="130px"style="border: 2px solid #52BE80;"></img>
                                                        <input type="text" value="<?php echo $photoout; ?>" class="form-control is-invalid" aria-describedby="validationServer03Feedback" name="basedata" id="basedata" hidden>
                                                        <h6 style="color: red;font-size: 9px;"> <span style="font-weight: bold">Image size must be 100kb * 100kb</span> </h6>
                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-sm-12"></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <!-- name starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Name <label style="color:red; font-weight:bold">*</label> :</label>
                                                <input style="width:70%;" type="text" class="form-control" placeholder="Enter Name" name="NAME" id="NAME" value="<?php echo $all_data[0]['NAME']  ?>" required>
                                            </div>
                                            <!-- name ends  -->


                                            <!-- mobile starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Mobile <label style="color:red; font-weight:bold">*</label> :</label>
                                                <input style="width:70%;" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" class="form-control"  name="MEM_MOBILE_NO" id="MEM_MOBILE_NO" value="<?php echo $all_data[0]['MEM_MOBILE_NO'] ?>" placeholder="Mobile Number">

                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    Please provide a valid Mobile Number.
                                                </div>
                                            </div>
                                            <!-- mobile ends  -->




                                            <!-- Faculty starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12 pl-0">
                                                <label class="form-label" for="validationServer03">Position <label style="color:red; font-weight:bold">*</label>:</label>

                                                <?php
                                                        include 'connection.php';

                                                        $sql = "SELECT * FROM EC_COMMITT_POSI";
                                                        $parseresults = ociparse($conn, $sql);
                                                        ociexecute($parseresults);

                                                        echo '<select class="form-control" style="width:70%;"  name="POS_CODE" id="POS_CODE" required>';
                                                        echo '<option value="">Select Position</option>';
                                                        while ($row = oci_fetch_assoc($parseresults)) {
                                                            if ($row['POS_TYPE_CODE'] == $all_data[0]['POS_CODE']) {
                                                                echo '<option value=' . $row['POS_TYPE_CODE'] . ' selected>' . $row['POSITION'] . '</option>';
                                                            } else {
                                                                echo '<option value=' . $row['POS_TYPE_CODE'] . '>' . $row['POSITION'] . '</option>';
                                                            }
                                                        }
                                                        echo '</select>';
                                                        oci_free_statement($parseresults);
                                                        oci_close($conn);
                                                        ?>
                                            </div>
                                            <!-- Faculty ends  -->



                                            <!-- Profession starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Work Place :</label>

                                                <input style="width:70%;" type="text" class="form-control"  placeholder="Work Place" name="PROFESSION" id="PROFESSION" value="<?php echo $all_data[0]['PROFESSION'] ?>" required>
                                            </div>
                                            <!-- Profession ends  -->


                                            <!-- designation starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Designation :</label>

                                                <input style="width:70%;" type="text" class="form-control"  placeholder="Designation" name="DESIGNATION" id="DESIGNATION" value="<?php echo $all_data[0]['DESIGNATION'] ?>" required>
                                            </div>
                                            <!-- designation ends  -->


                                            <!-- email starts  -->
                                            <div class="form-group col-md-6 col-lg-6 col-sm-12  pl-0">
                                                <label class="form-label" for="validationServer03">Email <label style="color:red; font-weight:bold">*</label> :</label>
                                                
                                                <input style="width:70%;" type="email" class="form-control"  placeholder="Email Address" name="EMAIL" id="EMAIL" value="<?php echo $all_data[0]['EMAIL'] ?>" >
                                            </div>
                                            <!-- email ends  -->

                                            <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="text" class="text-center font-weight-bold">Permanent Address  :</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="ADDRESS" id="ADDRESS" cols="50" rows="3"><?php echo $all_data[0]['ADDRESS'] ?></textarea>
                                        </div>
                                        </div>
                                        </div>


                                        <div class="container mt-4 col-md-4 col-sm-4">
                                            <button type='submit' class='btn btn-md btn-primary btn-block' name='submit' id='submit' style="color: #000;"> <b>
                                                    Update</b></button>
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



    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'excel'
                ]
            });
        });
    </script>

</body>

</html>