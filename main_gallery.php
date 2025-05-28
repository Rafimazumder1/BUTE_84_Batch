<?php
include 'connection.php';

// Fetch slot (status) filter from URL
$selectedStatus = isset($_GET['status']) ? $_GET['status'] : '';

// Prepare SQL query with optional status filtering
$sql = "SELECT GALLARYNAME, PIC_LOC, STATUS FROM GALLERY";
if (!empty($selectedStatus)) {
    $sql .= " WHERE STATUS = :status";
}
$sql .= " ORDER BY GALLARYNAME";

$parse = oci_parse($conn, $sql);
if (!empty($selectedStatus)) {
    oci_bind_by_name($parse, ':status', $selectedStatus);
}
oci_execute($parse);

// Organize data by gallery name
$gallery = [];
$imageToGallery = [];
$allImages = [];

while ($row = oci_fetch_assoc($parse)) {
    $galleryName = $row['GALLARYNAME'];
    $picPath = './login/' . $row['PIC_LOC'];
    $gallery[$galleryName][] = $picPath;
    $imageToGallery[$picPath] = $galleryName;
    $allImages[] = $picPath;
}
oci_free_statement($parse);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Shadow + zoom hover effect container */
        .image-hover-wrapper {
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15);
            transition: box-shadow 0.3s ease;
        }
        .image-hover-wrapper:hover {
            box-shadow: 0 10px 20px rgba(0,0,0,0.4);
        }

        /* Image zoom effect */
        .image-fit {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.4s ease;
            display: block;
        }
        .image-hover-wrapper:hover .image-fit {
            transform: scale(1.1);
        }

        /* Modal styling */
        .modal-xl {
            max-width: 95%;
        }

        .modal-body {
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .modal-img {
            width: 100%;
            height: 80vh;
            object-fit: contain;
        }

        .gallery-name-bar {
            background-color: #69bbf0;
            color: black;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container ">
    <div class="card">
  <div class="card-body" style="background-color:#69bbf0 ">
    <h2 class="text-center mb-2">Our Gallery</h2>
    <div class="text-center mb-2">
        <a href="main_gallery.php?status=S" class="btn btn-primary m-1">Group Photo</a>
        <a href="main_gallery.php?status=N" class="btn btn-success m-1">Event Photo</a>
        <a href="main_gallery.php?status=T" class="btn btn-secondary m-1">Our School</a>
        <a href="main_gallery.php" class="btn btn-dark m-1">Show All</a>
        <a href="https://.org" class="btn btn-danger m-1">Home</a>
    </div>

    
    <div class="row">
      
      <div class="col-md-4 mb-3">
        <!-- <img src="your-image-url.jpg" class="img-fluid rounded" alt="Gallery Image"> -->
      </div>
      
    </div>
    
  </div>
</div>


    

    <div class="row g-4">
        <?php
        $imgIndex = 0;
        if (!empty($gallery)):
            foreach ($gallery as $galleryName => $picLocs): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="image-hover-wrapper shadow-sm">
                        <img
                            src="<?= htmlspecialchars($picLocs[0]) ?>"
                            alt="<?= htmlspecialchars($galleryName) ?>"
                            class="image-fit preview-image"
                            data-index="<?= $imgIndex ?>"
                            data-gallery="<?= htmlspecialchars($galleryName) ?>"
                        />
                    </div>
                    <div class="mt-2 text-center fw-bold" style="color: black; background-color: #00e0ec; border-radius: 5px; padding: 10px;">
                        <?= htmlspecialchars($galleryName) ?>
                    </div>
                </div>
                <?php $imgIndex++; ?>
            <?php endforeach;
        else: ?>
            <div class="col-12 text-center text-danger">
                No gallery found for the selected slot.
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-secondary">
            <div class="modal-body position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
                <img id="modalImage" class="modal-img" src="" alt="Modal Image" />
                <div class="gallery-name-bar mt-3" id="galleryNameDisplay"></div>
                <div class="mt-3 text-center pb-4">
                    <button id="prevBtn" class="btn btn-outline-light me-2">Previous</button>
                    <button id="nextBtn" class="btn btn-outline-light">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const allImages = <?= json_encode($allImages) ?>;
    const imageToGallery = <?= json_encode($imageToGallery) ?>;
    let currentIndex = 0;

    function updateModalContent(index) {
        const modalImage = document.getElementById('modalImage');
        const galleryNameDisplay = document.getElementById('galleryNameDisplay');
        modalImage.src = allImages[index];
        galleryNameDisplay.textContent = imageToGallery[allImages[index]];
    }

    document.querySelectorAll('.preview-image').forEach(img => {
        img.addEventListener('click', function () {
            currentIndex = parseInt(this.getAttribute('data-index'));
            updateModalContent(currentIndex);
            new bootstrap.Modal(document.getElementById('imagePreviewModal')).show();
        });
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + allImages.length) % allImages.length;
        updateModalContent(currentIndex);
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % allImages.length;
        updateModalContent(currentIndex);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
