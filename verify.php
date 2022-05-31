<?php
session_start();
include './utils/dbconnect.php';
if (isset($_SESSION['islogin']) && $_SESSION['islogin'] == true) {
    header("location:index.php");
}
?>

<?php

// echo $_SERVER['REQUEST_METHOD'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "upload.php";
    $password = $_POST['password'];
    $username = $_POST['username'];
    // echo $password;
    // echo $username;
    // $checking_password=$password);
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username) == 1 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
        $_SESSION['temporary_wrong_attmpt'] = 1;
        header("location:verify.php");
    } else {
        if (isset($_SESSION['limit_exceeded']) && $_SESSION['limit_exceeded'] > 2) {
            $_SESSION['limit_exceed'] = 1;
            header("location:verify.php");
        } else {
            $sql = "SELECT * FROM users where username='" . $username . "' AND temporary_password='" . $password . "';";
            echo $sql;
            echo '<br/>';
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['temporary_email'] = $row['email'];
                    $_SESSION['temporary_user'] = explode(" ", $row['name'])[0];
                    $_SESSION['islogin'] = true;
                    $random_password = rand(100000000000, 1000000000000);
                    $sql2 = "UPDATE users SET temporary_password='" . $random_password . "' WHERE email='" . $row['email'] . "'";
                    $result = mysqli_query($conn, $sql2);
                    // echo "Success";
                    $_SESSION['temporary_user_login_time']=time();
                    header("location:upload.php");
                } else {
                    $_SESSION['temporary_wrong_attmpt'] = 1;
                    header("location:verify.php");
                    if (isset($_SESSION['limit_exceeded'])) {
                        $_SESSION['limit_exceeded'] = $_SESSION['limit_exceeded'] + 1;
                    } else {
                        $_SESSION['limit_exceeded'] = 1;
                    }
                }
            } else {
                echo "error";
                // header("location:index.php");
            }
        }
    }
} else {
    // header("location:verify.php");
    include './utils/defaults_start.php';
    include './utils/header.php';
    if (isset($_SESSION['temporary_wrong_attmpt'])) {
        if ($_SESSION['temporary_wrong_attmpt'] == 1) {
            echo '
            <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            ';
        }
        unset($_SESSION['temporary_wrong_attmpt']);
    }
    if (isset($_SESSION['limit_exceed'])) {
        if ($_SESSION['limit_exceed'] == 1) {
            echo '
            <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            ';
        }
        unset($_SESSION['limit_exceed']);
    }
    echo '
        <div class="loginContainer">
            <div class="form-signin">
            <form onsubmit="stopExecution(event)" action="';
    echo $_SERVER['REQUEST_URI'];
    echo '" method="POST">
                <div class="image">
                <img class="mb-4" src="https://cdn.pixabay.com/photo/2017/06/10/07/16/folder-2389217_960_720.png" alt="" width="100" height="100">
                </div>
                    <h1 class="h3 mb-3 fw-normal text-center">Please Enter Your Access Username and Password</h1>
                    <div class="form-floating my-3">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
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