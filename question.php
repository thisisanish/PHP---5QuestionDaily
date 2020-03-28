<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Upload</title>
    <link rel="stylesheet" href="css/bootstrap.sketchy.min.css">
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
        <div class="col-lg-12">
            <h2>Add Question to the Question Bank</h2>
            <form action="questionUpload.php" method="POST">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="questionText"> Question ?</label>
                        <input required type="text" name="questionText" placeholder="questionText" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="optionA">Option A</label>
                        <input required type="text" name="optionA" placeholder="option A" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="option">Option B</label>
                        <input required type="text" name="optionB" placeholder="option B" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="option">Option C</label>
                        <input required type="text" name="optionC" placeholder="option C" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="option"> Option D</label>
                        <input required type="text" name="optionD" placeholder="option D" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="option"> Answer</label>
                        <select name="answer" required id="answer">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">
                        Add to the Question Bank
                    </button>


                </div>



            </form>
        </div>
    </div>

</body>

</html>