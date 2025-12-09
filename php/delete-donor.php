<?php 
$title = "Dellete Donor";
include "includes/header.php";
 
?>
<body>
    <header>
        <h1 class="header"> Blood Bank & Donation - Admin Panel </h1>
    </header>
    <?php include "sidepar.php"; ?>
    <div class="content">
     <div class="container-delete ">
    <h2>Delete Donor</h2>

    <form action="delete_donor.php" method="POST" class="delete-box">
        <label>Enter Donor ID:</label>
        <input type="number" name="donor_id" required>
 
        <input type="submit" name="delete" value="Delete Donor" class=" btn btn-delete btn-danger ">
    </form>
</div>
</div>
</body>
</html>





















</body>