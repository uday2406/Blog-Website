<?php
include_once('user_header.php');
$user=$_SESSION['user'];
$qry="SELECT * FROM `users` WHERE `id`='$user'";
$result=mysqli_query($con,$qry);
$data=mysqli_fetch_assoc($result);
?>
    <h2 class="text-center">User Profile</h2>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <strong>Name:</strong>
                </div>
                <div class="col-sm-6">
                    <span><?php echo $data['name'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Mobile:</strong>
                </div>
                <div class="col-sm-6">
                    <span><?php echo $data['mobile'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Email:</strong>
                </div>
                <div class="col-sm-6">
                    <span><?php echo $data['email'] ?></span>
                </div>
            </div>
        </div>
    </div>
<?php
include_once('user_footer.php');
?>