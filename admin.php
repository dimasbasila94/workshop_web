<?php
session_start();

if($_SESSION['status']!="login"){
	header("location:login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Users <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Content</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

    </ul>
  </div>
</nav>
<div class="container mt-3">
      <h1>Users Management</h1>
      <div class="mt-2">
        <?php
            if(isset($_GET['message'])){
              if($_GET['message'] == "failed"){
                echo "<label>Failed create user</label>";
              }else if($_GET['message'] == "success"){
                echo "<label>Success create user</label>";
              }else if($_GET['message'] == "success_delete"){
                echo "<label>Success delete user</label>";
              }else if($_GET['message'] == "failed_delete"){
                echo "<label>Failed delete user</label>";
              }else if($_GET['message'] == "failed_edit"){
                echo "<label>Failed edit user</label>";
              }else if($_GET['message'] == "success_edit"){
                echo "<label>Success edit user</label>";
              }
            }
        ?>
      <br>
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">Create</button>
      <table id="tabel-data">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date Create</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'config_db.php';
            $users = mysqli_query($conn,"select * from tb_users");
            while($row = mysqli_fetch_array($users))
            {
                echo '<tr>
                <td>'.$row['name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['role'].'</td>
                <td>'.$row['date_create'].'</td>';
                if($_SESSION['email'] == $row['email']){
                    echo '<td><a href="#" type="button" class="btn btn-danger disabled" disabled>Delete</a></td>';
                }else{
                    echo '<td><a href="delete_user.php?id='.$row['id'].'" type="button" class="btn btn-danger">Delete</a> <a href="edit_user.php?id='.$row['id'].'" type="button" class="btn btn-success">Edit</a></td>';
                }
            echo'</tr>';
            }
        ?>
        </tbody>
    </table>
	</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable();
      });
    </script>
  </body>
</html>