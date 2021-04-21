<?php include_once('admin_header.php'); ?>
<h2 class="text-center">Users Blogs</h2>
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Blog Description</th>
                <th scope="col">Blog Image</th>
                <th scope="col">User</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            $qry="SELECT * FROM `blog`";
            $result=mysqli_query($con,$qry);
            while($data=mysqli_fetch_assoc($result))
            {
        ?>
            <tr>
                <th scope="row"><?php echo $data['id'] ?></th>
                <td><?php echo $data['b_title'] ?></td>
                <td><?php echo $data['b_description'] ?></td>
                <td><img src="../user/img/<?php echo $data['b_image'] ?>" width="120px" height="120px" alt="Blog Img">
                </td>
                <td><?php echo $data['b_user'] ?></td>
                <?php
                if($data['b_status']=='PENDING')
                {
                ?>
                <td>
                    <form action="UsersBlog.php" method="post">
                        <input type="hidden" value="<?php echo $data['id'] ?>" name="id"><button type="submit"
                            name="approve" class="btn btn-success">Approve</button>
                        <button type="submit" name="disapprove" class="btn btn-danger">Disapprove</button>
                    </form>
                </td>
            <?php } 
            else if($data['b_status']=='APPROVED')
            {
                echo "<td>APPROVED</td>";
            }
            else
            {
                echo "<td>DISAPPROVED</td>";
            }
            ?> 
            </tr>
                <?php }?>
        </tbody>
    </table>
</div>
<?php include_once('admin_footer.php');
if(isset($_POST['approve']))
{
    $id=$_POST['id'];
    $qry1="UPDATE `blog` SET `b_status`='APPROVED' WHERE `id`='$id'";
    $run=mysqli_query($con,$qry1);
    if($run==true)
    {
        echo "<script>alert('Blog $id approved successfully!!'); window.open('UsersBlog.php','_self');</script>";
    }
}
else if(isset($_POST['disapprove']))
{
    $id2=$_POST['id'];
    $qry2="UPDATE `blog` SET `b_status`='DISAPPROVED' WHERE `id`='$id2'";
    $run2=mysqli_query($con,$qry2);
    if($run2==true)
    {
        echo "<script>alert('Blog $id2 disapproved successfully!!'); window.open('UsersBlog.php','_self');</script>";
    }
}
?>