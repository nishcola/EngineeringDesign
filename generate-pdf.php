<?php
session_start();

require __DIR__ . "/vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;

$host = "localhost";
$dbname = "engineering_design";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

$query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
$userID = $row[0];
$firstName = $row['first_name'];
$lastName = $row['last_name'];
$birthday = $row['birthday'];
$address = $row['user_address'];
$street = $row['street'];
$postalCode = $row['postal_code'];
$city = $row['city'];
$state = $row['user_state'];
$currentMedications = $row['current_medications'];
$currentConditions = $row['current_conditions'];
$healthcareProvider = $row['healthcare_provider'];

$spO2 = $_POST["blood-oxygen"];
$bpm = $_POST["bpm"];
$pm = $_POST["pm"];
$additionalComments = $_POST["additional-comments"];

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

$html = file_get_contents("template.html");
$html = str_replace("{{ blood-oxygen }}", $spO2, $html);
$html = str_replace("{{ additional-comments }}", $additionalComments, $html);
$html = str_replace("{{ bpm }}", $bpm, $html);
$html = str_replace("{{ pm }}", $pm, $html);
$html = str_replace("{{ first-name }}", strval($firstName), $html);
$html = str_replace("{{ last-name }}", strval($lastName), $html);
$html = str_replace("{{ birthday }}", strval($birthday), $html);
$html = str_replace("{{ address }}", strval($address), $html);
$html = str_replace("{{ street }}", strval($street), $html);
$html = str_replace("{{ postal-code }}", strval($postalCode), $html);
$html = str_replace("{{ city }}", strval($city), $html);
$html = str_replace("{{ state }}", strval($state), $html);
$html = str_replace("{{ current-medications }}", strval($currentMedications), $html);
$html = str_replace("{{ current-conditions }}", strval($currentConditions), $html);
$html = str_replace("{{ healthcare-provider }}", strval($healthcareProvider), $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");
$dompdf->render();
$dompdf->addInfo("Title", "Patient Report");
$dompdf->stream("patient-report.pdf", ["Attachment" => 0]);