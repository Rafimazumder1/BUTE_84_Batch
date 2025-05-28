<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header("location: index.php");
// }
?>

<?PHP
//set_time_limit(300);
include 'connection.php';

// $session_id = $_SESSION['id'];
// $sql10 = "SELECT * FROM NAA_MEMBERS WHERE MEM_ID = $session_id";
// $parse = ociparse($conn, $sql10);
// oci_execute($parse);

// while ($row = oci_fetch_assoc($parse)) {
//     $main[] = $row;

// }

// $MEM_ID = $main[0]['MEM_ID'];





if (isset($_POST['submit'])) {
    $SLIDER_YNAME = $_POST['SLIDER_YNAME'];
    $success = true;  // Track successful uploads

    // Define the target directory for image uploads
    $target_dir = "../uploads/albums/thumbnails/";

    // Check if the directory exists, if not create it
    if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0777, true)) {
            echo '<script>alert("Failed to create directory.");</script>';
            $success = false;
        }
    }

    // Loop through each file uploaded
    for ($i = 0; $i < count($_FILES['PIC_LOC']['name']); $i++) {
        // Generate a random number for the filename
        $number = rand(100, 999);
        // Get the file extension
        $imageFileType = strtolower(pathinfo($_FILES['PIC_LOC']['name'][$i], PATHINFO_EXTENSION));
        // Create a sanitized filename
        $filename = preg_replace("/[^a-zA-Z0-9_\-\.]/", "_", strtok($SLIDER_YNAME, " ")) . "_" . $number . "." . $imageFileType;
        $target_file = $target_dir . $filename;

        // Valid file types
        $extensions_arr = ["jpg", "jpeg", "png", "gif"];

        // Check if the file is a valid image type
        if (in_array($imageFileType, $extensions_arr)) {
            // Attempt to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['PIC_LOC']['tmp_name'][$i], $target_file)) {
                // Save the relative path of the uploaded image into the database
                $sql = "INSERT INTO IET_SLIDER (SLIDER_YNAME, STATUS, PIC_LOC)
                        VALUES (:slider_name, 'A', :pic_loc)";
                $stmt = oci_parse($conn, $sql);
                oci_bind_by_name($stmt, ':slider_name', $SLIDER_YNAME);
                oci_bind_by_name($stmt, ':pic_loc', $target_file);
                
                if (!oci_execute($stmt)) {
                    $success = false; // If database insert fails, set success to false
                    echo '<script>alert("Database insertion failed");</script>';
                    break;
                }

                oci_free_statement($stmt);
            } else {
                // If file move fails, show error
                echo '<script>alert("Failed to upload file: ' . $_FILES['PIC_LOC']['name'][$i] . '");</script>';
                $success = false;
                break;
            }
        } else {
            // If file type is invalid, show error
            echo '<script>alert("Invalid file type: ' . $_FILES['PIC_LOC']['name'][$i] . '");</script>';
            $success = false;
            break;
        }
    }

    // Check if all files were uploaded and inserted successfully
    if ($success) {
        echo '<script>alert("Upload successful"); window.location="slider_upload.php";</script>';
    } else {
        echo '<script>alert("Upload failed");</script>';
    }

    // Close the database connection
    oci_close($conn);
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
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">I.E.T Govt High School, Narayangonj</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Pic Upload </h4>
                            <!-- <h6 class=" text-center m-4" style="color: white; font-weight: bold;">Reunion 2024</h6> -->

                        </div>
                        <div class="card-body">
                            
                            <div class="form-body">
                                <form action="" method="POST" enctype="multipart/form-data">


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
                                            <div class="col-lg-5 col-md-5 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <label for="text" class="text-center font-weight-bold">Slider Name :</label>

                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <textarea name="SLIDER_YNAME" id="SLIDER_YNAME" cols="50" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row ">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="text" class="text-center font-weight-bold">Pic Upload <label style="color:red; font-weight:bold">*</label> :</label>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                <input type="file" name="PIC_LOC[]" id="PIC_LOC" data-multiple-caption="{count} files selected" multiple>

                                                </div>
                                            </div>
                                        </div>

                                        </div>


                                        <div class="row m-3">
                                            <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success m-3" name='submit' id='submit' onclick="return Validate()" Enabled>
                                                Save
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