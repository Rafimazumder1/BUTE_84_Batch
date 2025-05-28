<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: index.php");
}
?>

<?php
include 'connection.php';

$startDate = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$endDate = isset($_POST['end_date']) ? $_POST['end_date'] : '';

$bindStart = null;
$bindEnd = null;

// Base SQL
$sql = "SELECT * FROM MEMBERS_VIEW_T WHERE 1=1";

// Add date filter if provided
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND CREATE_DATE BETWEEN TO_DATE(:start_date, 'YYYY-MM-DD') AND TO_DATE(:end_date, 'YYYY-MM-DD')";
    $bindStart = $startDate;
    $bindEnd = $endDate;
}

$parse = oci_parse($conn, $sql);

if ($bindStart && $bindEnd) {
    oci_bind_by_name($parse, ":start_date", $bindStart);
    oci_bind_by_name($parse, ":end_date", $bindEnd);
}

oci_execute($parse);

$user_row = [];

while ($row = oci_fetch_assoc($parse)) {
    $photo = $row['MEM_PHOTO'];
    $base64Image = '';

    if (is_object($photo)) {
        $lob_content = oci_lob_read($photo, $photo->size());
        $decoded_photo = base64_decode($lob_content);

        if (!empty($decoded_photo)) {
            $base64Image = 'data:image/jpeg;base64,' . base64_encode($decoded_photo);
        }
    }

    $user_row[] = [
        'SL_NO'          => $row['SL_NO'],
        'MEM_ID'       => $row['MEM_ID'],
        'MEM_NAME'       => $row['MEM_NAME'],
        'PROF_NAME'      => $row['PROF_NAME'],
        'MEM_MOBILE_NO'  => $row['MEM_MOBILE_NO'],
        'YR_OF_PASS'     => $row['YR_OF_PASS'],
        'PROF_CODE'      => $row['PROF_CODE'],
        'PRE_EMAIL'      => $row['PRE_EMAIL'],
        'PAYMENT_STATUS' => $row['PAYMENT_STATUS'],
        'CREATE_DATE'    => $row['CREATE_DATE'],
        'MEM_PHOTO'      => $base64Image
    ];
}

oci_free_statement($parse);
oci_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IET</title>
    <link rel="icon" href="img/logo.jpeg" type="image/ico">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
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

        .btn .btn-info {
            margin-bottom: -35px !important;
            margin-left: 385px !important;
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
                        <div class="card-header py-3" style="background-color: #8468F4;">
                            <h4 class="text-center m-4" style="color: white; font-weight: bold;">I.E.T Govt High School, Narayangonj</h4>
                            <h4 class="text-center m-4" style="color: white; font-weight: bold;">100 Years Celebration</h4>
                        </div>
                        <div class="card-body">

                            <!-- Date filter form -->
                            <form method="POST" class="mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="<?php echo htmlspecialchars($startDate); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="<?php echo htmlspecialchars($endDate); ?>" required>
                                    </div>
                                    <div class="col-md-4 align-self-end">
                                        <button type="submit" class="btn btn-primary mt-2">Filter</button>
                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-secondary mt-2">Reset</a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id" width="%" cellspacing="0">
                                    <thead style="color: #212121;">
                                        <tr>
                                            <th style="text-align: center;">Sl No.</th>
                                            <th style="text-align: center;">Member Name</th>
                                            <th style="text-align: center;">SSC Year</th>
                                            <th style="text-align: center;">Mobile No</th>
                                            <th style="text-align: center;">Profession Name</th>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Payment Status</th>
                                            <th style="text-align: center;">Create Date</th>
                                            <th style="text-align: center;">Photo</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user_row as $user): ?>
                                            <tr style="color: black!important;">
                                                <td style="text-align: center;"><?php echo $user['SL_NO']; ?></td>
                                                <td style="text-align: center;"><?php echo $user['MEM_NAME']; ?></td>
                                                <td style="text-align: center;"><?php echo $user['YR_OF_PASS']; ?></td>
                                                <td style="text-align: center;"><?php echo $user['MEM_MOBILE_NO']; ?></td>
                                                <td style="text-align: center;"><?php echo $user['PROF_NAME']; ?></td>
                                                <td style="text-align: center;"><?php echo $user['PRE_EMAIL']; ?></td>
                                                <td style="text-align: center;"><?php echo $user['PAYMENT_STATUS']; ?></td>
                                                <td style="text-align: center;"><?php echo date('Y-m-d', strtotime($user['CREATE_DATE'])); ?></td>
                                                <td style="text-align: center;">
                                                    <?php if (!empty($user['MEM_PHOTO'])): ?>
                                                        <img src="<?php echo $user['MEM_PHOTO']; ?>" alt="Photo" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
                                                    <?php else: ?>
                                                        <span>No Photo</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td style="text-align: center;">
                                                    <a href="https://.org/itbl.php?id=<?php echo $user['MEM_ID']; ?>"
                                                    class="btn btn-danger btn-sm">
                                                    Download PDF
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

    <!-- Scroll Top -->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'lBfrtip',
                buttons: ['excel']
            });
        });
    </script>

</body>

</html>
