<?php
include("config.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users
        (username, email, password_hash)
        VALUES
        ('$username', '$email', '$password')";

if(mysqli_query($db, $sql)){
    header("Location: login.php");
}
else{
    echo "Gagal daftar: " . mysqli_error($db);
}
?>