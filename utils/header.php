<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/SK_PHP_PROJECTS/File_Pointer" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-2"><i class="fas fa-file-medical-alt"> File Pointer</i> </span>
        </a>
        <ul class="nav nav-pills">
<?php
if (isset($_SESSION['temporary_user_login_time'])) {
    if ($_SESSION['temporary_user_login_time']<time()-50) {
        header("location:logout.php");
    }
}
if (isset($_SESSION['islogin'])) {
    if ($_SESSION['islogin']==true) {
        if (isset($_SESSION['email'])) {
            echo '
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page"> Hello ';
                echo $_SESSION['user'];
            }        
            else if (isset($_SESSION['temporary_email'])) {
                echo '
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page"> Hello ';
                echo $_SESSION['temporary_user'];
            }
        echo '</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        <li class="nav-item"><a href="/SK_PHP_PROJECTS/File_Pointer/home.php" class="nav-link">Pull & Push</a></li>
        ';
        echo '<li class="nav-item "><a href="/SK_PHP_PROJECTS/File_Pointer/logout.php" class="nav-link">logout</a></li>';

    } else {
        
    }
} else {



    echo '
    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
    <li class="nav-item"><a href="/SK_PHP_PROJECTS/File_Pointer/verify.php" class="nav-link">Upload</a></li>
    <li class="nav-item"><a href="/SK_PHP_PROJECTS/File_Pointer/login.php" class="nav-link">Login</a></li>
    ';
}





?>


















        </ul>
    </header>
</div>