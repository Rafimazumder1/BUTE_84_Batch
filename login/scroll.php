<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $SCROLL_DESC = $_POST['SCROLL_DESC'];

    $sql = "INSERT INTO IET_SCROLL (SCROLL_DESC) VALUES (:scroll_desc)";
    $parseresult = ociparse($conn, $sql);
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

// Fetch existing scroll data for display
$sql_scroll = "SELECT ID, SCROLL_DESC FROM IET_SCROLL ORDER BY ID DESC";
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #69bbf0;">
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">I.E.T Govt High School, Narayangonj</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Add Scroll Description</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <form action="" method="POST">
                                    <div class="row m-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="SCROLL_DESC" class="text-center font-weight-bold">Scroll Description :</label>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <textarea name="SCROLL_DESC" id="SCROLL_DESC" cols="80" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-3">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success m-3" name='submit' id='submit'>
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
                            <h6 class="m-0 font-weight-bold text-primary">Scroll Descriptions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Scroll Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($scroll_data as $scroll_item): ?>
                                            <tr>
                                                <td><?php echo $scroll_item['ID']; ?></td>
                                                <td><?php echo $scroll_item['SCROLL_DESC']; ?></td>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

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