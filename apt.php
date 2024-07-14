
<?php
include_once('db.php');
session_start();

if ( !isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] != true) {
  header("Location: login.php");
  die();
}

// $a_id = $_POST['a_id'];
$services = $_POST['services'];
$doctor = $_POST['doctor'];
$date1 = $_POST['date1'];
$time1 = date("H:i", strtotime($_POST['time1']));
$p_id = $_SESSION['id'];
if($services != '' && $doctor != '' && $date1 != '' && $time1 != ''){
    $sql = "INSERT INTO `appointment` (`p_id`,`s_id`, `d_id`, `date1`, `time1` ) 
    VALUES ('$p_id','$services', '$doctor', '$date1', '$time1');";

    $result = mysqli_query($con, $sql);
    echo "<script> alert ('Appointment Successfully Created!.');
    window.location.href='schedule.php';
    </script>";
}else{
    echo "<script> alert ('Appointment Not Successfully Created!.');
    window.location.href='user.php';
    </script>";
}

mysqli_close($con);
?>