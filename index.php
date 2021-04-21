<?php
include_once('header.php');
include('conn.php');
?>
<div class="container mt-5">
    <div class="container-fluid">
        <?php 
    $qry="SELECT * FROM `blog` WHERE `b_status`='APPROVED'";
    $result=mysqli_query($con,$qry);
    while($data=mysqli_fetch_assoc($result))
    {
    ?>
        <div class="card mt-3" style="width: 65rem;">
            <img src="user/img/<?php echo $data['b_image'] ?>" class="card-img-top" width="110px" height="130px" alt="Blog-Img">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['b_title'] ?></h5>
                <span><i>Posted By- <?php echo $data['b_user'] ?></i></span>
                <p class="card-text"><?php echo $data['b_description'] ?></p>
                <a href="#" class="btn btn-primary">View More</a>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php
include_once('footer.php');
?>