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

if(isset($_POST['btn'])){
    $message=$category->addCategory($_POST);

}

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
                <div class="col-sm-8 mx-auto">
                    <div class="card">
                        <h4 class="text-success"><?php echo $message;?></h4>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="category_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="category_description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="status" value="1"> Published
                                        <input type="radio" name="status" value="0"> Unpublished
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>
                                    </div>
                                </div>
                            </form>
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