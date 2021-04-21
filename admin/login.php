<?php
include_once('../conn.php');
session_start();
if(isset($_SESSION['admin']))
{
    header('location:dashboard.php');
}
else if(isset($_SESSION['user']))
{
    header('location:../user/dashboard.php');
}
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blogs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About US</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../user/login.php">User Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Admin Login</a>
                    </li>
                </ul>
                <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
            </div>
        </div>
    </nav>
    <h3 class="text-center">Admin Login</h3>
    <div class="container mt-5">
        <div class="container-fluid">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" ="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                </div>
                <button type="submit" name ="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <?php
include_once('admin_footer.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $qry="SELECT * FROM `admin` WHERE `user_name`='$username' AND `password`='$password'";
    $result=mysqli_query($con,$qry);
    $row=mysqli_num_rows($result);
    if($row<1)
    {
        echo "<script>alert('Invalid Username or Password!!!'); window.open('login.php',_self);</script>";

    }
    else
    {
        $data=mysqli_fetch_assoc($result);
        $_SESSION['admin']=$data['id'];
        header('location:Dashboard.php');
        ob_end_flush();
    }
}
?>