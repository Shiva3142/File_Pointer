<?php
session_start();
include './utils/dbconnect.php';
if (!isset($_SESSION['islogin'])) {
    // header("location:index.php");
    echo "error in login";
}else{
    $random_password=rand(100000000000,1000000000000);
    $email="";
    if (isset($_SESSION['email'])) {
        $email=$_SESSION['email'];
    } else {
        $email=$_SESSION['temporary_email'];
        
    }
    echo $email;
    $sql="UPDATE users SET temporary_password='".$random_password."' WHERE email='".$email."'";
    $result=mysqli_query($conn,$sql);
    var_dump($result);
    if ($result) {
        echo "updated";
    }else{
        echo "error";
    }
}
?>