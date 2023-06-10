<!doctype html>
<?php
session_start();
//cek apakah sudah login
if($_SESSION['status']!="login"){
	header("location:login.php");
}

include 'config_db.php';
$id_user = $_GET['id'];
//check
$data = mysqli_query($conn,"select * from tb_users where id='$id_user'");
$check = mysqli_num_rows($data);
if ($check > 0) {
   $row = $data->fetch_assoc();
}else{
  header("location:admin.php");
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Edit User</title>
  </head>
  <body>
    <div class="container w-50">
      <div class="card mt-5">
          <div class="card-header">
            Edit User
          </div>
          <div class="card-body">
            <form action = "update_user.php" method="POST">
              <div class="form-group">
                <input type="hidden" class="form-control" name = "id_user" value="<?= $row['id'];?>">
                <label class="col-form-label">Name:</label>
                <input type="text" class="form-control" name = "name" value="<?= $row['name'];?>">
              </div>
              <div class="form-group">
                <label  class="col-form-label">Email</label>
                <input type="email" class="form-control" name = "email" value="<?= $row['email'];?>">
              </div>
              <div class="form-group">
                <label  class="col-form-label">Password</label>
                <input type="password" class="form-control" name = "password">
              </div>
              <div class="form-group">
                <label  class="col-form-label">Role: <?= $row['role'];?></label>
                <select class="form-control" name ="role">
                  <option >--- Choose a role ---</option>
                  <option value="su">Admin</option>
                  <option value="usr">User</option>
                </select>
              </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
