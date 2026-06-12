<?php
session_start();
include("config.php");

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query(
    $db,
    "SELECT * FROM users WHERE email='$email'"
);

$user = mysqli_fetch_assoc($query);

if($user && password_verify($password, $user['password_hash'])){

    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("Location: dashboard.php");
}
else{
    echo "Email atau password salah";
}
?>