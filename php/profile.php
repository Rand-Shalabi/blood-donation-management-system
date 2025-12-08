<?php 
    $title = "BDMS - Donor Profile";
    include "includes/header.php";

    include "includes/connection.php";
    $email = $_POST["email"];
    $sql = "SELECT donor.*, user.created_at
            FROM donor join user
            ON donor.donor_id = user.id 
            WHERE email = '$email'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($row = $result->fetch_assoc()){
        $name = $row['full_name'];
        $photo = $row['photo'];
        $phone = $row['phone'];
        $blood_type = $row['blood_type'];
        $last_donation = $row['last_donation'];
        $donations = $row['donations'];
        $gender = $row['gender'];
        $created_at = $row['created_at'];
    }
    $formatted_phone = substr($phone, 0, 3) . "-" . substr($phone, 3, 3) . "-" . substr($phone, 6);
?>
<body>
    <div class="profile-container">
        <div class="profile-card text-center p-4">
            <div class="row">
                <div class="col-12">
                    <img class="profile" src= "<?= "../uploads/" . $photo ?>" alt="">
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
