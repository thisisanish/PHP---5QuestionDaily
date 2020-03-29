<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:landingPage.php');
}

$qId = array("");
$questionText = array("");
$optionA = array("");
$optionB = array("");
$optionC = array("");
$optionD = array("");




$username = $_SESSION['username'];
$con = mysqli_connect('localhost', 'root');
if ($con) {
} else {
    echo "no Conn";
}
mysqli_select_db($con, 'fiveQDaily');

$qForSet = "select nextQid from users where username = '$username'";

$nextQ = mysqli_query($con, $qForSet);
while ($row = $nextQ->fetch_assoc()) {
    $startQid =  $row['nextQid'];
    $endQid = $startQid + 4;
}
$q = "select * from questions where qId between $startQid and $endQid";


$result = mysqli_query($con, $q);

// echo $result['questionText'];
while ($row = $result->fetch_assoc()) {
    array_push($qId, $row['qId']);
    array_push($questionText, $row['questionText']);
    array_push($optionA, $row['optionA']);
    array_push($optionB, $row['optionB']);
    array_push($optionC, $row['optionC']);
    array_push($optionD, $row['optionD']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.sketchy.min.css">
    <title>Test</title>
</head>

<body>

    <div class="container">
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="home.php">5 Question Daily</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="jumbotron">
            <legend> Here are your Questions....</legend>
            <form action="result.php" method="POST">
                <!--point of logic-->
                <?php

                for ($i = 1; $i <= 5; ++$i) {
                    echo $i;
                    echo ('
            
            <div class="card border-primary mb-3">
                <div class="card-header">
                    <legend>'), $qId[$i], '. ', $questionText[$i], ('</legend>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="'), $qId[$i], ('" id="'), $optionA[$i], ('" value="a">
                                '), $optionA[$i], ('
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="'), $qId[$i], ('" id="'), $optionA[$i], ('" value="b">
                                '), $optionB[$i], ('
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="'), $qId[$i], ('" id="'), $optionA[$i], ('" value="c">
                                '), $optionC[$i], ('
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="'), $qId[$i], ('" id="'), $optionA[$i], ('" value="d">
                                '), $optionD[$i], ('
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
            
            ');
                }

                ?>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>


    </div>


</body>

</html>