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
    <div class="container mt-4">
        <h2 class="mb-3">Data History</h2>
        <hr>
        <table class="table table-hover table-bordered" id="myTable">
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
                        <td><input type="hidden" class="form-control" id="pm" name="pm" value="12.2"><input type="hidden" class="form-control" id="additional-comments" name="additional-comments" value="None">12.2</td>
                        <td><button class="btn btn-primary" type="submit">View Report</button></td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="generate-pdf.php">
                        <td><input type="hidden" class="form-control" id="blood-oxygen" name="blood-oxygen" value="99.12">99.12</td>
                        <td><input type="hidden" class="form-control" id="bpm" name="bpm" value="97">97</td>
                        <td><input type="hidden" class="form-control" id="pm" name="pm" value="11.5"><input type="hidden" class="form-control" id="additional-comments" name="additional-comments" value="None">11.5</td>
                        <td><button class="btn btn-primary" type="submit">View Report</button></td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="generate-pdf.php">
                        <td><input type="hidden" class="form-control" id="blood-oxygen" name="blood-oxygen" value="97.64">97.64</td>
                        <td><input type="hidden" class="form-control" id="bpm" name="bpm" value="103">103</td>
                        <td><input type="hidden" class="form-control" id="pm" name="pm" value="9.4"><input type="hidden" class="form-control" id="additional-comments" name="additional-comments" value="None">9.4</td>
                        <td><button class="btn btn-primary" type="submit">View Report</button></td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="generate-pdf.php">
                        <td><input type="hidden" class="form-control" id="blood-oxygen" name="blood-oxygen" value="98.73">96.1</td>
                        <td><input type="hidden" class="form-control" id="bpm" name="bpm" value="89">94</td>
                        <td><input type="hidden" class="form-control" id="pm" name="pm" value="12.2"><input type="hidden" class="form-control" id="additional-comments" name="additional-comments" value="None">15.7</td>
                        <td><button class="btn btn-primary" type="submit">View Report</button></td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="generate-pdf.php">
                        <td><input type="hidden" class="form-control" id="blood-oxygen" name="blood-oxygen" value="98.73">98.73</td>
                        <td><input type="hidden" class="form-control" id="bpm" name="bpm" value="89">104</td>
                        <td><input type="hidden" class="form-control" id="pm" name="pm" value="12.2"><input type="hidden" class="form-control" id="additional-comments" name="additional-comments" value="None">7.934</td>
                        <td><button class="btn btn-primary" type="submit">View Report</button></td>
                    </form>
                </tr>
            </tbody>
        </table>
        <?php if (isset($_SESSION["user_id"])): ?>
            <a href="new-report.html" target="_blank"><button class="btn btn-primary">Create New</button></a>
            <a href="upload-report.php"><button class="btn btn-secondary">Upload Report</button></a>
            <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
        <?php endif; ?>
    </div>
    <script>
        var table = document.getElementById("myTable");
        addrows();
        function addrows(){
            for(var i = 0; i < 50; i++) {
                setTimeout(() => {
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);

                cell1.innerHTML = Math.floor(Math.random() * 6) + 94
                cell2.innerHTML = Math.floor(Math.random() * 6) + 101
                cell3.innerHTML = Math.floor(Math.random() * 6) + 4
                cell4.innerHTML = '<button class="btn btn-primary" type="submit">View Report</button>';
                }, i * 1000); // Change 1000 to the desired delay in milliseconds
            }
        };
    </script>
</body>
</html>