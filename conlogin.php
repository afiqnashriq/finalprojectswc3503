<?php
    include_once('db.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $password = mysqli_real_escape_string($con, $_POST['password']);

      $sql = "SELECT * FROM patients where username = '$username'";

      $rekod = mysqli_query($con, $sql);
      $hasil = mysqli_num_rows($rekod);

      if($hasil < 1) {
        echo "<script>alert('Account is not in the database.'); window.history.go(-1);</script>";
        exit();
      } else {
        if( $row = mysqli_fetch_assoc($rekod)) {
          if($row["password"] != $password) {
            echo "<script>alert('ID or password is wrong'); window.history.go(-1);</script>";
            exit();
          } else {
            $_SESSION["id"] = $row["p_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["isLogin"] = true;
            $_SESSION["role"] = 'patient';

            echo "<script> alert ('Successfully Logged In!.');
            window.location.href='profile.php';
            </script>";
          }
        }
      }
    mysqli_close($con);
    }

?>