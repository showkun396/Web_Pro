<?php
session_start();
$conn = mysqli_connect("localhost", "root", "123", "mystore");
mysqli_set_charset($conn, "utf8");

if (!$conn) { die("Connection Failed: " . mysqli_connect_error()); }

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
<style>
    .login-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        max-width: 350px;
        margin: 50px auto;
        text-align: center;
    }
    .login-container h2 {
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .login-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #dcdde1;
        border-radius: 6px;
        box-sizing: border-box;
    }
    .login-container button {
        width: 100%;
        padding: 12px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }
    .login-container button:hover {
        background-color: #2980b9;
    }
</style>

<form method="POST">
    <h2>เข้าสู่ระบบ</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Log in</button>
</form>