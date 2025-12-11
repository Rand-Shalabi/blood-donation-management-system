<?php   
include "new-donor-handler.php"; 
$title = "BDMS - Signup";  
include "includes/header.php";  
?>


<body class="body1" >
 <header class="header1">
      <img src="../assets/logo.png" alt="Logo" class="logo">
    
    </header> 


     <div class="left-overlay"></div>

   
    <div class="container my-flex ">
        <!--width:100%-->
        <div class="row w-100">

            <!-- Text -->
            <div class="col-md-7 text-white  ">
                <h1 class="my-title" style=" padding-top: 100px;">Join the mission of <br> saving lives & <span>Donate blood</span></h1>
                <p class="par">This system is designed to manage donor information, track blood records, and ensure that every donation is collected, stored, and used responsibly. By keeping all data organized and secure, the platform helps make sure that the right blood is available at the right time for patients in need. Log in to continue supporting a smooth, reliable, and life-saving donation process.</p>
            </div>

            <div class="col-lg-5">
                <div class="card p-4 text-white bg-dark bg-opacity-75 rounded-4">
                    <h2 class="card-title text-center mb-3">SignUp</h2>
                    

            <?php 
            show_alert($error, 'danger');
            show_alert($success, 'success');
        ?>
               

            <!-- Form -->
                    <form method="post" action="signup.php">
                        <input type="hidden" name="action" value="create_account">
                         <input type="text" class="form-control mb-3" placeholder="Full Name" name="full_name"  style="height: 30px;">
                        <input type="email" class="form-control mb-3" placeholder=" Email" name="email" style="height: 30px;">
              
                 <!--gender -->
             <div class="mb-3 mt-3 ">
                     <label for="gender">Gender</label><br>
                 <div>
                     
                      <input type="radio" name="gender" id="male" value="male">
                      <label for="male">Male</label>
                    
                       <input type="radio" name="gender" id="female"  value="female" >
                         <label for="female">Female</label>
                 </div>  
                    <div id="gender-error-message" class="text-danger"></div>  
             </div>
    <!-- blood type-->
                 <div class="contain mt-3 mb-3" >
                <label class="form-label">Blood Type</label>

                                    <select class="form-select" name="blood_type" style="height: 35px;">
                                        <option selected disabled>Select Blood Type</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                         <option value="AB-">AB-</option>
                                          <option value="AB+">AB+</option>
                                        <option value="O+">O+</option>
                                     <option value="O-">O-</option>
                                    </select>
                              
                 </div>
                        <!--Mobile number -->
                        <input type="text" class="form-control mb-3" placeholder="Mobile number" name="phone" style="height: 30px;">
                         <!--Password -->
                        <input type="password" class="form-control mb-3" placeholder="Password" name="password" style="height: 30px;">
                        
                        <button type="submit" class="btn btn-danger w-100 mb-3">SignUp</button>

                        <p class="text-center mb-0"> have an account? <br><a href="login.php" class="text-white">Login </a></p>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
</body>

</html>
