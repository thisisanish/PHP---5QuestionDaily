<?php
session_start();
$error = false;

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    session_destroy();
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.sketchy.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <br>
        <div class="jumbotron">
            <h1 class="display-3">5 Question Daily</h1>
            <p class="lead">Test your Progress</p>
            <hr class="my-4">
            <p>Graphical Analysis

            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">About</a>
            </p>
        </div>
        <div class="row">


            <p class="col-12 text-danger">
                <?php if ($error) {
                    echo ("<div class=' col-12 alert alert-dismissible alert-danger'>
                <button type='button' class='close' data-dismiss='alert'></button>
                <strong>Oh snap!</strong> <a href='#' class='alert-link'> $error </a> and submit again
              </div>");
                } else {
                }; ?></p>
            <div class="col-lg-6">
                <h2>Login</h2>
                <form action="auth/validation.php" method="POST">
                    <div class="form-group">
                        <label for="username"> username</label>
                        <input required type="text" name="user" placeholder="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password"> password</label>
                        <input required type="password" name="password" placeholder="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">
                        Log into Existing Account
                    </button>
                </form>
            </div>
            <div class="col-lg-6">
                <h2>Register</h2>
                <form action="auth/registration.php" method="POST">

                    <div class="form-group">
                        <label for="username"> username</label>
                        <input required type="text" name="user" placeholder="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password"> password</label>
                        <input required type="password" name="password" placeholder="password" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Create a new Account
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>