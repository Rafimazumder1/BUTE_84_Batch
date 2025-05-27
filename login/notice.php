<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $NOTICE_DESC = $_POST['NOTICE_DESC'];
    $target_file = ''; // default empty

    // Check if file is uploaded
    if (isset($_FILES['pdfInput']) && $_FILES['pdfInput']['size'] > 0) {
        $target_dir = "upload/notice/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // create directory if not exist
        }

        $original_filename = pathinfo($_FILES['pdfInput']['name'], PATHINFO_FILENAME);
        $imageFileType = strtolower(pathinfo($_FILES['pdfInput']['name'], PATHINFO_EXTENSION));
        $timestamp = time(); // to make it unique

        $target_file = $target_dir . $original_filename . "_" . $timestamp . "." . $imageFileType;

        $extensions_arr = array("pdf");

        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES['pdfInput']['tmp_name'], $target_file)) {
                // file uploaded successfully
            } else {
                echo '<script>alert("PDF upload failed.");</script>';
                $target_file = '';
            }
        } else {
            echo '<script>alert("Invalid file type. Only PDF allowed.");</script>';
            $target_file = '';
        }
    }

    // Insert into DB
    $sql = "INSERT INTO NOTICE(NOTICE_DESC, NOTICE_IMG, NOTICE_CREATE, STATUS)
            VALUES (:NOTICE_DESC, :NOTICE_IMG, :NOTICE_CREATE, 'A')";

    $parseresult = ociparse($conn, $sql);
    oci_bind_by_name($parseresult, ":NOTICE_DESC", $NOTICE_DESC);
    oci_bind_by_name($parseresult, ":NOTICE_IMG", $target_file);
    oci_bind_by_name($parseresult, ":NOTICE_CREATE", $MEM_NAME);

    $success = oci_execute($parseresult);

    if ($success) {
        echo '<script>alert("Data Successfully inserted");</script>';
        echo '<script>window.location.href = "notice.php";</script>';
        exit();
    } else {
        echo '<script>alert("Data Not inserted");</script>';
    }

    oci_free_statement($parseresult);
}

// Handle delete action
if (isset($_GET['delete_file'])) {
    $file_to_delete = $_GET['delete_file'];
    
    // First delete from database
    $sql = "DELETE FROM NOTICE WHERE NOTICE_IMG = :file_path";
    $stmt = ociparse($conn, $sql);
    oci_bind_by_name($stmt, ":file_path", $file_to_delete);
    $db_success = oci_execute($stmt);
    
    if ($db_success) {
        // Then delete the physical file
        if (file_exists($file_to_delete)) {
            if (unlink($file_to_delete)) {
                echo '<script>alert("Notice and file deleted successfully");</script>';
            } else {
                echo '<script>alert("Notice deleted but file could not be removed");</script>';
            }
        } else {
            echo '<script>alert("Notice deleted but file not found");</script>';
        }
    } else {
        echo '<script>alert("Error deleting notice");</script>';
    }
    
    echo '<script>window.location.href = "notice.php";</script>';
    oci_free_statement($stmt);
    exit();
}

