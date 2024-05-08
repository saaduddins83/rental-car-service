<?php

session_start();
include('include/header.php');
include('include/connection.php');
// $q = "SELECT * FROM `role` WHERE email = '$_SESSION[email]'";
// $re = mysqli_query($con,$q);
// $r = mysqli_fetch_assoc($re);
if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href = "login.php";</script>';
} elseif (isset($_SESSION['email']) && $_session['role'] = 'admin') {
    $query = "SELECT * FROM `car`";
    $result = mysqli_query($con, $query);
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
                        <h1 style="text-align:center;">ALL DATA VIEW</h1>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2 mb-3 d-flex justify-content-center"><a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addCar">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Add Car</span>
                        </a>
                    </div>
                    <div class="col-md-2 mb-3 d-flex justify-content-center"><a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addBooking">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Add Booking</span>
                        </a>
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
                            <th scope="col">Action</th>

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
                                <td class="d-flex justify-content-center">
                                    <div class="m-2">
                                        <a href="view.php?id=<?php echo $row["car_id"]; ?>"><input type="submit" value="View" class="btn btn-success"></a>
                                    </div>
                                    <div class="m-2">
                                        <a href="delete.php?id=<?php echo $row["car_id"]; ?>"><input type="submit" value="Delete" class="btn btn-danger"></a>
                                    </div>
                                </td>
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
        <div class="modal fade" id="addCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a Car</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" class="user" enctype="multipart/form-data">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="car_name">Car Name</label>
                                <input type="text" name="car_name" class="form-control " placeholder="Enter Car Name">
                            </div>
                            <div class="form-group">
                                <label for="car_brand">Car Brand</label>
                                <input type="text" name="car_brand" class="form-control " placeholder="Enter Car Brand">
                            </div>
                            <div class="form-group">
                                <label for="car_model">Car Model</label>
                                <input type="text" name="car_model" class="form-control " placeholder="Enter Car Model">
                            </div>
                            <div class="form-group">
                                <label for="car_model">Car Status</label>
                                <select name="car_status" class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                    <option value="Booked">Booked</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="car_model">Upload Image</label>
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a href="login.php"><input class="btn btn-primary" type="submit" Name="btnaddcar" value="Submit"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="modal fade" id="addBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Booking</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <!-- Customer Information -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number:</label>
                                    <input type="tel" class="form-control" name="phone_number" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pickup_date">Pickup Date and Time:</label>
                                    <input type="datetime-local" class="form-control" id="pickup_date" name="pickup_date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="return_date">Return Date and Time:</label>
                                    <input type="datetime-local" class="form-control" id="return_date" name="return_date" required>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label for="booking_status">Select Car:</label>

                                    <select class="form-control" name="select_car" required>
                                        <option value="" selected disabled>Choose..</option>


                                        <?php
                                        $sql = "SELECT DISTINCT car_name FROM car";
                                        $select_res = mysqli_query($con, $sql);
                                        while ($show = mysqli_fetch_assoc($select_res)) {
                                            $carName = $show["car_name"];
                                            echo '<option value="' . $carName . '">' . $carName . '</option>';
                                        }

                                        ?>
                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="return_location">Total Cost:</label>
                                    <input type="text" value="" class="form-control" id="total_cost" name="total_cost" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="return_location">Advance:</label>
                                    <input type="text" class="form-control" id="advance" name="advance" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="return_location">Remaining Balance:</label>
                                    <input type="text" value="" class="form-control" id="balance" name="balance" readonly>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a href="#" class="btn btn-secondary ">
                            <span class="icon text-white-50">
                            </span>
                            <span class="text">Update</span>
                        </a>

                        <input class="btn btn-primary" type="submit" Name="btnaddbooking" value="Submit">

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include('include/footer.php'); ?>
    </div>
    <!-- End of Page Wrapper -->
    <script>
        function calculateCost() {
            var pickupDate = new Date(document.getElementById('pickup_date').value);
            var returnDate = new Date(document.getElementById('return_date').value);

            var timeDifference = returnDate.getTime() - pickupDate.getTime();
            var daysDifference = timeDifference / (1000 * 3600 * 24);

            var costPerDay = 5000;
            var totalCost = daysDifference * costPerDay;

            document.getElementById('total_cost').value = totalCost;

            var advanceAmount = parseFloat(document.getElementById('advance').value) || 0;

            var remainingBalance = totalCost - advanceAmount;

            document.getElementById('balance').value = remainingBalance;
        }

        function setMinReturnDate() {
           
            var pickupDate = new Date(document.getElementById('pickup_date').value);

            
            var minReturnDate = new Date(pickupDate);
            minReturnDate.setDate(minReturnDate.getDate() + 1);

            
            var minReturnDateString = minReturnDate.toISOString().slice(0, 16);

            
            document.getElementById('return_date').min = minReturnDateString;
        }

        // Add an event listener to the pickup date field
        document.getElementById('pickup_date').addEventListener('change', setMinReturnDate);
        document.getElementById('pickup_date').addEventListener('change', calculateCost);
        document.getElementById('return_date').addEventListener('change', calculateCost);
        document.getElementById('advance').addEventListener('input', calculateCost);
    </script>






<?php
    include 'include/scripts.php';

    if(isset($_POST["btnaddcar"])) {
        $car_name = $_POST["car_name"];
        $car_brand = $_POST["car_brand"];
        $car_model = $_POST["car_model"];
        $car_status = $_POST["car_status"];

        $countfiles = count($_FILES['image']['name']);
        $filenamelist =  $_FILES['image']['name'];

        $totalFileUploaded = 0;
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['image']['name'][$i];
            $tmpimage = $_FILES['image']['tmp_name'][$i];

            $location = "img/" . $filename;
            $extension = pathinfo($location, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $valid_extensions = array("jpg", "jpeg", "png");

            if (in_array(strtolower($extension), $valid_extensions)) {

                if (move_uploaded_file($tmpimage, $location)) {
                    $totalFileUploaded++;
                }
            }
        }
        echo "Total File uploaded : " . $totalFileUploaded;
        $filenamelistPrint = implode(" || ", $filenamelist);
        $query = "INSERT INTO `car`( `car_name`, `car_brand`, `car_model`,`car_status`, `image`) VALUES ('$car_name','$car_brand','$car_model','$car_status','$filenamelistPrint')";
        mysqli_query($con, $query);
        echo '<script>window.location.href = "admin.php";</script>';
    }




    if (isset($_POST["btnaddbooking"])) {


        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone_number"];
        $pick_date = $_POST["pickup_date"];
        $return_date = $_POST["return_date"];
        $select_car = $_POST["select_car"];
        $total_cost = $_POST["total_cost"];
        $advance = $_POST["advance"];
        $balance = $_POST["balance"];


        $booking_query = "INSERT INTO `booking`(`car_id`, `c_fname`, `c_lname`, `email`, `phone`, `pickup_date`, `return_date`, `select_car`, `total_cost`, `advance`, `balance`) VALUES ('$select_car','$first_name','$last_name','$email',' $phone','$pick_date','$return_date','$select_car','$total_cost','$advance','$balance')";


        mysqli_query($con, $booking_query);
        // echo "<script>alert('Booking Submitted')</script>";
    }

    // $vars = array_keys(get_defined_vars());
    // foreach ($vars as $var) {
    //     unset(${"$var"});
    // }
}
// else{echo "<script>alert('user logged out');
//     window.location.href = 'login.php';</script>";}

?>