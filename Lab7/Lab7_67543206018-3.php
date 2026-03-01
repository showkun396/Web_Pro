<?php
// --- 1. การสร้าง Function ขึ้นมาเอง (Custom Function) ---
// ฟังก์ชันเช็คว่ากดยอมรับเงื่อนไขหรือยัง และเช็ครหัสผ่าน
function validateData($agree, $p1, $p2) {
    if (empty($agree)) {
        return "ไม่ได้ยอมรับข้อตกลง!!";
    }
    if ($p1 !== $p2) {
        return "รหัสผ่านไม่ตรงกัน!!";
    }
    return "pass"; // ถ้าผ่านเงื่อนไขทั้งหมด
}

// --- 2. รับค่าจาก Form (ใช้ชื่อ name ให้ตรงกับหน้า Lab7.php) ---
$fname    = $_POST['fname'] ?? '';
$lname    = $_POST['lname'] ?? '';
$user     = $_POST['User'] ?? '';
$password = $_POST['pwd'] ?? '';
$cpwd     = $_POST['cpwd'] ?? '';
$email    = $_POST['email'] ?? '';
$agree    = $_POST['agree'] ?? '';
$gender   = $_POST['gender'] ?? 'ชาย'; // สมมติค่าเริ่มต้น
$b_day    = $_POST['day'] ?? '';
$b_month  = $_POST['month'] ?? '';
$b_year   = $_POST['year'] ?? '';

// เรียกใช้ Function ที่สร้างเอง
$status = validateData($agree, $password, $cpwd);

if ($status !== "pass") {
    echo "<h1 style='color:red; border:1px solid red; display:inline-block; padding:10px;'> $status </h1>";
} else {
    
    $userData = [
        "ชื่อ - สกุล :" => $fname . " " . $lname,
        "เพศ :"        => $gender,
        "วันเกิด :"    => "$b_day $b_month พ.ศ. $b_year",
        "Username :"  => $user,
        "Password :"  => "*****",
        "E-mail :"    => $email
    ];

    echo "<h3>แสดงข้อมูลการสมัคร</h3>";
    echo "<hr>";

    // วนลูปแสดงผลจาก Array
    foreach ($userData as $label => $value) {
        echo "<b>$label</b> $value <br><br>";
    }

    // --- 4. การใช้ Built-in Function (เกี่ยวกับ Time / Date) ---
    date_default_timezone_set("Asia/Bangkok"); // ตั้งค่าโซนเวลาไทย
    
    $currentDate = date("l F d, Y H:i:s a");
    
    echo "<b>วันที่ลงทะเบียน :</b> " . $currentDate;
}
?>