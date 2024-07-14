<?php
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die('Sambungan kepada Pangkalan Data Gagal' . mysqli_connect_error());
    }
    mysqli_select_db($con, "skinaesthetic");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input using htmlspecialchars
        $uname = htmlspecialchars(trim($_POST['uname']), ENT_QUOTES, 'UTF-8');
        $pass = htmlspecialchars(trim($_POST['pass']), ENT_QUOTES, 'UTF-8');

        $sql = "SELECT * FROM admin WHERE uname = '$uname'";
        $rekod = mysqli_query($con, $sql);
        $hasil = mysqli_num_rows($rekod);

        if ($hasil < 1) {
            echo "<script>alert('Account is not in the database.'); window.history.go(-1);</script>";
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($rekod)) {
                if ($row["pass"] != $pass) {
                    echo "<script>alert('Username or password is wrong'); window.history.go(-1);</script>";
                    exit();
                } else {
                    $_SESSION["uname"] = $row["uname"];

                    echo "<script> alert ('Successfully Logged In!.');
                    window.location.href='admin.php';
                    </script>";
                }
            }
        }
        mysqli_close($con);
    }
?>
