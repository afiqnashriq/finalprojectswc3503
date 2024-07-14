<?php

include ('db.php');


$query = "select * from patients";
$result = mysqli_query($con, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dr Bazilah Skin & Aesthetic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&family=Cormorant+Garamond:wght@300&family=Montserrat:wght@100&&family=Zen+Kaku+Gothic+New:wght@300&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

<body>
   

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
       <img src="img/logoo2.jpeg" height="90" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="admin.php" class="nav-item nav-link"> Schedule</a>
                <a href="doctor.php" class="nav-item nav-link">Doctors</a>
                  <a href="profile2.php" class="nav-item nav-link">Patients</a>
                 <a href="logout.php" class="nav-item nav-link">Log Out</a>
                    </div>
                </div>
        </div>
    </nav>
     <div class="container mt-5"> 
      <h2 class="mb-3 text-center">Patients Details</h2>
  <table class="table">
                  <thead>
                  <tr>
                    <th style="width: 5%" scope="col">No.</th>
                    <th style="width: 10%" scope="col">Username</th>
                    <th style="width: 10%" scope="col">Password</th>
                    <th style="width: 20%" scope="col">Name</th>
                    <th style="width: 20%" scope="col">Contact Number</th>
                    <th style="width: 30%" scope="col">Address</th>

                  </tr>

                  </thead>
                 
                  <tbody>
                  	
                  <?php 

                  $username = 0;
                  while($rows=mysqli_fetch_assoc($result)){ 
                  $username ++  
                    
                    ?>
                  <tr>
                    
                    <td><?php echo $rows['p_id']; ?></td>
                    <td><?php echo $rows['username']; ?></td>
                     <td><?php echo $rows['password']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td> <?php echo $rows['phoneno']; ?></td>
                    <td> <?php echo $rows['address']; ?> </td>
                   
                 
                  </tr>
                  <?php } ?> 
                  
                  </tbody>
           
                </table>
            </body>
            </html>