<?php
namespace App\classes;

use App\classes\Database;

class Application
{
    public function getAllPublishedBlogInfo() {
        $sql = "SELECT * FROM blog WHERE status = 1 ";
        if(mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
}