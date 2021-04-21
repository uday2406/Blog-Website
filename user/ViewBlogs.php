<?php
include_once('user_header.php');
?>
<h2 class="text-center">View Blogs</h2>
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Blog Description</th>
                <th scope="col">Blog Image</th>
                <th scope="col">Status</th>
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
                <td><img src="img/<?php echo $data['b_image'] ?>" width="120px" height="120px" alt="Blog Img"></td>
                <td><?php echo $data['b_status'] ?></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>
<?php
include_once('user_footer.php');
?>