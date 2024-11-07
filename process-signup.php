<?php
// Collect form data
$name = $_POST["name"];
$email = $_POST["email"];

// Database connection details
$host = "localhost";
$dbname =  "climate_newsletter";
$username = "root";
$password = "";

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

// SQL query for inserting data
$sql = "INSERT INTO newsletters(name, email) VALUES(?, ?)";

// Prepare the SQL statement
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die("Error preparing the statement: " . mysqli_error($conn));
}

// Bind parameters to the SQL statement
mysqli_stmt_bind_param($stmt, "ss", $name, $email);

// Execute the query
if (!mysqli_stmt_execute($stmt)) {
    die("Error executing the statement: " . mysqli_stmt_error($stmt));
}

// Success message
echo "Data saved successfully!";

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
