<?php


require 'db.php';

session_start();

$appointmentQuery = " SELECT appointment.a_id, appointment.date1, appointment.time1, services.s_name, services.price, doctor.d_name, patients.name
                      FROM  appointment 
                      INNER JOIN services ON services.s_id = appointment.s_id
                      INNER JOIN doctor ON doctor.d_id = appointment.d_id 
                      INNER JOIN patients ON patients.p_id = appointment.p_id
                      WHERE appointment.date1 >= NOW()";
$runAppointmentQuery = mysqli_query($con, $appointmentQuery);
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
      <h2 class="mb-3 text-center">Appointment Schedule</h2>
      <table class="table">
        <thead>
          <tr>
           
            <th style="width: 40%" scope="col">Name</th>
            <th style="width: 20%" scope="col">Service</th>
            <th style="width: 20%" scope="col">Doctor</th>
            <th style="width: 30%" scope="col">Date & Time</th>
            <th style="width: 30%" scope="col">Price</th>
            
          </tr>
        </thead>
        <tbody>
          <?php while($appointment = $runAppointmentQuery->fetch_assoc()) { ?>
          <tr>
         
              <td><?php echo $appointment['name']?></td>
            <td><?php echo $appointment['s_name']?></td>
            <td><?php echo $appointment['d_name']?></td>
            <td><?php echo $appointment['date1'] . " (" . date("h:i A", strtotime($appointment['time1'])) . ")"?></td>
             <td><?php echo $appointment['price']?></td>
            <td><a onclick='confirmationDelete(this);return false;' href="delete.php?a_id=<?php echo $appointment['a_id']; ?>">Delete</a></td>
<script>
  function confirmationDelete(anchor)
  {
    var conf=confirm('Are you sure you want to delete this record?');
    if(conf)
      window.location=anchor.attr("href");
  }

</script>
          </tr>
          <?php } ?> 
        </tbody>
      </table>
    </div>

</body>
</html>

