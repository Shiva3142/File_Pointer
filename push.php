<?php
session_start();

if (!isset($_SESSION['islogin'])) {
    header("location:index.php");
}
if (isset($_SESSION['email'])) {
}
else{
    header("location:index.php");
}


?>
<?php
include './utils/defaults_start.php';
include './utils/header.php';

echo '

<div class="container col-xxl-8 px-4 py-5">
    <form class="UploadFileForm" action="savefiles.php" method="post">
        <label for="file" id="fileLable">Upload Files Here</label>
        <input type="file" onchange="updateFileLable(event)" multiple name="file" id="file" placeholder="Upload File here">
        <button type="submit">Submit</button>
    </form>
</div>

';



include './utils/defaults_end.php';
mysqli_close($conn);


?>