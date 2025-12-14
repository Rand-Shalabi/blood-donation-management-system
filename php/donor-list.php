<?php
$title = "BDMS - Donor List";
include "includes/header.php";
include "includes/connection.php";
include "functions.php"; 
 
    $sql = "SELECT donor_id, photo, full_name,
                   blood_type, gender, phone, 
                   email, last_donation, donations
            FROM user
            RIGHT JOIN donor
            ON user.id = donor.donor_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if(isset($_GET['donor_id'])){
        $donor_id = $_GET['donor_id'];
        $date = date('Y-m-d');

        $sql = "SELECT last_donation, full_name
                FROM donor
                WHERE donor_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $donor_id);
        $stmt->execute();

        $result2 = $stmt->get_result();
        $row = $result2->fetch_assoc();
        $last_donation = $row['last_donation'];
        $name = $row['full_name'];

        if($last_donation == null || (strtotime($date) - strtotime($last_donation))/ (60 * 60 * 24) >= 56){
            $sql = "UPDATE donor
                    SET last_donation = '$date',
                        donations = donations + 1
                    WHERE donor_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $donor_id);
            $stmt->execute();
            $success = "Donation recorded Successfuly!";
        }
        else{
            $error = "Too soon to donate again. It hasn't been 56 days since " .$name ." lastly donated.";
        }
    }
?>
<body>
    <header>
        <h1 class="header"><small> Blood Donation Management Dashboard </small></h1>
    </header>
    <?php include "sidepar.php"; ?>

<div class="content">
    <div class="container-list ">

        <h2 class="  mb-4">List of Donors</h2>

        <?php 
            if(isset($error)){
                echo show_alert($error);
            } elseif(isset($success)){
                echo show_alert($success, "success");
            }
        ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle  table-bordered text-center ">
                    <thead class="table-dark">
                        <tr>
                            <th>S.no</th>
                            <th>Photo</th>
                            <th>Full Name</th>
                            <th>Blood Type</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Last Donation</th>
                            <th>Total Donations</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $result->fetch_assoc()){ $i = 0;?>
                            <tr>
                            <?php foreach($row as $key=>$value){ 
                                if($i == 1){ ?>
                                    <td><img src="../uploads/<?= $value ?>" alt="donor photo" class="list-img"></td>
                                <?php } else{ ?>
                                    <td><?= $value ?></td>
                            <?php } $i++;} ?>
                            <td>
                                <a href="donor-list.php?donor_id=<?= $row['donor_id'] ?>" 
                                   class="btn btn-success btn-sm action-btn">Donate</a>
                                <br>
                                <a href="edit-donor.php?donor_id=<?= $row['donor_id'] ?>" 
                                   class="btn btn-primary btn-sm action-btn">Update</a>
                                <br>
                                <a href="change-pass.php?donor_id=<?= $row['donor_id'] ?>" 
                                   class="btn btn-warning btn-sm action-btn">Reset</a>
                                <br>
                                <a href="delete-donor.php?donor_id=<?= $row['donor_id'] ?>" 
                                   class="btn btn-danger btn-sm action-btn">Delete</a>
                            </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
    </div>
</div>
</body>
</html>