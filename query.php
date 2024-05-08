<?php
include("include/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected car name from the form
    $selectedCarName = $_POST['select_car'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $pick_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    
    $total_cost = $_POST['total_cost'];
    $advance = $_POST['advance'];
    $balance = $_POST['balance'];
    // Query to get the car ID based on the selected name
    $getCarIdQuery = "SELECT id FROM car WHERE car_name = '$selectedCarName'";
    $result = mysqli_query($con,$getCarIdQuery);

   $row = mysqli_fetch_assoc($result);

        // Check if a row was found
        if ($row !== null) {
            // Get the car ID
            $carId = $row['id'];

            // Insert into the booking table
            $insertBookingQuery = "INSERT INTO `booking`(`car_id`, `c_fname`, `c_lname`, `email`, `phone`, `pickup_date`, `return_date`, `select_car`, `total_cost`, `advance`, `balance`) VALUES ('$select_car','$first_name','$last_name','$email',' $phone','$pick_date','$return_date','$select_car','$total_cost','$advance','$balance')";
            $stmt = mysqli_query($con,$insertBookingQuery);

            
           
            

            echo "Booking successful!";
        } else {
            echo "Error: Car ID not found.";
        }
    

    // Close the connection
    $con->close();
}
?>