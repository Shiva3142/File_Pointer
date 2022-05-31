<?php
session_start();
include './utils/dbconnect.php';

?>

<?php
include './utils/defaults_start.php';
include './utils/header.php';


if (!isset($_SESSION['islogin'])) {
    echo '
    
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://cdn.pixabay.com/photo/2016/03/26/13/09/workspace-1280538_960_720.jpg"
                    class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Welcome To File Pointer</h1>
                <p class="lead">It is an File Uploading portal for <strong> Admins </strong> of File Pointer Only.</p>
                <p class="lead">This Project is Created by PHP and MySQL as a backend and HTML, CSS, JavaScript and
                    Bootstrap are used for frontend.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class="btn btn-outline-secondary btn-lg px-4" href="login.php">Login First</a>
                </div>
            </div>
        </div>
    </div>
        ';
} else {
    echo '
    <div class="container">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">Welcome to File Pointer</h1>
                <p class="lead fw-normal">It is an File Uploading portal for Admins of File Pointer Only.

                    This Project is Created by PHP and MySQL as a backend and HTML, CSS, JavaScript and Bootstrap are
                    used for frontend.
                </p>';
                if (isset($_SESSION['user'])) {
                    echo '<a class=" btn btn-outline-secondary" href="profile.php">Manage Profile</a>';
                }

            echo '</div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3 justify-content-center">
            <div class="bg-light m-2 me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Download File</h2>
                    <p class="lead">Best place for Downloading file with higher security and lower credentials.</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                </div>
            </div>

            <div class="bg-primary m-2 me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Upload Files</h2>
                    <p class="lead">Best place for Uploading file with higher security and lower credentials.</p>
                </div>
                <div class="bg-light shadow-sm mx-auto"
                    style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
        </div>

    </div>
      
      
      ';
}






include './utils/defaults_end.php';
mysqli_close($conn);


?>