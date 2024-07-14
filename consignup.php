
<?php
$con= mysqli_connect("localhost" , "root", "");
if (!$con)
{
    die('Sambungan kepada Pangkalan Data Gagal'.mysqli_connect_error());
}
mysqli_select_db($con, "skinaesthetic");

$username = $_POST['username'];
$name = $_POST['name'];
$phoneno = $_POST['phoneno'];
$address = $_POST['address'];
$password = $_POST['password'];

$sql = "INSERT INTO `patients` (`username`, `password`, `name`, `phoneno`, `address`) 
VALUES ('$username', '$password', '$name', '$phoneno', '$address');";
print $sql;

$result = mysqli_query($con, $sql);
echo "<script> alert ('Data Successfully Inserted.');
            window.location.href='login.php';
            </script>";
mysqli_close($con);
?>