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

    $GALLARYNAME = $_POST['GALLARYNAME'];


    for ($i = 0; $i < count($_FILES['PIC_LOC']['name']); $i++) {

        // echo $_FILES['PIC_LOC']['name'][$i];
        // echo "<br>";

        $target_dir = "upload/gallery/";
        // $target_file1 = $target_dir . basename($_FILES["PIC_LOC"]["name"][$i]);
        // $target_file = $target_dir . $GALLARYNAME."_". $i. ".". basename($_FILES["PIC_LOC"]["type"][$i])  ;
        $number = rand(100, 999);
        $target_file = $target_dir . strtok($GALLARYNAME, " ") . "_" . $number . "." . basename($_FILES['PIC_LOC']["type"][$i]);
        // echo $target_file;
        // echo "<br>";

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $extensions_arr)) {


            // Upload file
            move_uploaded_file($_FILES['PIC_LOC']['tmp_name'][$i], $target_file);
        }


        // image upload ends

        $sql = "INSERT INTO IET_GALLERY(GALLARYNAME,  STATUS, PIC_LOC, USER_ID)
    VALUES ('" . $GALLARYNAME . "',  'A' , '" . $target_file . "',
     '" . "')";

        //    print_r($sql);
        $parseresult = ociparse($conn, $sql);
        $success = oci_execute($parseresult);


    }

    if ($success) {
        echo '<script>alert("Data Successfully inserted"); window.location.href = "gallery_add.php";</script>';
    } else {
        echo '<script>alert("Data Not inserted");</script>';
    }

    oci_free_statement($parseresult);

}


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Fetch the image path before deleting the record
    $sql_select = "SELECT PIC_LOC FROM IET_GALLERY WHERE GALLARY_ID = :id";
    $parse_select = ociparse($conn, $sql_select);
    oci_bind_by_name($parse_select, ':id', $delete_id);
    oci_execute($parse_select);
    $row_delete = oci_fetch_assoc($parse_select);
    $image_path_to_delete = $row_delete['PIC_LOC'];
    oci_free_statement($parse_select);

    $sql_delete = "DELETE FROM IET_GALLERY WHERE GALLARY_ID = :id";
    $parse_delete = ociparse($conn, $sql_delete);
    oci_bind_by_name($parse_delete, ':id', $delete_id);
    $success_delete = oci_execute($parse_delete);
    oci_free_statement($parse_delete);

    if ($success_delete) {
        // Delete the image file from the folder
        if (file_exists($image_path_to_delete)) {
            unlink($image_path_to_delete);
        }
        echo '<script>alert("Picture Deleted Successfully"); window.location.href = "gallery_add.php";</script>';
    } else {
        echo '<script>alert("Error deleting picture");</script>';
    }
}

// Fetch existing gallery data for display
$sql_gallery = "SELECT GALLARY_ID, GALLARYNAME, PIC_LOC FROM IET_GALLERY ORDER BY GALLARYNAME";
$parse_gallery = ociparse($conn, $sql_gallery);
oci_execute($parse_gallery);
$gallery_data = [];
while ($row = oci_fetch_assoc($parse_gallery)) {
    $gallery_data[] = $row;
}
oci_free_statement($parse_gallery);

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

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=c6b24f8a56e04fcee6105a02f4027462.css" rel="stylesheet" type="text/css" />

    <style>
        /* for excel button design start */
        .dt-buttons {
            visibility: hidden;
        }

        .dt-buttons button:after {
            content: 'Download Excel';
            visibility: visible;
            background-color: #11c7e0;
            margin-left: 200px;
            padding: 10px;
            color: white;
            border-radius: 11px;
            font-size: 15px;
        }

        .btn .btn-info {
            margin-bottom: -35px !important;
            margin-left: 385px !important;
        }

        /* for excel button design start */
        .gallery-image {
            max-width: 150px;
            max-height: 100px;
            display: block;
            margin: 5px auto;
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <?php include 'dashboard.php' ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include 'topbar.php' ?>

                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #69bbf0;">
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">I.E.T Govt High School, Narayangonj</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Pic Upload </h4>
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
                                                        <label for="text" class="text-center font-weight-bold">Gallary Name :</label>

                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <textarea name="GALLARYNAME" id="GALLARYNAME" cols="50" rows="3"></textarea>
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
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #f8f9fa;">
                            <h6 class="m-0 font-weight-bold text-primary">Uploaded Gallery Pictures</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Gallery Name</th>
                                            <th>Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($gallery_data as $gallery_item): ?>
                                            <tr>
                                                <td><?php echo $gallery_item['GALLARYNAME']; ?></td>
                                                <td><img src="<?php echo $gallery_item['PIC_LOC']; ?>" alt="Gallery Image" class="gallery-image"></td>
                                                <td class="text-center">
                                                    <a href="gallery_add.php?delete_id=<?php echo $gallery_item['GALLARY_ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this picture?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</body>

</html>