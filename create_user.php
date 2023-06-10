<?php
include 'config_db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$hash = $_POST['password'];
$role = $_POST['role'];
$options = [ 'cost' => 12 ];
$password = password_hash($hash, PASSWORD_BCRYPT, $options);
$sql = "INSERT INTO tb_users (name, email, password,date_create,role) VALUES ('$name', '$email', '$password',NOW(),'$role')";
$insert = mysqli_query($conn,$sql);
if($insert == TRUE){
    //berhasil create
    header("location:admin.php?message=success");
}else{
    //gagal create
    header("location:admin.php?message=failed");
}
?>