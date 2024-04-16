<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Simulation</title>
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
                <span class="navbar-brand mb-0 h1">Welcome,
                    <?= htmlspecialchars($username) ?>
                </span>
            <?php else: ?>
                <span class="navbar-brand mb-0 h1">You are not logged in. <a href="login.php">Log in</a> or <a
                        href="signup.html">sign up.</a></span>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="mb-3">Data History</h2>
        <hr>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="col-3">Blood Oxygen (SpO2)</th>
                    <th class="col-3">BPM</th>
                    <th class="col-3">PM 2.5</th>
                    <th class="col-3">Report</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <form method="post" action="generate-pdf.php">
                    <td><input type="hidden" class="form-control" id="blood-oxygen" name="blood-oxygen" value="98.73">98.73</td>
                    <td><input type="hidden" class="form-control" id="bpm" name="bpm" value="89">89</td>
                    <td><input type="hidden" class="form-control" id="pm" name="pm" value="12.2">12.2</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </form>
                </tr>
                <tr>
                <form method="post" action="generate-pdf.php">
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td>Test</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </form>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td>Test</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td>Test</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>1/01/2000</td>
                    <td>Test</td>
                    <td><button class="btn btn-primary">View Report</button></td>
                </tr>
            </tbody>
        </table>
        <?php if (isset($_SESSION["user_id"])): ?>
            <a href="new-report.html" target="_blank"><button class="btn btn-primary">Create New</button></a>
            <a href="upload-report.php"><button class="btn btn-secondary">Upload Report</button></a>
            <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
        <?php endif; ?>
    </div>
</body>
</html>