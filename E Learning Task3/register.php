<?php 
include 'connect.php';

if (isset($_POST['signup'])) {
    // Handle Sign Up
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // hash password

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Address Already exists!";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password) 
                        VALUES ('$firstName', '$lastName', '$email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            header('Location: index.php'); // Redirect to login
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['signIn'])) {
    // Handle Sign In
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // hash password

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header('Location: homepage.php'); // Redirect to homepage
        exit();
    } else {
        echo "Not found, Invalid Email or Password";
    }
}
?>
