<?php
session_start();
$host = "localhost";
$dbname = "engineering_design";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$userID = $row[0];

if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($fileType != "pdf" || $_FILES["pdfFile"]["size"] > 5000000) {
        echo "Error: Only PDF files that are 5MB or lower can be uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["pdfFile"]["name"];
            $folder_path = $targetDir;
            $time_stamp = date('Y-m-d H:i:s');
            $sql = "INSERT INTO file_upload (filename, folder_path, time_stamp, belongs_to) VALUES ('$filename', '$folder_path', '$time_stamp', '$userID')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                alert('File uploaded successfully! Click OK to be redirected back.');
                setTimeout(function(){
                    window.location.href = 'index.php';
                }, 100);
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Report</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card square p-4">
                <h2 class="text-center">Upload Report</h2>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="pdfFile" class="form-label">Select a PDF File</label>
                            <input type="file" name="pdfFile" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Upload File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>