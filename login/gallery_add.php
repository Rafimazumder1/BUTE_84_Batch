<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $GALLARYNAME = $_POST['GALLARYNAME'];
    $STATUS = $_POST['PLUG']; // Slot value will now go into STATUS column

    for ($i = 0; $i < count($_FILES['PIC_LOC']['name']); $i++) {
        $target_dir = "upload/gallery/";

        $number = rand(100, 999);
        $originalFileName = $_FILES['PIC_LOC']['name'][$i];
        $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
        $newFileName = strtok($GALLARYNAME, " ") . "_" . $number . "." . $fileExtension;
        $target_file = $target_dir . $newFileName;

        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($fileExtension, $allowed_extensions)) {
            move_uploaded_file($_FILES['PIC_LOC']['tmp_name'][$i], $target_file);

            $sql = "INSERT INTO GALLERY (GALLARYNAME, STATUS, PIC_LOC) 
                    VALUES (:GALLARYNAME, :STATUS, :PIC_LOC)";

            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ':GALLARYNAME', $GALLARYNAME);
            oci_bind_by_name($stmt, ':STATUS', $STATUS);
            oci_bind_by_name($stmt, ':PIC_LOC', $target_file);
            $success = oci_execute($stmt);
            oci_free_statement($stmt);
        }
    }

    if (isset($success) && $success) {
        echo '<script>alert("Data Successfully inserted"); window.location.href = "gallery_add.php";</script>';
    } else {
        echo '<script>alert("Data Not inserted");</script>';
    }
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_select = "SELECT PIC_LOC FROM GALLERY WHERE GALLARY_ID = :id";
    $parse_select = ociparse($conn, $sql_select);
    oci_bind_by_name($parse_select, ':id', $delete_id);
    oci_execute($parse_select);
    $row_delete = oci_fetch_assoc($parse_select);
    $image_path_to_delete = $row_delete['PIC_LOC'];
    oci_free_statement($parse_select);

    $sql_delete = "DELETE FROM GALLERY WHERE GALLARY_ID = :id";
    $parse_delete = ociparse($conn, $sql_delete);
    oci_bind_by_name($parse_delete, ':id', $delete_id);
    $success_delete = oci_execute($parse_delete);
    oci_free_statement($parse_delete);

    if ($success_delete) {
        if (file_exists($image_path_to_delete)) {
            unlink($image_path_to_delete);
        }
        echo '<script>alert("Picture Deleted Successfully"); window.location.href = "gallery_add.php";</script>';
    } else {
        echo '<script>alert("Error deleting picture");</script>';
    }
}

$sql_gallery = "SELECT GALLARY_ID, GALLARYNAME, PIC_LOC FROM GALLERY ORDER BY GALLARYNAME";
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
    <meta charset="UTF-8">
    <title>Gallery Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .gallery-image {
        max-height: 100px;
        border-radius: 5px;
    }
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #69bbf0;">
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">I.E.T Govt High
                                School, Narayangonj</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Gallery Upload </h4>
                        </div>

                        <h2 class="text-center mb-4">Upload Gallery Images</h2>


                        <form action="" method="POST" enctype="multipart/form-data"
                            class="p-4 bg-white rounded shadow-sm">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="GALLARYNAME" class="form-label">Gallery Name:</label>
                                    <textarea name="GALLARYNAME" id="GALLARYNAME" class="form-control" rows="3"
                                        required></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for="PIC_LOC" class="form-label">Pic Upload <span
                                            class="text-danger">*</span>:</label>
                                    <input type="file" name="PIC_LOC[]" id="PIC_LOC" class="form-control" multiple
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="PLUG" class="form-label">Choose Slot <span
                                            class="text-danger">*</span>:</label>
                                    <select name="PLUG" id="PLUG" class="form-select" required>
                                        <option value="">--Select--</option>
                                        <option value="S">Group Photo</option>
                                        <option value="N">Event Photo</option>
                                        <option value="T">Our School</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="submit" id="submit"
                                    class="btn btn-success px-5">Save</button>
                            </div>
                        </form>

                        <hr class="my-5">

                        <h4 class="mb-3">Uploaded Gallery</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Gallery Name</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gallery_data as $gallery_item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($gallery_item['GALLARYNAME']) ?></td>
                                        <td><img src="<?= $gallery_item['PIC_LOC'] ?>" class="gallery-image"></td>
                                        <td>
                                            <a href="gallery_add.php?delete_id=<?= $gallery_item['GALLARY_ID'] ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($gallery_data)): ?>
                                    <tr>
                                        <td colspan="3">No images found.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>