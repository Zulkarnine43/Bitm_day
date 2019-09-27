<?php
/**
 * Created by PhpStorm.
 * User: Shaon
 * Date: 28-Feb-19
 * Time: 5:29 PM
 */

namespace App\classes;
use App\classes\Database;

class Login
{
    public function adminLoginCheck($data)
    {
        ////echo '<pre>';
        //print_r($data);
        $email = $data['email'];
        $password = $data['password'];
        echo $email . '<br/>';
        echo $password;
        exit();
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            $user = mysqli_fetch_assoc($queryResult);

            if ($user) {
                header("Location:dashboard.php");
            } /*else if {
                $mesage = "please use valid address $ password";
                return $mesage;
            }*/
            //echo '<pre>';
            //print_r($user);
        else{
                die("Query problem" . mysqli_error(Database::dbConnection()));
            }
        }
        }
        public function adminLogout()
        {
            header("Location:index.php");
        }
    }

