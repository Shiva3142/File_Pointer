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


$fileList = glob('temp/*');
// echo count($fileList);
if (count($fileList)==0) {
    echo '<h1 class="text-center">
    No files are Available to show
    </h1>';
} else {
    echo '<div class="container">  <div class="row align-items-md-stretch">';
    foreach ($fileList as $filename) {
        // echo '<a  href="' . $filename . '" download>' . substr($filename, 5) . '</a>';
        echo '<div class="col-md-4 my-2">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h5>';
                echo substr($filename, 5);
                echo '</h5>
                <a class="btn btn-primary my-1 r" href="' . $filename . '" download>Download</a>
                </div>
        </div>';
    }
    echo '</div>
    </div>
    ';
    
}









include './utils/defaults_end.php';
mysqli_close($conn);


?>