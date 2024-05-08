<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" >
                        <!-- Customer Information -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control"  name="first_name" required>
                            </div>
                           <button type="submit" name="btnsub">sumbit</button>
                    </form>

</body>
</html>
<?php
$con = mysqli_connect("localhost","root","","newf");

if(isset($_POST["btnsub"])) {
    
    $first_name = $_POST["first_name"];

    
    

    $query="INSERT INTO `booking`(`FirstName`) VALUES ('$first_name')";
    // $booking_query = "INSERT INTO `booking`(`car_id`, `c_fname`, `c_lname`, `email`, `phone`, `pickup_date`, `return_date`, `select_car`, `total_cost`, `advance`, `balance`) VALUES ('$select_car','$first_name','$last_name','$email',' $phone','$pick_date','$return_date','$select_car','$total_cost','$advance','$balance')";
    
    
    mysqli_query($con,$query);
    // echo "<script>alert('Booking Submitted')</script>";
}
?>