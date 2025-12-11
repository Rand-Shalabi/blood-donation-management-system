<?php 
$title = "BDMS - Update Donor Info";
include "includes/header.php";
include "includes/connection.php";
include "functions.php"
    if(isset($_GET['donor_id'])){
        $donor_id = (int)$_GET['donor_id'];
        $sql = "SELECT donor.*, user.email
                FROM donor
                JOIN user
                ON donor.donor_id = user.id 
                WHERE donor.donor_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $donor_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($row = $result->fetch_assoc()){
            $name = $row['full_name'];
            $email = $row['email'];
            $photo = $row['photo'];
            $phone = $row['phone'];
            $blood_type = $row['blood_type'];
            $gender = $row['gender'];
        }
    }
    if(isset($_POST['donor_id'])){
        $donor_id = (int)$_POST['donor_id'];
        $name = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $blood_type = $_POST['blood_type'];
        $gender = $_POST['gender'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } elseif (!preg_match('/^[0-9]{9,15}$/', $phone)) {
            $error = "Phone must be 9-15 digits.";
        } else{
            $conn->begin_transaction();
            $sql1 = "UPDATE donor
                     SET full_name = ?, blood_type = ?, phone = ?, gender = ?
                     WHERE donor_id = ?";

            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("ssssi", $name, $blood_type, $phone, $gender, $donor_id);
            $stmt1->execute();

            $sql2 = "UPDATE user
                     SET email = ?
                     WHERE id = ?";

            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("si", $email, $donor_id);
            $stmt2->execute();

            $conn->commit();
            $success = "Updated Successfully!";
        }
    }
?>
<body>
    <header>
        <h1 class="header"><small> Blood Donation Management Dashboard </small></h1>
    </header>
    <?php include "sidepar.php"; ?>


<div class="content">
<div class="container">

    <h2>Update Donor Information</h2>

    <!-- Update Donor Form -->
    <div class="card shadow p-5">
        <?php 
            if(isset($error)){
                echo show_alert($error);
            } elseif(isset($success)){
                header("refresh:2;url=donor-list.php");
                echo show_alert($success, "success");
            }
        ?>
        <h4>Editing Donor Information</h4>
        <hr>

        <form method="POST" enctype="multipart/form-data">

            <input type="hidden" name="donor_id" value="<?= isset($donor_id)? $donor_id: "" ?>">

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?= isset($name)? $name: "" ?>" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= isset($email)? $email: "" ?>" required>
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
                    <label class="form-label">Phone</label>
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

            <div class="mb-3">
                <label class="form-label">Upload New Photo (optional)</label>
                <input type="file" name="photo" class="form-control" value="<?= isset($photo)? $photo: "" ?>">
            </div>

              <input type="submit" name="update" value="Save changes" class=" btn   btn-danger ">

        </form>
    </div>

</div>
</div>
 

</body>
</html>