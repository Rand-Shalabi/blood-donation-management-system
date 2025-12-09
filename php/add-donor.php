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
            <form action="add_donor_action.php" method="POST" >

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
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
                         <select name="Gender" class="form-select" required>
                            <option value="">Select...</option>
                            <option>Female</option>
                            <option>male</option>
                             
                        </select>
                    </div>


                    
                    <div class="row mt-4">

                   <div class="col-md-6">
                      <label class="form-label">Last Donation Date</label>
                  <input type="date" name="last_donation_date" class="form-control">
                       </div>

                <div class="col-md-6">
        <label class="form-label">Total Donations</label>
        <input type="number" name="donations" class="form-control" placeholder="Enter number of donations">
    </div>
</div>
                     
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Donor Photo</label>
                    <input type="file" name="donor_photo" class="form-control" required>
                </div>

                <input type="submit" class="btn btn-danger" value="Add Donor">

            </form>
        </div>
    </div>
</div>
</body>
</html>
 