<?php
    session_start();
    $con = mysqli_connect('localhost','root');
    if($con){
        echo "connection success";
    }
    else{
        echo "no Conn";
    }
    $name = $_POST['user'];
    $pass = $_POST['password'];
  
    mysqli_select_db($con, 'fiveQDaily');

    $q = "select * from users where username = '$name'";

    $result = mysqli_query($con, $q);

    $num = mysqli_num_rows($result);

    echo $num;
    if($num >= 1){
        $_SESSION['error'] = "UserName Already Exists";
        header('location:../landingPage.php');
    }else{
        $q4Insert = "insert into users(username,password) values('$name','$pass')";
        mysqli_query($con, $q4Insert);
        $_SESSION['username'] = $name;
        header('location:../home.php');
        


    }
?>