<?php
include 'header.php';
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $country = $_POST['country'];
    $capital = $_POST['capital'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];

    // Insert the question into the database
    $query = "INSERT INTO question (Country, Capital, Option1, Option2, Option3)
              VALUES ('$country', '$capital', '$option1', '$option2', '$option3')";
    if ($conn->query($query)) {
        $success_message = "Question added successfully!";
    } else {
        $error_message = "Error adding question: " . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- ... (your head section) ... -->
</head>
<body>
    <div class="container">
        <h2>Add Question</h2>
        <?php if (isset($success_message)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php } elseif (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="capital">Capital:</label>
                <input type="text" class="form-control" id="capital" name="capital" required>
            </div>
            <div class="form-group">
                <label for="option1">Option 1:</label>
                <input type="text" class="form-control" id="option1" name="option1" required>
            </div>
            <div class="form-group">
                <label for="option2">Option 2:</label>
                <input type="text" class="form-control" id="option2" name="option2" required>
            </div>
            <div class="form-group">
                <label for="option3">Option 3:</label>
                <input type="text" class="form-control" id="option3" name="option3" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Question</button>
        </form>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>
