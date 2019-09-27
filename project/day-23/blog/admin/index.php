<?php
require_once "../vendor/autoload.php";
$login =new App\classes\Login();

if(isset($_POST['btn'])){
    $login->adminLoginCheck($_POST);
    //echo '<pre>';
    //print_r($data);
}



?>






<!Doctype html>
<html>

<head>
    <meta charset="UTF-8" >
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
</head>
<body>
<div class="container " style="margin-top: 200px ">
    <div class="row">
        <div class="col-sm-6 mx-auto">

           <div class="card">
               <div class="card-title">
                   <p align="center"><i><b>Admin Pannel</b></i></p>

               </div>
               <div class="card-body">
                   <form action="" method="post">
                       <div class="form-group row">
                           <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                           <div class="col-sm-9">
                               <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                           </div>
                       </div>
                       <div class="form-group row">
                           <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                           <div class="col-sm-9">
                               <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                           </div>
                       </div>

                       <div class="form-group row">
                           <div class="col-sm-10">
                               <button type="submit" class="btn btn-success btn-block">Sign in</button>
                           </div>
                       </div>
                   </form>


               </div>
           </div>




        </div>
    </div>
</div>
</body>



</html>