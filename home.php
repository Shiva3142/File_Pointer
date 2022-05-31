<?php
session_start();
include './utils/dbconnect.php';
if (!isset($_SESSION['islogin'])) {
    header("location:index.php");
}
?>

<?php
include './utils/defaults_start.php';
include './utils/header.php';

echo '
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://images.unsplash.com/photo-1615309662146-255e7532957e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold">Welcome To File Pointer</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">It is an File Uploading portal for Admins of File Pointer Only.

        This Projetct is Created by PHP and MySQL as a backend and HTML, CSS, JavaScript and Bootstrap are used for frontend.
        
        </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <div class="optionContainers">
        
            <div class="options">
            <div class="option">
                <a class="btn btn-primary" href="/SK_PHP_PROJECTS/File_Pointer/upload.php">Upload Files Here</a>
            </div>
            <div class="option">
                <a class="btn btn-outline-secondary" href="/SK_PHP_PROJECTS/File_Pointer/get_files.php">Download Files Here</a>
            </div>
            
            </div>
        
        </div>
      </div>
    </div>
  </div>
';
include './utils/defaults_end.php';
mysqli_close($conn);


?>