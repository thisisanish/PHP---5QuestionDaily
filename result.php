<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.sketchy.min.css">
    <title>Result</title>
</head>

<body>
    <div class="container">
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">5 Question Daily</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test.php">Take a Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="question.php">Upload Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>


        <?php

        session_start();


        if (!isset($_SESSION['username'])) {
            header('location:landingPage.php');
        }

        $qId = array();
        $answer = array();
        $userAnswer = array();
        $progress = array();


        $prog;
        $startQid;
        $endQid;
        $nextQid;

        $score = 0;


        $username = $_SESSION['username'];
        $con = mysqli_connect('localhost', 'root');
        if ($con) {
            echo "connection success";
        } else {
            echo "no Conn";
        }
        mysqli_select_db($con, 'fiveQDaily');

        $qForSet = "select nextQid,progress from users where username = '$username'";

        $nextQ = mysqli_query($con, $qForSet);
        while ($row = $nextQ->fetch_assoc()) {
            $prog = $row['progress'];
            $startQid =  $row['nextQid'];
            $endQid = $startQid + 4;
            $nextQid = $endQid + 1;
        }
        echo $prog;
        $progress = explode(" ", $prog);

        $q = "select * from questions where qId between $startQid and $endQid";

        $result = mysqli_query($con, $q);

        // echo $result['questionText'];
        while ($row = $result->fetch_assoc()) {

            array_push($answer, $row['answer']);
        }


        for ($i = $startQid; $i <= $endQid; $i++) {
            array_push($userAnswer, $_POST[strval($i)]);
        }


        for ($i = 0; $i < 5; $i++) {
            if ($userAnswer[$i] == $answer[$i]) {
                $score += 1;
            }
        }

        array_push($progress, $score * 20);
        $prog = implode(" ", $progress);


        echo ('<div class="center    card text-white bg-secondary mb-3" style="max-width: 100%rem;">
<div class="card-header">So, you scored ..</div>
<div class="card-body">
  <h4 class="card-title">'), $score * 20, ('</h4>
  <p class="card-text">Your Answers were '), implode(" ", $userAnswer), ('</p>
  <p class="card-text">Correct Answers were '), implode(" ", $answer), ('</p>
</div>
</div>');


        $qChangeNextQId = "Update users Set nextQid = '$nextQid', progress ='$prog'  where username = '$username'";


        $result = mysqli_query($con, $qChangeNextQId);

        ?>
    </div>
</body>

</html>