<?php
$server="localhost";
$username="root";
$password="";
$database="file_pointer";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn)
{
    echo "error".mysqli_connect_error($conn);
}
else{
    // echo 'connected';
}
?>