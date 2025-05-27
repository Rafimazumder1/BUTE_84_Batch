<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: index.php");
}
?>

<?PHP
//set_time_limit(300);
include 'connection.php';
// error_reporting(0);


/* Retrive batch */
$curs = oci_new_cursor($conn);

$stid = oci_parse($conn, "begin PKG_DASH_BOARD.DPD_ADM_batch(:cur_data); end;");

oci_bind_by_name($stid, ":cur_data", $curs, -1, OCI_B_CURSOR);

oci_execute($stid);
oci_execute($curs);

while (($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {

    $adm_batch[] = $row;
}





if (isset($_POST['submit'])) {

    $CAT_CODE = $_POST['CAT_CODE'];



    $sql = "SELECT * FROM V_TOTAL_REG_75 WHERE batch = '$CAT_CODE'";

    $parse = ociparse($conn, $sql);
    oci_execute($parse);

    print_r($sql);
    while ($row = oci_fetch_assoc($parse)) {
        $user_row[] = $row;
    }

    // var_dump($division);
    // echo count($division);
    oci_free_statement($parse);
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

    <title>75 Years Celebration Batch Wise Registration List</title>
    <link rel="icon" href="img/ndc_75.png" type="image/ico">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatable  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=c6b24f8a56e04fcee6105a02f4027462.css" rel="stylesheet" type="text/css" />

    <style>
        .pdf-header {
            background-color: #007bff;
            /* Change the color to your desired background color */
            color: #fff;
            /* Change the text color to contrast with the background */
            text-align: center;
        }

        /* Center the text in the table body cells */
        #table_id td {
            text-align: center;
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #e8b742;;">
                            <!-- <h6 class="m-0 font-weight-bold text-primary text-center m-4">Suhrawardy Hall Alumni Association, BUET</h6> -->
                            <h4 class=" text-center m-4" style="color: #212121; font-weight: bold;">NOTRE DAME COLLEGE, DHAKA</h4>
                            <!-- <h4 class=" text-center m-4" style="color: #212121; font-weight: bold;">75 Years Celebration Batch Wise Registration List</h4> -->
                        </div>
                        <div class="card-body">
                            <!-- form start -->
                            <form action="" method="post">
                                <div class="row">


                                    <div class="col-sm-12 col-md-4">
                                        <label for="">Batch:</label>
                                        <select name="CAT_CODE" id="CAT_CODE" class="form-control">
                                            <option value="">-Select Batch</option>
                                            <?php
                                            for ($i = 0; $i < count($adm_batch); $i++) {


                                                if ($adm_batch[$i]["YEAR_CODE"] == $CAT_CODE) {
                                                    echo "<option value='" . $adm_batch[$i]["YEAR_CODE"] . "' selected>" . $adm_batch[$i]["YEAR_NAME"] . "</option>";
                                                } else {
                                                    echo "<option value='" . $adm_batch[$i]["YEAR_CODE"] . "'>" . $adm_batch[$i]["YEAR_NAME"] . "</option>";
                                                }
                                            }

                                            ?>



                                        </select>
                                    </div>


                                    <div class="col-sm-12 col-md-4" style="justify-content:center;">
                                        <div style="margin-top: 30px;margin-left: 80px;">
                                            <input type="submit" name="submit" value="Load" class="btn btn-success">
                                        </div>

                                    </div>



                                </div>







                            </form>
                            <!-- form end -->

                        </div>
                    </div>

                    <?php
                    if (isset($_POST['submit'])) {
                    ?>

                        <style>
                            #searchInput {
                                margin-bottom: 10px;
                            }

                            #searchInput {
                                padding: 8px;
                                margin-right: 5px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                            }

                            #searchButton {
                                padding: 8px 12px;
                                border: 1px solid #007BFF;
                                border-radius: 4px;
                                background-color: #007BFF;
                                color: #fff;
                                cursor: pointer;
                            }

                            #searchButton:hover {
                                background-color: #0056b3;
                            }
                        </style>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <!-- <input type="button" id="btnExport" value="Export" /> -->
                                <button id="download" class="btn btn-success">download PDF</button>
                                <div class="table-responsive " id="invoice">
                                    <h4 class=" text-center" style="color: #212121; font-weight: bold;">75 Years Celebration Registration List(Batch: <?php echo $user_row[0]['BATCH'] ?>)</h4>
                                    <!-- <h6 class=" text-center m-4"> Batch: <?php echo $user_row[0]['BATCH'] ?></h6> -->
                                    <input type="text" id="searchInput" placeholder="Search by Name" onkeyup="filterTable()">

                                    <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                                        <thead style="color: #212121;">
                                            <tr>
                                                <th style="text-align: center;">SL No</th>
                                                <th style="text-align: center;">Reg No.</th>
                                                <th style="text-align: center;">Member Name</th>
                                                <th style="text-align: center;">Member Photo</th>
                                                <th style="text-align: center;">College Roll No</th>
                                                <!-- <th style="text-align: center;">Batch</th> -->
                                                <th style="text-align: center;"> Person </th>
                                                <th style="text-align: center;">Channel</th>
                                                <th style="text-align: center;">Member's Signature </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $serialNumber = 1;
                                            $image = array();
                                            $abc = 0;
                                            for ($i = 0; $i < count($user_row); $i++) {
                                                $abc = array(); // Initialize $abc for each row

                                                foreach ($user_row[$i] as $key => $data) {
                                                    if ($key === 'MEM_PHOTO') {
                                                        if (is_object($data) && get_class($data) === 'OCI-Lob') {
                                                            // Read binary data from CLOB
                                                            $lob = oci_new_descriptor($conn, OCI_D_LOB);
                                                            oci_lob_read($data, $lob);
                                                            $abc[$key] = base64_encode($lob->load());
                                                            $lob->free();
                                                            $image[] = $abc[$key];
                                                        } else {
                                                            // Handle other types or strings here
                                                            $abc[$key] = is_object($data) ? $data->load() : $data;
                                                        }
                                                    } else {
                                                        $abc[$key] = $data;
                                                    }
                                                }

                                            ?>


                                                <tr style="color: black!important;">
                                                    <td style="background: #3ab54a; text-align: center;"><?php echo $serialNumber; ?></td>
                                                    <td style="background: #FFBE5B; text-align: center;"><?php echo $user_row[$i]['REG_NO'] ?></td>
                                                    <td style="background: #94D441; text-align: center;"><?php echo $user_row[$i]['MEM_NAME'] ?></td>
                                                    <td style="background: #94D441; text-align: center;width: 60px;height:60px;">
                                                        <?php if (isset($abc['MEM_PHOTO'])) : ?>
                                                            <img src="data:image/jpeg;base64,<?php echo $abc['MEM_PHOTO']; ?>" id="output_image" width="60px" height="60px" />
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="background: #94D441; text-align: center;"><?php echo $user_row[$i]['ROLL_NO'] ?></td>
                                                    <!-- <td style="background: #94D441; text-align: center;"><?php echo $user_row[$i]['BATCH'] ?></td> -->
                                                    <td style="background: #94D441; text-align: center;"><?php echo $user_row[$i]['TOT_PERSON'] ?></td>
                                                    <td style="background: #94D441; text-align: center;"><?php echo $user_row[$i]['CHANNEL'] ?></td>
                                                    <td style="background: #94D441; text-align: center;"></td>
                                                </tr>

                                            <?php
                                                $serialNumber++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

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
    <!-- <script src="asset/jquery/jquery-3.6.0.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <style>
        @page {
            size: A4;
            margin: 0;
        }

        /* tr:nth-child(11n) {
        page-break-before: always;
    } */


        tbody tr.page-break {
            page-break-before: always;
        }




        thead {
            display: table-header-group;
        }

        @media print {
            thead {
                display: table-header-group;
                position: fixed;
                top: 0;
            }
        }
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowsPerPage = 12; // Adjust this value as needed
            var tableRows = document.querySelectorAll('tbody tr');

            for (var i = rowsPerPage; i < tableRows.length; i += rowsPerPage) {
                tableRows[i - 1].classList.add('page-break');
            }
        });
    </script>


    <script>
        window.onload = function() {
            document.getElementById("download").addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                var opt = {
                    margin: [10, 5, 5, 5],
                    filename: 'member_details.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 1
                    },
                    html2canvas: {
                        dpi: 192,
                        scale: 1,
                        letterRendering: true,
                        useCORS: true
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            });
        }
    </script>



    <script>
        function filterTable() {
            // Get input value and convert to lowercase for case-insensitive search
            var input = document.getElementById('searchInput').value.toLowerCase();

            // Get all table rows
            var rows = document.getElementById('table_id').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            // Iterate through rows and hide/show based on search input
            for (var i = 0; i < rows.length; i++) {
                var rowVisible = false;

                // Iterate through all columns (td elements) in the current row
                for (var j = 0; j < rows[i].cells.length; j++) {
                    var cell = rows[i].cells[j];
                    var cellValue = cell.textContent || cell.innerText;

                    // Check if the cell value contains the search input
                    if (cellValue.toLowerCase().indexOf(input) > -1) {
                        rowVisible = true;
                        break; // Break out of the loop if a match is found in any column
                    }
                }

                // Set the display property based on whether the row should be visible
                rows[i].style.display = rowVisible ? '' : 'none';
            }
        }
    </script>












</body>

</html>