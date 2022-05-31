<?php
session_start();
include './utils/dbconnect.php';
if (!isset($_SESSION['islogin'])) {
    header("location:index.php");
}

?>
<?php
// echo "hello";
// echo var_dump(isset($_POST['submit']));
if (isset($_SESSION['temporary_user_login_time']) && $_SESSION['temporary_user_login_time'] < time() - 50) {
    header("location:logout.php");
} else {
    if (isset($_POST['submit'])) {
        $files = $_FILES['file'];
        // foreach ($files as $file) {
        // echo var_dump($file);
        // echo "<br/>";
        // }
        // echo var_dump($_FILES['file']['tmp_name']);
        $uploaded_files = '';
        if (isset($_SESSION['uploaded_files'])) {
            $uploaded_files = $_SESSION['uploaded_files'] . "<hr/><br/>";
        }
        // echo sizeof($_FILES['file']['tmp_name']) ;
        for ($i = 0; $i < sizeof($_FILES['file']['tmp_name']); $i++) {
            // echo "<br/>";
            // $_SESSION['uploaded_file']
            $file_name = $_FILES['file']['name'][$i];
            $temp_location = $_FILES['file']['tmp_name'][$i];
            $uploaded_files = $uploaded_files . ($i + 1) . "] " . $file_name . "<br/>";
            // echo $file_name;
            // echo "<br/>";
            // echo var_dump($temp_location);
            $location = "temp/" . $file_name;
            move_uploaded_file($temp_location, $location);
        }
        $email = "";
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        } else {
            $email = $_SESSION['temporary_email'];
        }
        $_SESSION['uploaded_files'] = $uploaded_files . "<br/>";
        $sql = "UPDATE users set recent_uploads='" . $uploaded_files . "' ,last_access_ip='" . $_SERVER['REMOTE_ADDR'] . "' ,last_updated_time=now() WHERE email='" . $email . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "Updated";
        } else {
            echo "error";
        }

        // echo $uploaded_files;
    }
}
?>




<?php
include './utils/defaults_start.php';
include './utils/header.php';

echo '
    <h3 class="text-center">Your IP address : ';
echo $_SERVER['REMOTE_ADDR'];
echo '</h3><div class="container col-xxl-8 px-4 py-5 "><form action="?" class="UploadFileForm" method="POST" enctype="multipart/form-data">
            <label for="file" id="fileLable">Upload Files Here</label>
            <input type="file" onchange="updateFileLable(event)" multiple name="file[]" id="file" placeholder="Upload File here" required>
            <input class="button" name="submit" type="submit" value="Submit">
        </form>
        <div class="asideuploadlist">';
if (isset($_SESSION['uploaded_files'])) {
    echo '
                <h2>Your recent Uploads</h2>';
    echo $_SESSION['uploaded_files'];
} else {
    echo '<h2>No recent Uploads</h2>';
}
echo '
        </div>
    </div>
';
include './utils/defaults_end.php';
mysqli_close($conn);


?>