<?php
include("config.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users
        (username, email, password_hash, role)
        VALUES
        ('$username', '$email', '$password', 'user')";

if(mysqli_query($db, $sql)){
    header("Location: login.php");
}
else{
    echo "Gagal daftar: " . mysqli_error($db);
}
?>