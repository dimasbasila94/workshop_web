<?php
session_start();
include 'config_db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($conn,"select * from tb_users where email='$email'");
//check email terdaftar di database
$check_email = mysqli_num_rows($data);
if($check_email > 0){
    //jika email terdaftar
    $row = $data->fetch_assoc();
    $hash = $row['password'];
    if (password_verify($password, $hash)){
        //verify benar
        //buat session
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        $_SESSION['role'] = $row['role'];
        header("location:admin.php");
    }else{
        //tidak berhasil login
        header("location:login.php?message=failed");
    }
}else{
    //jika email tidak terdaftar
    header("location:login.php?message=failed");
}

?>