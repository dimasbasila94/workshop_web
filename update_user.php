<?php
include 'config_db.php';
$id_user = $_POST['id_user'];
$name = $_POST['name'];
$email = $_POST['email'];
$hash = $_POST['password'];
$role = $_POST['role'];

$data = mysqli_query($conn,"select * from tb_users where id='$id_user'");
$check = mysqli_num_rows($data);
if ($check > 0) {
    $row = $data->fetch_assoc();
    if($hash != null) {
        $options = [ 'cost' => 12 ];
        $password = password_hash($hash, PASSWORD_BCRYPT, $options);
    }else{
      $password = $row['password'];
    }
      $sql = "UPDATE tb_users set name = '$name', email = '$email', password='$password', role ='$role' where id='$id_user'";
      $update = mysqli_query($conn,$sql);
      if ($update == TRUE) {
        header("location:admin.php?message=success_edit");
      }else{
        header("location:admin.php?message=failed_edit");
      }
}else{
  header("location:admin.php?message=failed_edit");
}

?>
