<?php
include 'header.php';
include 'connection.php';

$query = "SELECT * FROM question";

$result = $conn->query($query);

// Store the retrieved data in an array
$questions = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options = array($row['Option1'], $row['Option2'], $row['Option3'], $row['Capital']);
        shuffle($options);
        $row['shuffledOptions'] = $options;
        $questions[] = $row;
    }
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Quiz</title>
</head>
<body><br>
    <center><h2>Conducting the Ultimate Quiz</h2></center><br>
    <div class="container">
        <p id="timer">Time: <span id="countdown"><?php echo $_POST["quiz_level"]; ?></span> seconds</p>
        <br><br>

        <form method="post" action="reporting.php">
        <input type="hidden" name="total_time" value="<?php echo $_POST["quiz_level"]; ?>">
    <input type="hidden" name="remaining_time" value="" id="remaining_time">
            <?php foreach ($questions as $question) { ?>
                <div class="mb-4">
                    <h4>Question <?php echo $question['id']; ?>: Capital of <?php echo $question['Country']; ?>?</h4>
                    <div class="form-group">
                        <label for="answer_<?php echo $question['id']; ?>">Select your answer:</label>
                        <select class="form-control" name="answer_<?php echo $question['id']; ?>">
                            <?php foreach ($question['shuffledOptions'] as $option) { ?>
                                <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php } ?>

            <center>
                <button class="btn btn-success" style="width: 80%;" type="submit">SUBMIT</button>
            </center>
        </form>
    </div>

    <br><br><br>
    <script>
    var countdownElement = document.getElementById("countdown");
    var countdownValue = parseInt(countdownElement.textContent);

    // Update the countdown timer every second
    var countdownInterval = setInterval(function() {
        if (countdownValue > 0) {
            countdownValue--;
            countdownElement.textContent = countdownValue;
            document.getElementById("remaining_time").value = countdownValue;
        } else {
            clearInterval(countdownInterval);
            countdownElement.textContent = "0";
            document.getElementById("remaining_time").value = "0";
        }
    }, 1000);
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'footer.php';
?>
