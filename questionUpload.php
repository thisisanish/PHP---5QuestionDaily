<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location:landingPage.php');
    }
    $username = $_SESSION['username'];
    
    $con = mysqli_connect('localhost','root');
    if($con){
        echo "connection success";
    }
    else{
        echo "no Conn";
    }
    $questionText = $_POST['questionText'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];
    $optionD = $_POST['optionD'];
    $answer = $_POST['answer'];
    // $questionCreator = $_POST['questionCreator'];
    $questionCreator = $username;
    

    echo $_POST;
   
   
    mysqli_select_db($con, 'fiveQDaily');

    $q = "insert into questions (questionCreator, questionText, optionA, optionB, optionC, optionD, answer) values('$questionCreator', '$questionText', '$optionA', '$optionB','$optionC', '$optionD', '$answer')";

    $result = mysqli_query($con, $q);
    header('location:question.php');
?>