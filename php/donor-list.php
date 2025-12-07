<?php
$title = "Donor List";
include "includes/header.php";
?>
<body>
    <header>
        <h1 class="header"> Blood Bank & Donation - Admin Panel </h1>
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
                            
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Donor 1 dummy data -->
                        <tr>
                            <td>1</td>
                            <td><img src="../assets/user.png" class="rounded-circle" width="50"></td>
                            <td>Ahmed Ali</td>
                            <td>A+</td>
                            <td>male</td>
                             
                            <td>0790000000</td>
                            <td>ahmed@example.com</td>
                            <td>2023-12-10</td>  
                            <td>5</td> 
                        </tr>

                        <!-- Donor 2 dummy data -->
                        <tr>
                         <td>2</td>
                            <td><img src="../assets/user.png" class="rounded-circle" width="50"></td>
                            <td>Sara Khaled</td>
                            <td>O-</td>
                            <td>Female</td>
                            <td>0781234567</td>
                            <td>sara@example.com</td>
                            <td>2023-12-10</td>  
                            <td>5</td> 
                        </tr>

                        <!-- Donor 3 dummy data -->
                        <tr>
                            <td>3</td>
                            <td><img src="../assets/user.png" class="rounded-circle" width="50"></td>
                            <td>Mohammad Yaser</td>
                            <td>B+</td>
                            <td>male</td>
                            <td>0773334444</td>
                            <td>mohammad@example.com</td>
                            <td>2023-12-10</td>  
                            <td>3</td> 
                        </tr>
<tr>
                            <td>4</td>
                            <td><img src="../assets/user.png" class="rounded-circle" width="50"></td>
                            <td>Mohammad Yaser</td>
                            <td>B+</td>
                            <td>male</td>
                            <td>0773334444</td>
                            <td>mohammad@example.com</td>
                            <td>2023-12-10</td>  
                            <td>1</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        

    </div>
</div>
</body>
</html>