<?php
session_start();
$title = "BDMS - Login";
include "includes/connection.php";
include "functions.php";
include "includes/header.php";

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields";
    } else {
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    header('Location: donor-list.php');
                } else {
                    header('Location: profile.php');
                }
                exit();
            } else {
                $error = "Wrong password";
            }
        } else {
            $error = "Email not found";
        }

        $stmt->close();
    }
}
?>

<body class="body1">
    <header class="header1">
      <img src="../assets/logo.png" alt="Logo" class="logo">
    
    </header> 
<div class="main">
   
    <div class="container my-flex">
        <!--width:100%-->
        <div class="row w-100">

            <!-- Text -->
            <div class="col-md-7 text-white  ">
                <h1 class="my-title">Join the mission of <br> saving lives & <span>Donate blood</span></h1>
                <p class="par">This system is designed to manage donor information, track blood records, and ensure that every donation is collected, stored, and used responsibly. By keeping all data organized and secure, the platform helps make sure that the right blood is available at the right time for patients in need. Log in to continue supporting a smooth, reliable, and life-saving donation process.</p>
            </div>

         
            <div class="col-lg-5">
                <div class="card p-4 text-white bg-dark bg-opacity-75 rounded-4">
                    <h2 class="card-title text-center mb-3">Login</h2>


                        <?php 
            show_alert($error, 'danger');
            
        ?>
           

                       <!-- Form -->
                    <form action="login.php" method="post">
                        <input type="email" name="email" class="form-control mb-3" placeholder="Enter email here" value="<?= isset($email)? $email: "" ?>">
                        <input type="password" name="password" class="form-control mb-3" placeholder="Enter password here">
                          <button type="submit" class="btn btn-danger w-100 mb-3">Login</button>

                        
                        <p class="text-center mb-0">Don't have an account? <br><a href="SignUp.php" class="text-white">Signup</a></p>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
</body>

</html>
