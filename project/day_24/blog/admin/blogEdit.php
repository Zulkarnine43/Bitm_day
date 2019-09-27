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

$queryResult2 = $blog->getAllPublishedCategoryInfo();

$id=$_GET['id'];
$queryResult=$blog->getBlogInfo($id);
$data=mysqli_fetch_assoc($queryResult);

if(isset($_POST['btn'])){
    $blog->updateBlogInfo($_POST);
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
                    <form action="" method="POST" name="editBlogForm" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                    <option>---Select Category Name---</option>
                                    <?php while ( $category = mysqli_fetch_assoc($queryResult2)) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control" value="<?php echo $data['blog_title']?>"/>
                                <input type="hidden" name="blog_id" class="form-control" value="<?php echo $data['id']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description"><?php echo $data['short_description']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control textarea" name="long_description"><?php echo $data['long_description']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*"/>
                                <img src="<?php  echo $data['blog_image']; ?>" alt="" height="50" width="50"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="1" <?php if ($data['status'] == '1') echo "checked";?>> Published
                                <input type="radio" name="status" value="0" <?php if ($data['status'] == '0') echo "checked";?>> Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Blog Info</button>
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
<script src="../assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'.textarea' });</script>
<script src="../assets/js/bootstrap.min.js"></script>
<script>
    document.forms['editBlogForm'].elements['category_id'].value='<?php echo $data['category_id']; ?>';
</script>
</body>
</html>