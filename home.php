<?php

session_start();

if (!isset($_SESSION['username'])) {
  header('location:landingPage.php');
}
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.sketchy.min.css">
  <title>Home</title>
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
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
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
    <div class="jumbotron">
      <h1 class="display-3">Hello,<?php echo $_SESSION['username'] ?></h1>
      <p class="lead">Great to Have you </p>
      <hr class="my-4">
      <p>Are you Ready to take a test ??</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="test.php" role="button">Take a Test</a>
      </p>
      <hr>
      <h3>Your progress Report :</h3>
      <br>

      <?php

      $con = mysqli_connect('localhost', 'root');
      if ($con) {
      } else {
        echo "no Conn";
      }
      mysqli_select_db($con, 'fiveQDaily');
      $q = "select progress from users where username ='$username'";
      $result = mysqli_query($con, $q);
      $element = $result->fetch_assoc();
      $arrayOfColours = array('success');
      $arrayOfProgress =  explode(",", $element['progress']);
      for ($i = 1; $i < count($arrayOfProgress); $i++) {
        if ($arrayOfProgress[$i] || $arrayOfProgress[$i] == 0) {
          echo ('<h4>Test #'), $i, (', You Schored '), $arrayOfProgress[$i], ('%</h4>');
          echo ('<div class="progress">  <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: '), $arrayOfProgress[$i], ('%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
  </div><br>');
        }
      }
      echo ("That's all folks ¯\_(ツ)_/¯")
      ?>
    </div>
  </div>

</body>

</html>