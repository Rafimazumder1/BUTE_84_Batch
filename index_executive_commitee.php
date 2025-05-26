<?php

include 'connection.php';
error_reporting(0);
$sql = "SELECT * FROM EC_COMMITT_NAME ORDER BY POS_TYPE_CODE ASC";
$parse = ociparse($conn, $sql);
oci_execute($parse);

// print_r($sql);
while ($row = oci_fetch_assoc($parse)) {
    $user_row[] = $row;
}

// var_dump($user_row);
// exit();
// echo count($division);
oci_free_statement($parse);



?>


<!-- service start -->
<section class="service-area pt-50 animatedParent animateOnce">
    <div class="container">

        <div class="section-title" style="margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-12  text-center">
                    <!-- <h2>Our dOCTORS</h2>
                        <div class="line-border-center bg-defult"></div> -->

                    <div class="section-header text-center mb-4">
                        <h2 style="color: #ac1f25;">Our Executive Committe</h2>
                    </div>

                </div>


            </div>
        </div>

        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-carousel-two">
                        <?php

for ($i = 0; $i < count($user_row); $i++) {
    
     foreach ($user_row5[$i] as $key => $data) {
                                if ($key === 'MEM_PHOTO') {
                                    if (is_object($data) && get_class($data) === 'OCI-Lob') {
                                        // Read binary data from CLOB
                                        $lob = oci_new_descriptor($conn, OCI_D_LOB);
                                        oci_lob_read($data, $lob);
                                        $abc[$key] = base64_encode($lob->load());
                                        $lob->free();
                                    } else {
                                        // Handle other types or strings here
                                        $abc[$key] = is_object($data) ? $data->load() : $data;
                                    }
                                } else {
                                    $abc[$key] = $data;
                                }
                            }


?>




                        <div class="item blog-item style-1">
                            <div class="blog-date text-center">
                                <a href="ex_mem_details.php?id=<?php echo $user_row[$i]['POS_ID'] ?>"><i
                                        class="fa fa-link"></i></a>
                            </div>
                            <div class="team-item-2 blog-img">
                                <a href="ex_mem_details.php?id=<?php echo $user_row5[$i]['POS_ID'] ?>">
                                    <img src="./uploads/committee_photo/default_profile_pic.png" alt="">
                                    <!-- <img src="data:image/jpeg;base64,<?php echo $abc['MEM_PHOTO']; ?>" alt=""> -->
                                </a>
                                <div class="team-content">
                                    <h5><?php echo $user_row[$i]['NAME'] ?></h5>
                                    <h6><?php echo $user_row[$i]['POSITION'] ?></h6>
                                    <p><?php echo $user_row[$i]['EMAIL'] ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>







                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- service end -->


<!-- jQuery -->
<!-- <script type="text/javascript" src="./UI/FrontEnd/js/jquery.min.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="./UI/FrontEnd/js/bootstrap.min.js"></script>

<!-- all plugins and JavaScript -->
<script type="text/javascript" src="./UI/FrontEnd/js/owl.carousel.min.js"></script>

<!-- Main Custom JS -->
<script type="text/javascript" src="./UI/FrontEnd/js/script.js"></script>