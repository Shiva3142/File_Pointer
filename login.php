<?php
session_start();
include './utils/dbconnect.php';
if (isset($_SESSION['islogin']) && $_SESSION['islogin']==true) {
    header("location:index.php");
}
?>

<?php
// echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "login.php";
    $password=$_POST['password'];
    $email=$_POST['email'];
    // echo $password;
    // echo $email;
    $checking_password=md5($password);
    $sql="SELECT * FROM users where email='".strtolower($email)."' AND main_password='".$checking_password."';";
    echo $sql;
    echo '<br/>';
    $result=mysqli_query($conn,$sql);
    if ($result) {
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_assoc($result);
            $_SESSION['email']=$row['email'];
            $_SESSION['user']=explode(" ",$row['name'])[0];
            $_SESSION['islogin']=true;
            echo "Success";
            header("location:index.php");
        }
        else{
            $_SESSION['wrong_attmpt']=1;
            header("location:login.php");
        }
    } else {
        echo "error";
        // header("location:index.php");
    }
    

}else{
    // header("location:verify.php");
    include './utils/defaults_start.php';
    include './utils/header.php';
    if (isset($_SESSION['wrong_attmpt'])) {
        if ($_SESSION['wrong_attmpt']==1) {
            echo '
            <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            ';
        }
        unset($_SESSION['wrong_attmpt']);
    }    
    echo '
        <div class="loginContainer">
            <div class="form-signin">
            <form action="';
            echo $_SERVER['REQUEST_URI'];
            echo '" method="POST">
                <div class="image">
                <img class="mb-4" src="https://cdn.pixabay.com/photo/2017/06/10/07/16/folder-2389217_960_720.png" alt="" width="100" height="100">
                </div>
                    <h1 class="h3 mb-3 fw-normal text-center">Please Sign In</h1>
                    <div class="form-floating my-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    ';
    include './utils/defaults_end.php';
}

mysqli_close($conn);

?>