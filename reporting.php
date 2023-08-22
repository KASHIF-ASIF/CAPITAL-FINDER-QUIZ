<?php
include 'header.php';
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the submitted form data
    $submittedAnswers = $_POST;
    
    // Retrieve the total time and remaining time
    $totalTime = intval($_POST['total_time']);
    $remainingTime = isset($_POST['remaining_time']) ? intval($_POST['remaining_time']) : 0;

    // Retrieve the correct answers from the database
    $query = "SELECT id, Capital FROM question";
    $result = $conn->query($query);

    $correctAnswers = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $correctAnswers[$row['id']] = $row['Capital'];
        }
    } else {
        echo "No results found.";
    }

    // Calculate the total number of questions and correct answers
    $totalQuestions = count($submittedAnswers);
    $correctCount = 0;

    foreach ($submittedAnswers as $questionId => $submittedAnswer) {
        // Extract the question ID from the form field name
        $id = substr($questionId, strlen('answer_'));

        try {
            $correctAnswer = isset($correctAnswers[$id]) ? $correctAnswers[$id] : null;
            if ($correctAnswer !== null && $submittedAnswer === $correctAnswer) {
                $correctCount++;
            }
        } catch (Exception $e) {
            // Handle any exceptions here if needed
        }
    }

    // Calculate the percentage of correct answers
    $percentageCorrect = ($correctCount / $totalQuestions) * 100;
    
    // Calculate the final score using a formula
    $finalScore = ($correctCount / $totalQuestions) * ($remainingTime / $totalTime) * 100;

    // Update highscore and scoretype in the user table
    $userId = $_SESSION['user_id'];
    $updateQuery = "";
    if ($finalScore >= 100) {
        $updateQuery = "UPDATE user SET highscore = $finalScore, scoretype = 'hard' WHERE id = $userId";
    } elseif ($finalScore >= 60) {
        $updateQuery = "UPDATE user SET highscore = $finalScore, scoretype = 'easy' WHERE id = $userId";
    } else {
        $updateQuery = "UPDATE user SET highscore = $finalScore WHERE id = $userId";
    }
    
    $conn->query($updateQuery);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Quiz Reporting</title>
</head>
<body>
    <div class="container">
        <br>
        <center><h2>Quiz Reporting</h2></center>
        <hr>
        <br><br>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
            <p>Total Questions: <?php echo $totalQuestions; ?></p>
            <p>Correct Answers: <?php echo $correctCount; ?></p>
            <p>Percentage Correct: <?php echo round($percentageCorrect, 2); ?>%</p>
            <p>Total Time: <?php echo $totalTime; ?> seconds</p>
            <p>Remaining Time: <?php echo $remainingTime; ?> seconds</p>
            <p>Final Score: <?php echo round($finalScore, 2); ?></p>
        <?php } else { ?>
            <p>No form data submitted.</p>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'footer.php';
?>
