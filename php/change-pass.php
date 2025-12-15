<?php 
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$title = "BDMS - Reset Password";
include "includes/header.php";
include "includes/connection.php";
include "functions.php";

    if(isset($_GET['donor_id'])){

        $donor_id = (int)$_GET['donor_id'];

        $sql = "SELECT password
                FROM user
                WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $donor_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $password = $row['password'];
    }

    if(isset($_POST['current_password'])){

        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if(!password_verify($current_password, $password)){
            $error = "Incorrect current password. Try again!";
        } elseif($new_password !== $confirm_password){
            $error = "New passwords do not match.";
        } elseif(strlen($new_password) < 6){
            $error = "New password must be at least 6 characters long.";
        } else{
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE user
                    SET password = ?
                    WHERE id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $new_password_hashed, $donor_id);
            $stmt->execute();
            $success = "Password Reset Successfully!";
        }
    }

?>
<body>
    <header>
        <h1 class="header"><small> Blood Donation Management Dashboard </small></h1>
    </header>
    <?php include "sidepar.php"; ?>
    <div class="content">
    <h2>Change Password</h2>

    <div class="password-box">
        <?php 
            if(isset($error)){
                echo show_alert($error);
            } elseif(isset($success)){
                header("refresh:2;url=donor-list.php");
                echo show_alert($success, "success");
            }
        ?>
        <form method="POST" enctype="multipart/form-data">

            <label for="current">Current Password</label>
            <input type="password" id="current" name="current_password" 
                   value="<?= isset($current_password)? $current_password : ""; ?>" required>

            <label for="newpass">New Password</label>
            <input type="password" id="newpass" name="new_password" 
                   value="<?= isset($new_password)? $new_password : ""; ?>" required>

            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm_password" 
                   value="<?= isset($confirm_password)? $confirm_password : ""; ?>" required>

            <input type="submit" value="Save Changes" class="save-btn btn btn-danger">

        </form>

    </div>
</div>