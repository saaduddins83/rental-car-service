<?php
session_start();
include('include/header.php');
include('include/connection.php');

if(!isset($_SESSION['email'])){
    echo '<script>window.location.href = "login.php";</script>';
}elseif (isset($_SESSION['email']) && $_session['role'] = 'admin') {
    $query = "SELECT * FROM `car`";
    $result = mysqli_query($con, $query);}
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
    <div class="container-fluid">

       
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align:center;">ALL CARS</h1>
                    </div>
                </div>
                
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Car Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $n = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <td><?php echo $n ?></td>
                                <td><?php echo $row["car_name"] ?></td>
                                <td><?php echo $row["car_brand"] ?></td>
                                <td><?php echo $row["car_model"] ?></td>
                                <td><?php echo $row["car_status"] ?></td>
                                <td><?php echo $row["image"] ?></td>
                             
                        </tr>
                    <?php
                                ($row["car_id"] >= 1) ? ($n++) : ($n = 1);
                            }
                    ?>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align:center;">ALL BOOKINGS</h1>
                    </div>
                </div>
                
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Booking Number</th>
                            <th scope="col">Car Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $booking_query = "SELECT * FROM `booking`";
                            $booking_result = mysqli_query($con,$booking_query);
                            $n = 1;
                            while ($row = mysqli_fetch_assoc($booking_result)) {
                            ?>
                                <td><?php echo $n ?></td>
                                <td><?php echo $row["booking_id"] ?></td>
                                <td><?php echo $row["car_brand"] ?></td>
                                <td><?php echo $row["car_model"] ?></td>
                                <td><?php echo $row["car_status"] ?></td>
                                <td><?php echo $row["image"] ?></td>
                             
                        </tr>
                    <?php
                                ($row["car_id"] >= 1) ? ($n++) : ($n = 1);
                            }
                    ?>
                    </tbody>
                </table>

         
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<?php
include('include/footer.php');?>
    </div>
    <!-- End of Page Wrapper -->

<?php
include('include/scripts.php');

?>