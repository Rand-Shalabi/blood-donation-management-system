<?php 
$title = "BDMS - Delete Donor";
include "includes/header.php";
include "includes/connection.php";

 if (isset($_POST['delete'])) {
    $donor_id = $_POST['donor_id'];

    $query = "DELETE FROM donor WHERE donor_id = '$donor_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<div class='alert alert-success'>Donor deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting donor</div>";
    }
}
?>
<body>
    <header>
        <h1 class="header"><small> Blood Donation Management Dashboard </small></h1>
    </header>
    <?php include "sidepar.php"; ?>
    <div class="content">
     <div class="container-delete ">
    <h2>Delete Donor</h2>

     <form method="POST" class="delete-box">
        <label>Enter Donor ID:</label>
        <input type="number" name="donor_id" required>
 
        <input type="submit" name="delete" value="Delete Donor" class=" btn btn-delete btn-danger ">
    </form>
</div>
</div>
</body>
</html>





















</body>