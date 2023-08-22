<?php include 'header.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Leader Board</title>
</head>
<body>
<br>
<div class="container">
    <center><h3>LEADER BOARD</h3></center><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Score</th>
                <th>Score Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connection.php';

            // Retrieve leaderboard data from the user table in descending order of highscore
            $query = "SELECT id, username, email, highscore, scoretype FROM user ORDER BY highscore DESC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $sno = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sno . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['highscore'] . '</td>';
                    echo '<td>' . $row['scoretype'] . '</td>';
                    echo '</tr>';
                    $sno++;
                }
            } else {
                echo '<tr><td colspan="5">No leaderboard data available.</td></tr>';
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<br><br><br>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php include 'footer.php'; ?>
