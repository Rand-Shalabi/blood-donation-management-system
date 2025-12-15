<?php 
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "new-donor-handler.php";
$title = "BDMS - Add Donor";
include "includes/header.php";
?>
<body>
    <header>
        <h1 class="header"><small> Blood Donation Management Dashboard </small></h1>
    </header>
    <?php include "sidepar.php"; ?>
<div class="content">
    <div class="container-add ">
        <h2>Add New Donor</h2>
        <?php 
            show_alert($error, 'danger');
            show_alert($success, 'success');
        ?>
     <div class="c card shadow p-5  ">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_donor">
                <input type="hidden" name="action" value="<?= isset($donor_id)? $donor_id: "" ?>">
                <?php 
                    $gender = $gender ?? '';
                    $blood_type = $blood_type ?? '';
                ?>                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="<?= isset($full_name)? $full_name: "" ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= isset($email)? $email : ""?>" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Blood Type</label>
                    <select name="blood_type" class="form-select" required>
                        <option value="" disabled selected>Select...</option>
                        <option value="A+" <?= ($blood_type === 'A+') ? 'selected' : '' ?>>A+</option>
                        <option value="A-" <?= ($blood_type === 'A-') ? 'selected' : '' ?>>A-</option>
                        <option value="B+" <?= ($blood_type === 'B+') ? 'selected' : '' ?>>B+</option>
                        <option value="B-" <?= ($blood_type === 'B-') ? 'selected' : '' ?>>B-</option>
                        <option value="O+" <?= ($blood_type === 'O+') ? 'selected' : '' ?>>O+</option>
                        <option value="O-" <?= ($blood_type === 'O-') ? 'selected' : '' ?>>O-</option>
                        <option value="AB+" <?= ($blood_type === 'AB+') ? 'selected' : '' ?>>AB+</option>
                        <option value="AB-" <?= ($blood_type === 'AB-') ? 'selected' : '' ?>>AB-</option>
                    </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="<?= isset($phone)? $phone: "" ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" value="<?= isset($gender)? $gender: "" ?>" required>
                            <option value="" disabled selected>Select...</option>
                            <option value="male" <?= ($gender === 'male') ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= ($gender === 'female') ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                     
                </div>

                <input type="submit" class="btn btn-danger" value="Add Donor">

            </form>
        </div>
    </div>
</div>
</body>
</html>
 