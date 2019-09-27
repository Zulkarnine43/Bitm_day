<?php
$message='';
session_start();
if($_SESSION['id'] == null) {
    header('Location: index.php');
}

require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$category=new App\classes\Category();


if(isset($_GET['logout'])) {
    $login->adminLogout();
}

if (isset($_GET['delete'])){
    $id=$_GET['id'];
    $message=$category->deleteCategoryInfo($id);
}

$queryResult=$category->viewCategoryInfo();
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
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($data=mysqli_fetch_assoc($queryResult)) {?>
                        <tr>
                            <th scope="row"><?php echo $data['id']?></th>
                            <td><?php echo $data['category_name']?></td>
                            <td><?php echo $data['category_description']?></td>
                            <td><?php echo $data['status']?></td>
                            <td>
                                <a href="categoryEdit.php?id=<?php echo $data['id']?>">Edit</a>
                                <a href="?delete=true&id=<?php echo $data['id']?>" onclick="return confirm('Are you sure delete this !!');">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
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