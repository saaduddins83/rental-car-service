<?php
include('include/connection.php');

if (isset($_POST["btnregister"])) {
    if (isset($_POST["email"]) && isset($_POST["email"])) {
        # code...
    }
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $role = $_POST["role"];
        
    if($password === $cpassword && $role == "admin"){
        $query = "INSERT INTO `admin-table`( `a_fname`, `a_lname`, `a_email`, `a_password`) VALUES
                                           ('$fname','$lname','$email','$password')";
        mysqli_query($con,$query);
        header("Location: index.php");
    }
    elseif($password === $cpassword && $role == "employee"){
        $query = "INSERT INTO `employee-table`(`e_fname`, `e_lname`, `e_email`, `e_password`) VALUES
                                             ('$fname','$lname','$email','$password')";
        mysqli_query($con,$query);
        header("Location: index.php");
    }
    else{
        echo "<script>alert('Password does not match!');
       </script>"; 
    }
   
}
?>