// Fetch all notices
$query = "SELECT NOTICE_DESC, NOTICE_IMG FROM NOTICE ORDER BY ROWID";
$stid = ociparse($conn, $query);
oci_execute($stid);
$notices = [];
while ($row = oci_fetch_assoc($stid)) {
    $notices[] = $row;
}
oci_free_statement($stid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BANDHAN-84</title>
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
        
        /* PDF viewer styling */
        .pdf-viewer {
            width: 100%;
            height: 300px;
            border: 1px solid #ddd;
            margin-top: 10px;
        }
        
        /* Table styling */
        .notice-table {
            margin-top: 30px;
        }
        
        .notice-table th {
            background-color: #4e73df;
            color: white;
        }
        
        .action-btns {
            white-space: nowrap;
        }
        
        /* Textarea styling */
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        /* Fix for file links */
        .file-link {
            word-break: break-all;
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
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Bandhonn - 84</h4>
                            <h4 class=" text-center m-4" style="color: white; font-weight: bold;">Notice Create </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row m-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="NOTICE_DESC" class="font-weight-bold">Notice Description:</label>
                                                <textarea name="NOTICE_DESC" id="NOTICE_DESC" class="form-control" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="pdfInput" class="font-weight-bold">Notice Upload <span style="color:red; font-weight:bold">*</span>:</label>
                                                <input type="file" class="form-control-file" name="pdfInput" id="pdfInput" accept=".pdf" onchange="displayPDF(this.files)" required />
                                                <small class="form-text text-muted">Only PDF files are allowed.</small>
                                                <div id="pdfContainer" class="mt-2"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center mt-3">
                                            <button type="submit" class="btn btn-success" name='submit' id='submit'>
                                                Save Notice
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Notice Table -->
                            <div class="notice-table mt-5">
                                <h4 class="mb-4">Notice List</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Notice Description</th>
                                                <!-- <th>File</th> -->
                                                <th>PDF View</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($notices as $index => $notice): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($notice['NOTICE_DESC']) ?></td>
                                                <!-- <td>
                                                    <?php if (!empty($notice['NOTICE_IMG'])): ?>
                                                        <a href="<?= $notice['NOTICE_IMG'] ?>" target="_blank" class="btn btn-info btn-sm file-link">View File</a>
                                                    <?php else: ?>
                                                        <span class="text-muted">No file</span>
                                                    <?php endif; ?>
                                                </td> -->
                                                <td>
                                                    <?php if (!empty($notice['NOTICE_IMG'])): ?>
                                                        <button class="btn btn-primary btn-sm view-pdf" data-pdf="<?= $notice['NOTICE_IMG'] ?>">Preview PDF</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="action-btns">
                                                    <?php if (!empty($notice['NOTICE_IMG'])): ?>
                                                        <a href="?delete_file=<?= urlencode($notice['NOTICE_IMG']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this notice and its PDF file?')">Delete</a>
                                                    <?php endif; ?>
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- PDF Viewer Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modalPdfViewer" class="pdf-viewer"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- datatable scripts -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <script>
        // Initialize DataTable - fixed to prevent reinitialization
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                    responsive: true
                });
            }
            
            // PDF viewer functionality
            $(document).on('click', '.view-pdf', function() {
                var pdfUrl = $(this).data('pdf');
                // Check if file exists first
                $.ajax({
                    url: pdfUrl,
                    type: 'HEAD',
                    error: function() {
                        alert('PDF file not found or cannot be accessed');
                    },
                    success: function() {
                        $('#modalPdfViewer').html('<embed src="' + pdfUrl + '" type="application/pdf" width="100%" height="100%" />');
                        $('#pdfModal').modal('show');
                    }
                });
            });
        });

        function displayPDF(files) {
            const file = files[0];
            if (file) {
                if (file.type === "application/pdf") {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const pdfContent = `<embed src="${e.target.result}" type="application/pdf" width="100%" height="400px" />`;
                        document.getElementById("pdfContainer").innerHTML = pdfContent;
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Please select a PDF file.");
                    document.getElementById("pdfInput").value = "";
                    document.getElementById("pdfContainer").innerHTML = "";
                }
            }
        }
        
        // Function to check file existence before deletion
        function confirmDelete(fileUrl) {
            $.ajax({
                url: fileUrl,
                type: 'HEAD',
                error: function() {
                    if (confirm('File not found on server. Delete the record anyway?')) {
                        window.location.href = '?delete_file=' + encodeURIComponent(fileUrl);
                    }
                },
                success: function() {
                    if (confirm('Are you sure you want to delete this notice and its PDF file?')) {
                        window.location.href = '?delete_file=' + encodeURIComponent(fileUrl);
                    }
                }
            });
            return false;
        }
    </script>
</body>
</html>