<?php
session_start();
$con = mysqli_connect('localhost', 'root');
if ($con) {
    echo "connection success";
} else {
    echo "no Conn";
}
$name = $_POST['user'];
$pass = $_POST['password'];


mysqli_select_db($con, 'fiveQDaily');

$q = "select * from users where username = '$name' && password ='$pass'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);
echo $num;

if ($num == 1) {

    echo "exists";
    // Exists
    $_SESSION['username'] = $name;
    header('location:../home.php');
} else {
    $num = 0;
    $_SESSION['error'] = "Please Check your Username or Password";
    header('location:../landingPage.php');
}
