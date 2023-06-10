<?php
include 'config_db.php';
$id_user = $_GET['id'];
//check
$data = mysqli_query($conn,"select * from tb_users where id='$id_user'");
$check = mysqli_num_rows($data);
if ($check > 0) {
        $row = $data->fetch_assoc();
        if($_SESSION['email'] != $row['email']){
            $sql = "DELETE from tb_users where id = '$id_user'";
            $delete = mysqli_query($conn,$sql);
            if ($delete == TRUE) {
              header("location:admin.php?message=success_delete");
            }else{
              header("location:admin.php?message=failed_delete");
            }
      }else{
        header("location:admin.php?message=failed_delete");
      }
}else{
  header("location:admin.php?message=failed_delete");
}
?>
