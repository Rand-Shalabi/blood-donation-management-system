 <?php 
$title = "udate password";
include "includes/header.php";
 
?>
<body>
    <header>
        <h1 class="header"> Blood Bank & Donation - Admin Panel </h1>
    </header>
    <?php include "sidepar.php"; ?>


<div class="content">
<div class="container">

    <h2>Update Donor Information</h2>

    <!-- Search Donor ID -->
    <div class="card p-4 mb-4 shadow">
        <form method="GET">
            <label class="form-label">Enter Donor ID</label>
            <div class="d-flex gap-3">
                <input type="number" name="id" class="form-control" placeholder="Example: 1" required>
                  <input type="submit" name="search" value="Search" class=" btn   btn-danger ">
            </div>
        </form>
    </div>

    <!-- Update Donor Form -->
    <div class="card shadow p-5">

        <h4>Editing Donor Information</h4>
        <hr>

        <form method="POST" action="update_donor_action.php" enctype="multipart/form-data">

            <input type="hidden" name="id" value="">

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="form-label">Blood Type</label>
                    <select name="blood_type" class="form-select">
                        <option>Select...</option>
                        <option>A+</option><option>A-</option>
                        <option>B+</option><option>B-</option>
                        <option>O+</option><option>O-</option>
                        <option>AB+</option><option>AB-</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option>Select...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Last Donation Date</label>
                    <input type="date" name="last_donation" class="form-control" value="">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Total Donations</label>
                    <input type="number" name="total_donations" class="form-control" value="">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload New Photo (optional)</label>
                <input type="file" name="photo" class="form-control">
            </div>

              <input type="submit" name="update" value="Save changes" class=" btn   btn-danger ">

        </form>
    </div>

</div>
</div>
 

</body>
</html>