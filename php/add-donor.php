<?php 
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
     <div class="c card shadow p-5  ">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_donor">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
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
                            <option value="">Select...</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                         <select name="gender" class="form-select" required>
                            <option value="">Select...</option>
                            <option>Female</option>
                            <option>male</option>
                             
                        </select>
                    </div>
                     
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Donor Photo</label>
                    <input type="file" name="donor_photo" class="form-control">
                </div>

                <input type="submit" class="btn btn-danger" value="Add Donor">

            </form>
        </div>
    </div>
</div>
</body>
</html>
 