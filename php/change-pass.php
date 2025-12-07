<?php 
$title = "Dellete Donor";
include "includes/header.php";
 
?>
<body>
    <header>
        <h1 class="header"> Blood Bank & Donation - Admin Panel </h1>
    </header>
    <?php include "sidepar.php"; ?>
    <div class="content-area">
    <h2>Change Password</h2>

    <div class="password-box">

        <form method="POST">

            <label for="current">Current Password</label>
            <input type="password" id="current" name="current_password" required>

            <label for="newpass">New Password</label>
            <input type="password" id="newpass" name="new_password" required>

            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm_password" required>

            <input type="submit" value="Save Changes" class="save-btn btn btn-danger">

        </form>

    </div>
</div>