<?php  
session_start();
include "includes/connection.php";  
include "functions.php";

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name  = trim($_POST['full_name'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $gender     = $_POST['gender'] ?? '';
    $blood_type = $_POST['blood_type'] ?? '';
    $phone      = trim($_POST['phone'] ?? '');
    $password   = $_POST['password'] ?? '';

    
    if (empty($full_name) || empty($email) || empty($gender) || empty($blood_type) || empty($phone) || empty($password)) {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif (!preg_match('/^[0-9]{9,15}$/', $phone)) {
        $error = "Phone must be 9-15 digits.";
    } else {

        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already registered. Please login instead.";
        } else {

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO user (created_at, email, password, role) VALUES (NOW(), ?, ?, 'donor')");
            $stmt->bind_param("ss", $email, $password_hash);

            if ($stmt->execute()) {
                $user_id = $conn->insert_id;

                $stmt2 = $conn->prepare("INSERT INTO donor (donor_id, full_name, gender, blood_type, phone) VALUES (?, ?, ?, ?, ?)");
                $stmt2->bind_param("issss", $user_id, $full_name, $gender, $blood_type, $phone);

                if ($stmt2->execute()) {
                    $success = "Account created successfully!";
                    if ($_POST['action'] === 'create_account') {
                        header("refresh:2;url=profile.php");
                    } else if ($_POST['action'] === 'add_donor') {
                        header("refresh:2;url=donor-list.php");
                    }
                } else {
                    $error = "Error creating donor profile. Please try again.";
                }
                $stmt2->close();
            } else {
                $error = "Error creating account. Please try again.";
            }
            $stmt->close();
        }
    }
}
?>