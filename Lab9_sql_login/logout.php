<?php
session_start();
session_destroy(); // ล้างข้อมูลการล็อคอินทั้งหมด
?>
<div style="border: 1px solid black; padding: 20px; text-align: center; width: 300px; margin: 50px auto;">
    ออกจากระบบแล้ว!! <a href="login.php">ลงชื่อเข้าใช้อีกครั้ง</a>
</div>