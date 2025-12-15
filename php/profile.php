<?php 
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'donor') {
    header("Location: login.php");
    exit();
}
    $email = $_SESSION['email']; 
    $title = "BDMS - Donor Profile";
    include "includes/header.php";
    include "includes/connection.php";
    
    if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
    $file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_tmp  = $_FILES['photo']['tmp_name'];


    if ($file_size <= 2097152) {

        $new_name = "donor_" . time();
        $path = "../uploads/" . $new_name;    

        move_uploaded_file($file_tmp, $path);

        $update = "UPDATE donor 
                   JOIN user ON donor.donor_id = user.id
                   SET donor.photo = ?
                   WHERE user.email = ?";

        $stmt2 = $conn->prepare($update);
        $stmt2->bind_param("ss", $new_name, $email);
        $stmt2->execute();
         }
}

 $sql = "SELECT donor.*, user.created_at
        FROM donor 
        JOIN user ON donor.donor_id = user.id 
        WHERE user.email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
////////////

 if ($row = $result->fetch_assoc()) {
    $name = $row['full_name'];
    $photo = $row['photo'];
    $phone = $row['phone'];
    $blood_type = $row['blood_type'];
    $last_donation = $row['last_donation'];
    $donations = $row['donations'];
    $gender = $row['gender'];
    $created_at = $row['created_at'];
 }
if (!empty($photo)) {
    $profilePhoto = "../uploads/" . $photo;
} else {
    $profilePhoto = "../assets/blank_profile.webp";
}

     
    $formatted_phone = substr($phone, 0, 3) . "-" .
                       substr($phone, 3, 3) . "-" . 
                       substr($phone, 6);
 
 
?>
<body>
    <div class="profile-container">
        <div class="profile-card text-center p-4">
            <div class="row">


                 <div class="col-12 d-flex justify-content-center">
                    <form method="POST" enctype="multipart/form-data">
    <div class="profile-img-wrapper">
        <img src="<?= $profilePhoto ?>" class="profile-img">

        <label for="uploadPhoto" class="camera-icon">
            <i class="bi bi-camera-fill"></i>
        </label>

        <input type="file" id="uploadPhoto" name="photo" accept=".png, .jpg, .jpeg, .webp" onchange="this.form.submit()">
    </div>
</form>
  

</div>

<div class="col-12">
                    <h2 class="profile-title"><?= $name?></h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 profile-info">
                    <h5>Contact Information</h5>
                    <small class="text-muted">Email</small>
                    <div><?= $email?></div>
                    <small class="text-muted">Phone</small>
                    <div><?= "+972 " . $formatted_phone?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 profile-info">
                    <h5>Medical Information</h5>
                    <small class="text-muted">Blood Type</small>
                    <div><?= $blood_type?></div>
                    <small class="text-muted">Last Donation</small>
                    <div><?= $last_donation?></div>
                    <small class="text-muted">Donations</small>
                    <div><?= $donations?></div>
                    <small class="text-muted">Gender</small>
                    <div><?= $gender?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 profile-info">
                    <h5>Account Information</h5>
                    <small class="text-muted">Member Since</small>
                    <div><?= $created_at?></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
