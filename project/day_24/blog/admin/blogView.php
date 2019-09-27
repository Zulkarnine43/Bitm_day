<?php
$message='';
session_start();
if($_SESSION['id'] == null) {
    header('Location: index.php');
}

require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$blog=new App\classes\Blog();


if(isset($_GET['logout'])) {
    $login->adminLogout();
}

if (isset($_GET['delete'])){
    $id=$_GET['id'];
    $message=$blog->deleteBlogInfo($id);
}

$id = $_GET['id'];
$queryResult=$blog->getBlogInfo($id);
$blogInfo = mysqli_fetch_assoc($queryResult);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php include 'includes/menu.php'; ?>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                         <tr>
                             <th>Blog Id</th>
                             <td><?php echo $blogInfo['id']; ?></td>
                         </tr>
                        <tr>
                            <th>Blog Blog Title</th>
                            <td><?php echo $blogInfo['blog_title']; ?></td>
                        </tr>
                        <tr>
                            <th>Category ID</th>
                            <td><?php echo $blogInfo['category_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Short Description</th>
                            <td><?php echo $blogInfo['short_description']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Long Description</th>
                            <td><?php echo $blogInfo['long_description']; ?></td>
                        </tr>
                        <tr>
                            <th>Blog Image</th>
                            <td><img src="<?php echo $blogInfo['blog_image']; ?>" alt="" height="200" width="250"/></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td><?php echo $blogInfo['status'] == 1 ? 'Published' : 'Unpublished' ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="../assets/js/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>