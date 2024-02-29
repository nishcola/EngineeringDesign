<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <?php if (isset($_SESSION["user_id"])): ?>
                <span class="navbar-brand mb-0 h1">Welcome, <?= htmlspecialchars($user["username"]) ?></span>
            <?php else: ?>
                <span class="navbar-brand mb-0 h1">You are not logged in. <a href="login.php">Log in</a> or <a
                        href="signup.html">sign up.</a></span>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="mb-3">Report History</h2>
        <hr>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="col-4">Patient Name</th>
                    <th class="col-6">Date Taken</th>
                    <th class="col-2">View Report</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
            </tbody>
        </table>
        <a href="new-report.html" target="_blank"><button class="btn btn-primary">Create New</button></a>
        <?php if (isset($_SESSION["user_id"])): ?>
            <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
        <?php endif; ?>
    </div>
</body>

</html>