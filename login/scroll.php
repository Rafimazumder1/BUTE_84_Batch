<?php
include 'connection.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql_delete = "DELETE FROM SCROLL WHERE ID = :delete_id";
    $parse_delete = oci_parse($conn, $sql_delete);
    oci_bind_by_name($parse_delete, ':delete_id', $delete_id);
    $result_delete = oci_execute($parse_delete);

    if ($result_delete) {
        echo "<script>alert('Scroll Deleted Successfully'); window.location.href='scroll.php';</script>";
    } else {
        $error = oci_error($parse_delete);
        echo "<script>alert('Failed to Delete. Error: " . $error['message'] . "');</script>";
    }

    oci_free_statement($parse_delete);
}

// Handle insert request
if (isset($_POST['submit'])) {
    $SCROLL_DESC = $_POST['SCROLL_DESC'];

    $sql = "INSERT INTO SCROLL (SCROLL_DESC) VALUES (:scroll_desc)";
    $parseresult = oci_parse($conn, $sql);
    oci_bind_by_name($parseresult, ':scroll_desc', $SCROLL_DESC);
    $success = oci_execute($parseresult);

    if ($success) {
        echo '<script>alert("Data Successfully inserted"); window.location.href = "scroll.php";</script>';
    } else {
        $error = oci_error($parseresult);
        echo '<script>alert("Data Not inserted. Error: ' . $error['message'] . '");</script>';
    }

    oci_free_statement($parseresult);
}

// Fetch scroll data
$sql_scroll = "SELECT ID, SCROLL_DESC FROM SCROLL ORDER BY ID DESC";
$parse_scroll = ociparse($conn, $sql_scroll);
oci_execute($parse_scroll);
$scroll_data = [];
while ($row = oci_fetch_assoc($parse_scroll)) {
    $scroll_data[] = $row;
}
oci_free_statement($parse_scroll);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IET</title>
    <link rel="icon" href="../uploads/logo.jpeg" type="image/ico">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css" rel="stylesheet">
    <style>
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
    </style>
</head>
<body id="page-top">
<div id="wrapper">
    <?php include 'dashboard.php' ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include 'topbar.php' ?>
            <div class="container-fluid">
                <!-- Form Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3" style="background-color: #69bbf0;">
                        <h4 class="text-center m-4 text-white font-weight-bold">I.E.T Govt High School, Narayangonj</h4>
                        <h4 class="text-center m-4 text-white font-weight-bold">Add Scroll Description</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row m-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="SCROLL_DESC" class="font-weight-bold">Scroll Description :</label>
                                        <textarea name="SCROLL_DESC" id="SCROLL_DESC" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success m-3" name='submit'>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>

                <!-- Display Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-light">
                        <h6 class="m-0 font-weight-bold text-primary">Scroll Descriptions</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Scroll Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($scroll_data as $scroll_item): ?>
                                        <tr>
                                            <!-- <td><?php echo $scroll_item['ID']; ?></td> -->
                                            <td><?php echo $scroll_item['SCROLL_DESC']; ?></td>
                                            <td class="text-center">
                                                <a href="scroll.php?delete_id=<?php echo $scroll_item['ID']; ?>"
                                                   onclick="return confirm('Are you sure you want to delete this scroll?')"
                                                   class="btn btn-danger btn-sm">Delete</a>
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

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>
