<?php
/**
 * Created by PhpStorm.
 * User: DIU
 * Date: 1/9/2018
 * Time: 6:59 PM
 */

namespace App\classes;
use App\classes\Database;

class Category
{
public function addCategory($data){
    $sql="INSERT INTO `category`(`category_name`, `category_description`, `status`) VALUES ('$data[category_name]','$data[category_description]','$data[status]')";
    if(mysqli_query(Database::dbConnection(),$sql)){
        $message="Insert Successfully";
        return $message;

    }else{
        die("Query problem".mysqli_error(Database::dbConnection()));
    }
}
public function viewCategoryInfo(){
    $sql="SELECT * FROM `category`";
    if(mysqli_query(Database::dbConnection(),$sql)){
        $queryResult=mysqli_query(Database::dbConnection(),$sql);
        return $queryResult;
    }else{
        die("Query Problem".mysqli_error(Database::dbConnection()));
    }
}
    public function getCategoryInfo($id){
        $sql="SELECT * FROM category WHERE id=$id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $result=mysqli_query(Database::dbConnection(),$sql);
            return $result;
        }
        else{die('Query problem. '.mysqli_error(Database::dbConnection()));
        }
    }
    public function editCategoryInfo($data){
        $sql="UPDATE `category` SET `category_name`='$data[category_name]',`category_description`='$data[category_description]',`status`='$data[status]' WHERE id=$data[id]";
        if(mysqli_query(Database::dbConnection(),$sql)){
            header('Location: manage-category.php');
        }else{die('Query problem. '.mysqli_error(Database::dbConnection()));}
    }

    public function deleteCategoryInfo($id){
        $sql="DELETE FROM category WHERE id=$id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message="Delete Successfully";
            return $message;

        }else{
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }
}