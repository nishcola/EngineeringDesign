<?php

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least eight characters in length.");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least a single letter.");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least a single number.");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user(username, email, password_hash, first_name, last_name, birthday, user_address, street, postal_code, city, user_state, current_medications, current_conditions, healthcare_provider) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssssssisssss",

$_POST["username"], 
$_POST["email"], 
$password_hash, 
$_POST["firstName"], 
$_POST["lastName"], 
$_POST["birthday"], 
$_POST["address"], 
$_POST["street"], 
$_POST["postalCode"], 
$_POST["city"], 
$_POST["state"], 
$_POST["currentMedications"], 
$_POST["currentConditions"], 
$_POST["healthcareProvider"]

);

if ($stmt->execute()) {
    header("Location: signup-success.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already in use!");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
//print_r($_POST);
//var_dump($password_hash);