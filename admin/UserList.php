<?php include_once('admin_header.php'); ?>
<h2 class="text-center">View Users</h2>
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email Id</th>
                <th scope="col">Mobile No.</th>
            
            </tr>
        </thead>
        <tbody>
        <?php 
            $qry="SELECT * FROM `users`";
            $result=mysqli_query($con,$qry);
            while($data=mysqli_fetch_assoc($result))
            {
        ?>
            <tr>
                <th scope="row"><?php echo $data['id'] ?></th>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['mobile'] ?></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
</div>
<?php include_once('admin_footer.php'); ?>