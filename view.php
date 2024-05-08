<?php
session_start();
include('include/connection.php');
$q = "SELECT * FROM `role` WHERE email = '$_SESSION[email]'";
$re = mysqli_query($con, $q);
$r = mysqli_fetch_assoc($re);
if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href = "login.php";</script>';
} elseif (isset($_SESSION['email']) && $_session['role'] = $r['role']) {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $imagequery = "SELECT * FROM `car` WHERE car_id='$id'";
        $result = mysqli_query($con, $imagequery);
        $show = mysqli_fetch_assoc($result);
    }
    include('include/header.php');
?>



    <?php
    include('include/sidebar.php');
    ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">



            <?php
            include('include/navbar-top.php');
            ?>


            <!-- Begin Page Content -->
            <div class="container-fluid h-100">
                <div class="row">
                    <div class="col-md-2 mb-4">
                    <a href="<?php if($_SESSION['role']=='admin'){echo 'admin.php';}else{echo 'employee.php';}?>" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Back</span>
                        
                    </a>
                    </div>
                </div>
                <div class="col-md-19"></div>
                <div class="row">
                    <?php

                    $filenamesString = $show["image"];
                    $filenamesArray = explode(' || ', $filenamesString);

                    foreach ($filenamesArray as $filename) {
                        echo '<div class="col-md-3">
                 <div class="card mb-5" style="width: 18rem;">
                     <img class="card-img-top" height="225px" width="225px"  src="./img/' . $filename . '" alt="Card image cap">
                     <div class="card-body">
                         <h5 class="card-title">' . $show["car_name"] . '</h5>
                         <p class="card-text">' . $show["car_brand"] . '</p>
                         <p class="card-text">' . $show["car_model"] . '</p>
                         <a href="#" class="btn btn-primary">Add Booking</a>
                     </div>
                 </div>
             </div>';
                    }

                    ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <?php
            include('include/footer.php'); ?>
        </div>
        <!-- End of Page Wrapper -->

    <?php
    include('include/scripts.php');
}
    ?>