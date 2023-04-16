<?php

include('includes/connection.php');


session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

?>



<body>

    <?php
    include('includes/admin_header.php'); ?>

    <!-- admin dashboard section starts  -->

    <section class="dashboard">

        <h1 class="title">Dashboard</h1>

        <div class="box-container">

        <div class="box">
            <?php 
            $select_categories = mysqli_query($con, "SELECT * FROM `category`") or die('query failed');
            $number_of_categories = mysqli_num_rows($select_categories);
         ?>
         <h3><?php echo $number_of_categories; ?></h3>

                <p> Categories</p>
            </div>
            <div class="box">
            <?php 
            $select_subcategories = mysqli_query($con, "SELECT * FROM `subcategory`") or die('query failed');
            $number_of_subcategories = mysqli_num_rows($select_subcategories);
         ?>
         <h3><?php echo $number_of_subcategories; ?></h3>

                <p> Sub Categories</p>
            </div>
        
        

            <div class="box">
            <?php 
            $select_brands = mysqli_query($con, "SELECT * FROM `brand`") or die('query failed');
            $number_of_brands = mysqli_num_rows($select_brands);
         ?>
         <h3><?php echo $number_of_brands; ?></h3>

                <p> Brands</p>
            </div>
            <div class="box">
            <?php 
            $select_distributors = mysqli_query($con, "SELECT * FROM `distributor`") or die('query failed');
            $number_of_distributors = mysqli_num_rows($select_distributors);
         ?>
         <h3><?php echo $number_of_distributors; ?></h3>

                <p> Distributors</p>
            </div>

            <div class="box">
            <?php 
            $select_assets = mysqli_query($con, "SELECT * FROM `assets` WHERE status = '1'") or die('query failed');
            $number_of_assets = mysqli_num_rows($select_assets);
         ?>
         <h3><?php echo $number_of_assets; ?></h3>

                <p>Total assets</p>
            </div>

            <div class="box">
            <?php 
            $select_assets = mysqli_query($con, "SELECT * FROM `assets` WHERE status = '0'") or die('query failed');
            $number_of_assets = mysqli_num_rows($select_assets);
         ?>
         <h3><?php echo $number_of_assets; ?></h3>

                <p>Assets not in use</p>
            </div>


            <div class="box">
            <?php 
            $select_admins = mysqli_query($con, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>

                <p>Admin Users</p>
            </div>
        
        </div>
    </section>

    <!-- admin dashboard section ends -->


    <!-- custom admin js file link  -->
    <script src="js/admin_script.js"></script>
   

</body>
<?php include('includes/footer.php');?>

</html>