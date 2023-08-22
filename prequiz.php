<?php
include'header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ready?</title>
  </head>
  <body> <br>
    <div class="container">
        <center><div class="card" style="width: 90%;">
            <center><img src="https://canopylab.com/wp-content/uploads/2020/05/Working-with-adaptive-quizzes-A-beginners-guide.jpg" class="card-img-top" alt="..." style="max-width:50%;"></center>
            <div class="card-body">
              <h5 class="card-title">Challenge Yourself with the Ultimate Quiz Experience</h5>
              <p class="card-text">Embark on a thrilling journey of knowledge and test your wits with our engaging quiz platform. Are you up for the challenge? Choose your level: Click the "Hard" button if you're ready to complete the quiz in 60 seconds, or opt for the "Easy" mode with 100 seconds to spare. Let the quest for knowledge begin!</p>
              <form action="start_test.php" method="post">
                <button type="submit" name="quiz_level" value=100 class="btn btn-success" style="width: 100%;">Level: EASY</button><br><br>
                <button type="submit" name="quiz_level" value=60 class="btn btn-danger" style="width: 100%;">Level: HARD</button>
            </form>
            </div>
          </div></center>
      </div><br><br><br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include'footer.php';
?>