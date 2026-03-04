<?php
session_start();
include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM customer WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['user_id'] = $row['Customer_id'];
        $_SESSION['full_name'] = $row['Customer_Name'] . " " . $row['Customer_Lastname'];
        header("Location: show_customer.php"); // ไปหน้าหลัก
    }else{
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง!');</script>";
    }
}
?>

<form method="POST">
    <h2>เข้าสู่ระบบ</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Log in</button>
</form>