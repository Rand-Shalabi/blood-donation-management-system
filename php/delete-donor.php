<?php 
$title = "BDMS - Delete Donor";
include "includes/header.php";
include "includes/connection.php";
include "functions.php";
 if(isset($_GET['donor_id'])){
        $donor = (int)$_GET['donor_id'];
 }
 if (isset($_POST['delete'])) {
    $donor_id = (int)$_POST['donor_id'];

    $check = "SELECT donor_id FROM donor WHERE donor_id = $donor_id";
    $check_result = mysqli_query($conn, $check);
    if(mysqli_num_rows($check_result) == 0){
       $error = "Donor ID not found.";
    } else{
        $query = "DELETE FROM donor WHERE donor_id = $donor_id";
        $result = mysqli_query($conn, $query);
        $success ="Donor Deleted Successfully!";
        
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