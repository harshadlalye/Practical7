<?php
// Set up variables to store user information
$name = "";
$dob = "";
$userID = "";
$password = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values submitted by the user
    $name = test_input($_POST["name"]);
    $dob = test_input($_POST["dob"]);
    $userID = test_input($_POST["userID"]);
    $password = test_input($_POST["password"]);

    // Save the user's information in a cookie
    setcookie("userID", $userID, time() + (86400 * 30), "/"); // Cookie will last for 30 days
    setcookie("password", $password, time() + (86400 * 30), "/"); // Cookie will last for 30 days

    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}

// Define a function to validate user input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>