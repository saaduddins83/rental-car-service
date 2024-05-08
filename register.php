<?php
include('include/header.php');
include('include/connection.php');
?>
<style>
    select.custom-select {
  border-radius: 5px;
}
a{ 
            text-decoration: none; 
        }
</style>
<body class="bg-gradient-primary">
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                   
                    <form method="post" class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="fname" class="form-control form-control-user" 
                                    placeholder="First Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="lname" class="form-control form-control-user" 
                                    placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" 
                                placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user"
                                     placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="cpassword" class="form-control form-control-user"
                                     placeholder="Repeat Password">
                            </div>
                        </div>
                        <div class="form-group" >
                        <select name="role" class="custom-select">
                            <option selected>Choose...</option>
                            <option value="admin">Admin</option>
                            <option value="employee">Employee</option>
                        </select>
                        </div>
                        <input href="login.php" type="submit" value="Register Account" class="btn btn-primary btn-user btn-block" Name="btnregister">
                            
                        </input>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>
                    <hr>
                    <!-- <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div> -->
                    <div class="text-center">
                        <a class="small" href="login.php">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php
include('include/scripts.php');



if (isset($_POST["btnregister"])) {
 
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password =  $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $role = $_POST["role"];
        
    if($password === $cpassword){
        $query = "INSERT INTO `role`( `fname`, `lname`, `email`, `pass`,`role`) VALUES
                                           ('$fname','$lname','$email','$password','$role')";
                                           mysqli_query($con,$query);
                                           echo "<script>Location.assign('index.php')</script>";
    }

    // if($password === $cpassword && $role == "admin"){
    //     $epassword = $password;
    //     $query = "INSERT INTO `admin-table`( `a_fname`, `a_lname`, `a_email`, `a_password`,`role`) VALUES
    //                                        ('$fname','$lname','$email','$epassword','$role')";
    //     mysqli_query($con,$query);
    //     echo "<script>Location.assign('index.php')</script>";
    // }
    // elseif($password === $cpassword && $role == "employee"){
    //     $epassword = md5($password);
    //     $query = "INSERT INTO `employee-table`(`e_fname`, `e_lname`, `e_email`, `e_password`,`role`) VALUES
    //                                          ('$fname','$lname','$email','$epassword','$role')";
    //     mysqli_query($con,$query);
    //     echo "<script>Location.assign('index.php')</script>";
    // }
    else{
        echo "<script>alert('Password does not match!');
       </script>"; 
    }
   
}
?>