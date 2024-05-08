<?php
$con = mysqli_connect("localhost", "root", "","cbms");
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "DELETE FROM `car` WHERE car_id = '$id'";
    $execute = mysqli_query($con,$query);

    header("location:admin.php");
    die();
}
?>