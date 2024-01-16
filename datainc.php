<?php
include("connect.php");



// Initialize variables
$username = $email = $password = $age = $terms = '';
$usernameErr = $emailErr = $passwordErr = $ageErr = $termsErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
    }
    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = password_hash(test_input($_POST["password"]), PASSWORD_BCRYPT);
    }
// Validate age
    if (empty($_POST["age-range"])) {
        $ageErr = "Age is required";
    } else {
        $age =($_POST['age-range']);
    }

        // Validate terms checkbox
    if (!isset($_POST["terms"])) {
        $termsErr = "You must accept the terms and conditions";
     }

}
 $query = "INSERT INTO users(username,email, password,age)
 VALUES ('$username','$email', '$password','$age')";

 if(mysqli_query($connection,$query) == TRUE) {
   echo "New record created successfully";
 } else {
   echo "Error: " . $query . "<br>" . $connection->error;
 }
$connection->close();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>