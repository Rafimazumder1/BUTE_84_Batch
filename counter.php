<?php
include 'connection.php';
$sql = "SELECT COUNT(*) AS TOT_MEM FROM NAA_EVENTS_REG where PAYMENT_STATUS='P' and event_code='01'";
$parse = ociparse($conn, $sql);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $tot_mem[] = $row;
}


$sql1 = "SELECT COUNT(*) AS EC_MEM FROM NAA_MEMBERS
WHERE MEM_MOBILE_NO NOT IN (
    SELECT MEM_MOBILE_NO FROM NAA_EVENTS_REG 
    WHERE PAYMENT_STATUS = 'P'
)";
$parse = ociparse($conn, $sql1);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $ex_com[] = $row;
}
// var_dump($ex_com);
// exit();

$sql2 = "SELECT COUNT(*) AS TOT_MEM FROM NAA_MEMBERS";
$parse = ociparse($conn, $sql2);
oci_execute($parse);

while ($row = oci_fetch_assoc($parse)) {
    $ac_com[] = $row;
}
?>

<div class="counter-area section-padding-top section-padding-bottom pt-0">
        <div class="container vov fade-in-up slow">
            <div class="counter-shado animated-card shadow-lg br-10" style="background-color: #c3f3f8">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="counter">
                            <div class="row g-0">
                                <div class="col-xl-3">
                                    <div class="counter-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="counter-content">
                                        <h5><span style="color: black ">Event Registration Member</span></h5>
                                        <p><?php echo $tot_mem[0]['TOT_MEM']  ?></p>
                                    </div>
                                    <!-- /.counter-content -->
                                </div>
                            </div>
                        </div>
                        <!-- /.counter -->
                    </div>
                    <div class="col-xl-4">
                        <div class="counter">
                            <div class="row g-0">
                                <div class="col-xl-3">
                                    <div class="counter-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="counter-content">
                                        <h5><span style="color: black ">Associate Member</span></h5>
                                        <p><?php echo $ex_com[0]['EC_MEM']  ?></p>
                                    </div>
                                    <!-- /.counter-content -->
                                </div>
                            </div>
                        </div>
                        <!-- /.counter -->
                    </div>
                    <div class="col-xl-4">
                        <div class="counter">
                            <div class="row g-0">
                                <div class="col-xl-3">
                                    <div class="counter-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="counter-content">
                                        <h5><span style="color: black ">Total Members</span></h5>
                                        <p><?php echo $ac_com[0]['TOT_MEM']  ?></p>
                                    </div>
                                    <!-- /.counter-content -->
                                </div>
                            </div>
                        </div>
                        <!-- /.counter -->
                    </div>
                </div>
            </div>
        </div>
    </div>