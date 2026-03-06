<?php
session_start();
session_destroy(); // ล้างข้อมูลการล็อคอินทั้งหมด
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

<div style="border: 1px solid black; padding: 20px; text-align: center; width: 300px; margin: 50px auto;">
    ออกจากระบบแล้ว!! <a href="login.php">ลงชื่อเข้าใช้อีกครั้ง</a>
</div>