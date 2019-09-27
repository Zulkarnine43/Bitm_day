<?php
/**
 * Created by PhpStorm.
 * User: Shaon
 * Date: 28-Feb-19
 * Time: 7:02 PM
 */

namespace App\classes;


class Database
{
   // private $link;
public function dbConnection(){
    $hostName ="localhost";
    $userName ="root";
    $password =" ";
    $dbName ="blog";
    $link=mysqli_connect($hostName,$userName,$password,$dbName);
    return $link;
}
}