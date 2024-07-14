<?php

require 'db.php';

$con = mysqli_connect("localhost","root","");
if (!$con)
{
  die('Sambungan kepada pangkalan data gagal'.mysqli_connect_error());
}
mysqli_select_db($con,"skinaesthetic");

	$a_id=$_GET['a_id'];
	
	mysqli_query($con,"DELETE FROM `appointment` WHERE a_id='$a_id'");
    echo "<script> alert ('Successfully Deleted ');
    window.location.href='admin.php';
    </script>";
?>