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

    session_regenerate_id(true);

    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 'admin'){
        header("Location: ../frontend/admin_tr.php");
    } else {
        header("Location: ../frontend/index.php");
    }

    exit();

}
else{
    echo "Email atau password salah";
}
?>