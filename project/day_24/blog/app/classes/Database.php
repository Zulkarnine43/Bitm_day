<?php
namespace App\classes;
class Database
{
    public function dbConnection() {
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "blog";
        $link = mysqli_connect('localhost','root','','blog2');
        return $link;
    }
}
?>