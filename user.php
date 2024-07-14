<?php

require 'db.php';

session_start();

if ( !isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] != true) {
  header("Location: login.php");
  die();
}

$doctorQuery = "SELECT * FROM doctor";
$servicesQuery = "SELECT * FROM services";
$runServicesQuery = mysqli_query($con, $servicesQuery);
$runDoctorQuery = mysqli_query($con, $doctorQuery);

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


</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

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
                   <a href="user.php" class="nav-item nav-link"> Appointment</a>
                     <a href="schedule.php" class="nav-item nav-link">Schedule</a>
                      <a href="services.php" class="nav-item nav-link">Services</a>
                      <a href="profile.php" class="nav-item nav-link">Profile</a>
                 <a href="logout.php" class="nav-item nav-link">Log Out</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Appointment Start -->
    <div class="container mt-5"> 
        <h2 class="mb-3 text-center">Meet Our Experience Doctors</h2>
        <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
			<h1 class="text-white mb-4">Make Appointment</h1>
			<form action="apt.php" method="post">
				<div class="row g-3">
					<div class="col-12 col-sm-6">
						<select name="services" id="services" class="form-select bg-light border-0" style="height: 55px;">
							<option value="" selected>Select A Service</option>
                            <?php while($services = $runServicesQuery->fetch_assoc()) { ?>
							<option value="<?php echo $services['s_id']?>"><?php echo $services['s_name']?></option>
                            <?php } ?>
						</select>
                    </div>
					<div class="col-12 col-sm-6">
						<select name="doctor" id="doctor" class="form-select bg-light border-0" style="height: 55px;">
							<option value="" selected>Select Doctor</option>
							<?php while($doctor = $runDoctorQuery->fetch_assoc()) { ?>
							<option value="<?php echo $doctor['d_id']?>"><?php echo $doctor['d_name']?></option>
                            <?php } ?>
                       </select>
                    </div>
                            
					<div class="col-12 col-sm-6">
						<div class="date" name="date1" data-target-input="nearest" style="position: relative">
							<input name="date1" type="text" class="form-control bg-light border-0 datetimepicker-input date" placeholder="Appointment Date" data-target="date1" data-toggle="datetimepicker" style="height: 55px;">
                        </div>
                    </div>

					<div class="col-12 col-sm-6">
						<div class="time" id="time1" name="time1" data-target-input="nearest" style="position: relative">
							<input  name="time1" type="text" class="form-control bg-light border-0 datetimepicker-input time" placeholder="Appointment Time" data-target="time1" data-toggle="datetimepicker" style="height: 55px;">
                        </div>
					</div>
					<div class="col-12">
						<button class="btn btn-dark w-100 py-3" type="submit"  onclick = "if (! confirm('Confirm to book this appointment?')) { return false; }">Make Appointment</button>
					</div>
				</div>
            </form>
        </div>
    </div>
     
    <!-- Appointment End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>