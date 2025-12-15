<?php 
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$title = "BDMS - Delete Donor";
include "includes/header.php";
include "includes/connection.php";
include "functions.php";

  if (isset($_GET['donor_id'])) {
    $donor = (int) $_GET['donor_id'];
}

 
if (isset($_POST['delete'])) {

    $donor_id = (int) $_POST['donor_id'];

     
    $check = "SELECT donor_id FROM donor WHERE donor_id = ?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $error = "Donor ID not found.";
    } else {

        
        if (!isset($error)) {
        $conn->begin_transaction();
            
                $sql1 = "DELETE FROM donor WHERE donor_id = ?";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param("i", $donor_id);
                $stmt1->execute();

                $sql2 = "DELETE FROM user WHERE id = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("i", $donor_id);
                $stmt2->execute();

                $conn->commit();
                $success = "Donor deleted successfully!";
           }
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
        <?php 
            if(isset($error)){
                echo show_alert($error);
            } elseif(isset($success)){
                header("refresh:2;url=donor-list.php");
                echo show_alert($success, "success");
            }
        ?>
     <form method="POST" class="delete-box" enctype="multipart/form-data">
        <label>Enter Donor ID:</label>
        <input type="number" name="donor_id" value="<?= isset($donor)? $donor: ""; ?>" required>
 
        <input type="submit" name="delete" value="Delete Donor" class=" btn btn-delete btn-danger ">
    </form>
</div>
</div>
</body>
</html>





















</body>