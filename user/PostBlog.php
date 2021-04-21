<?php include_once('user_header.php');
$user=$_SESSION['user'];
$qry="SELECT * FROM `users` WHERE `id`='$user'";
$run=mysqli_query($con,$qry);
$data=mysqli_fetch_assoc($run);
?>
<h2 class="text-center">Post Your Blogs</h2>
<div class="container">
    <div class="container-fluid">
        <form action="PostBlog.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Blog Title</label>
                <input type="text" name="title" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Blog Description</label>
                <!-- <input type="text" name="desc" required class="form-control" id="exampleInputPassword1"> -->
                <textarea name="desc" id="" class="form-control" cols="30" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Blog Image</label>
                <input class="form-control" required name="img" type="file" id="formFile">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php include_once('user_footer.php'); 
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $user_name=$data['name'];
    // echo "<pre>";   
    // print_r($_FILES['img']);
    // echo "</pre>";
    $img_name=$_FILES['img']['name'];
    $img_size=$_FILES['img']['size'];
    $tmp_name=$_FILES['img']['tmp_name'];
    $folder="img/".$img_name;
    move_uploaded_file($tmp_name,$folder);
    $qry="INSERT INTO `blog`(`b_title`, `b_description`, `b_image`, `b_user`, `b_status`) VALUES ('$title','$desc','$img_name','$user_name','PENDING')";
    $result=mysqli_query($con,$qry);
    if($result==true)
    {
        echo "<script>alert('Your blog has forwarded to Admin for Approval'); window.open('Dashboard.php','_self');</script>";
    }
    else
    {
        echo "<script>alert('Your blog could not be forwarded')</script>";
    }
}
?>