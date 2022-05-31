<?php
session_start();
include './utils/dbconnect.php';
if (!isset($_SESSION['islogin'])) {
    header("location:index.php");
}
if (isset($_SESSION['temporary_user'])) {
    header("location:index.php");
}
?>

<?php
include './utils/defaults_start.php';
include './utils/header.php';
// echo $_SESSION['email'];
$sql="SELECT name,email,temporary_password,username,recent_uploads,last_access_ip,last_updated_time FROM users where email='".$_SESSION['email']."'";
$result=mysqli_query($conn,$sql);
// echo var_dump($result);
if ($result) {
    $row=mysqli_fetch_assoc($result);
    echo '
    <div class="container">
        <div class="ProfileCOntainer">
            <div class="optionsContainer">
                <div class="outline" onclick="toggleprofile()">Profile</div>
                <hr>
                <div class="outline" onclick="toggleprofile()">Temporary Access</div>
            </div>
            <div class="optionsDetailesContainer">
                <div class="profiledetails" id="profiledetails">
                    <div>
                        <div>
                            Name :
                        </div>
                        <span>';
                    echo $row['name'];
                    echo '</span>
                    </div>
                    <div>
                        <div>
                            Email :
                        </div>
                        <span>';
                            echo $row['email'];
                            echo '</span>
                    </div>
                    <div>
                        <div>
                            Last Access Timestamp :
                        </div>
                        <span>';
                            echo $row['last_updated_time'];
                            echo '</span>
                    </div>
                    <div>
                        <div>
                            Last Access IP address :
                        </div>
                        <span>';
                            echo $row['last_access_ip'];
                            echo '</span>
                    </div>
                    <div>
                        <div>
                            Recent Uploads :
                        </div>
                        <span>';
                            echo $row['recent_uploads'];
                            echo '</span>
                    </div>
                </div>
                <div class="passwordManagement" id="passwordManagement" >
                    <h4>Your Temporory Access Username : <strong>';
                    echo $row['username'];
                    echo '</strong></h4>
                    <h4>Your Temporory Access Password</h4>
                    <h5 id="message"></h5>
                    <div class="password btn btn-outline-secondary" id="password" onclick="copyTOClipBoard(event)">';
                    echo $row['temporary_password'];
                    echo '</div>
                    <span onclick="updatePassword(event)" class="btn btn-primary">
                        Change Access Password
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    ';
} else {
    echo "error";
}



?>


<?php
include './utils/defaults_end.php';
mysqli_close($conn);
?>