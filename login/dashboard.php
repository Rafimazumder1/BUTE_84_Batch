<?php include 'head.php'?>


<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #69bbf0;">

            <!-- Sidebar - Brand -->
            <a class="text-center" href="">
                <div class="sidebar-brand-icon ">
                <img class="  mt-2"
                     src="../uploads/logo.jpeg"  alt="" height="80px" width="80px">
                </div>
                <div class="sidebar-brand-text mt-2">
                    <p style="font-weight: bold;font-size: 14px;color: white;">
                    Bandhan-84 BUTE,Dhaka
                    </p>
                    
                </div>
            </a>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider my-0"> -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="report_list.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            
           <!-- <?php 
           if($main[0]['ADM_STATUS'] == '' ) {
            ?>

           <li class="nav-item">
                <a class="nav-link" href="Mem_edit.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Edit Profile</span></a>
            </li> -->


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>IET</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <a class="collapse-item" href="committe.php">Committe</a> -->
                        <!-- <a class="collapse-item" href="all_member.php">All Member</a> -->
                        <!-- <a class="collapse-item" href="pending_member.php">Pending Member</a> -->
                        <a class="collapse-item" href="report_list.php">Member Details</a>
                        <a class="collapse-item" href="slider_upload.php">Slider</a>
                        <a class="collapse-item" href="notice.php">Notice</a>
                        <!-- <a class="collapse-item" href="Proceed_add.php">Proceedings</a> -->
                        <a class="collapse-item" href="gallery_add.php">Gallery</a>
                        <a class="collapse-item" href="scroll.php">Scroll</a>
                    </div>
                </div>
            </li>

            <?php
           }
           ?>


      <!-- <?php 
           if($main[0]['ADM_STATUS'] == 'M' ) {
            ?>

           <li class="nav-item">
                <a class="nav-link" href="Mem_edit.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Edit Profile</span></a>
            </li>


            

            <?php
           }
           ?> -->

<!-- 
           <li class="nav-item">
                <a class="nav-link" href="change_password.php">
                    <i class="fas fa-book-reader"></i>
                    <span>Change Password</span></a>
            </li> -->
            


            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Member</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="member_list.php">Member List</a>
                    </div>
                </div>
            </li> -->


            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ec Applicant</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ec_nomination.php">Ec Applicant List</a>
                    </div>
                </div>
            </li> -->


           

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>SWHAA Donation</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="donate_list.php">Donation List</a>
                    </div>
                </div>
            </li> -->

            

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


           

            

            

          

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>


        




        
        <?php include 'script.php'?>