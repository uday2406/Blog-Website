<?php
    include_once('admin_header.php');
?>

<div class="container mt-5">
<h2 class="text-center">Admin Dashboard</h2>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    <a href="UserList.php" class="btn btn-success btn-lg">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    <a href="UsersBlog.php" class="btn btn-secondary btn-lg">Users Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
        include_once('admin_footer.php');
       ?>