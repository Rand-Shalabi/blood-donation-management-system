<?php
$title = "BDMS - Donor List";
include "includes/header.php";
include "includes/connection.php";
    
    $sql = "SELECT donor_id, photo, full_name,
                   blood_type, gender, phone, 
                   email, last_donation, donations
            FROM user
            RIGHT JOIN donor
            ON user.id = donor.donor_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if(isset($_GET['action']) && $_GET['action'] == 'record' && isset($_GET['donor_id'])){
        $donor_id = $_GET['donor_id'];
        $date = date('Y-m-d');
        $sql = "SELECT last_donation
                FROM donor
                WHERE donor_id = '$donor_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $last_donation = $row['last_donation'];
        if($last_donation == null || (strtotime($date) - strtotime($last_donation))/ (60 * 60 * 24) >= 56){
            $sql = "UPDATE donor
                    SET last_donation = '$date',
                        donations = donations + 1
                    WHERE donor_id = '$donor_id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("Location: donor-list.php?msg=Donation recorded");
        }
        else{
            header("Location: donor-list.php?error=Too soon to donate again");
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
                            <th>New Donation</th>
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
                            <td><a href="donor-list.php?action=record&donor_id=<?= $row['donor_id'] ?>" 
                                   class="btn btn-success btn-sm">Record Donation</a></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
    </div>
</div>
</body>
</html>