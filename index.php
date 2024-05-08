<?php
session_start();
include('include/header.php');

if(!isset($_SESSION['email'])){
    echo '<script>window.location.href = "login.php";</script>';
}
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

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

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