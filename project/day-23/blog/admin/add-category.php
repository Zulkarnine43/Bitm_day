
<!Doctype html>
<html>

<head>
    <meta charset="UTF-8" >
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="dashboard.php"/>
    <link rel="stylesheet" href="manage-category.php"/>
</head>
<body>
<div class="container " style="margin-top: 200px ">
    <div class="row">
        <div class="col-sm-6 mx-auto">

            <div class="card">
                <div class="card-title">
                    <p align="center"><i><b>Category</b></i></p>

                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Name" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Description" placeholder="Category Description">
                            </div>
                        </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Publication Status</label>
                    <div class="col-sm-9">
                        <input type="radio" class="form-control"  name="status" value="published">published
                        <input type="radio" class="form-control"  name="status" value="Unpublished" >Unpublished
                    </div>
                </div>


                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success btn-block">Save Category Info</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>




        </div>
    </div>
</div>
<script src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>



</html>