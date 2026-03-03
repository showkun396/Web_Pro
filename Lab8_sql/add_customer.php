<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
</head>
<body>
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <form action="insert_customer.php" method="POST">
    <label>ชื่อ :</label> <input type="text" name="Customer_Name" required><br>
    <label>นามสกุล :</label> <input type="text" name="Customer_Lastname" required><br>

    <label>เพศ :</label>
    <input type="radio" name="Gender" value="ชาย">ชาย
    <input type="radio" name="Gender" value="หญิง">หญิง <br>

    <label>วัน-เดือน-ปี เกิด :</label>
    <input type="date" name="Birthdate"><br> <label>ที่อยู่:</label> <input type="text" name="Address" style="width: 300px;"><br>

    <label>จังหวัด :</label>
    <select name="Province">
        <option value="">- เลื่อกจังหวัด -</option>
        <option value="เชียงราย">เชียงราย</option>
        <option value="เชียงใหม่">เชียงใหม่</option>
        <option value="น่าน">น่าน</option>
        <option value="พะเยา">พะเยา</option>
        <option value="แพร่">แพร่</option>
        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
        <option value="ลำปาง">ลำปาง</option>
        <option value="ลำพูน">ลำพูน</option>
        <option value="อุตรดิตถ์">อุตรดิตถ์</option>
    </select><br>

    <label>รหัสไปรษณีย์ :</label> <input type="text" name="Zipcode" maxlength="5"><br>
    <label>โทรศัพท์ :</label> <input type="text" name="Telephone"><br>

    <label>รายละเอียดอื่นๆ :</label><br>
    <textarea name="Customer_Description" rows="4" cols="50"></textarea><br>

    <fieldset>
        <legend>Account ของลูกค้า</legend>
        <label>Username :</label> <input type="text" name="username" required><br>
       <label>Password :</label> <input type="password" name="password" required><br>
        <label>Confirm Password :</label> <input type="password" name="confirm_password" required><br>
    </fieldset>

    <br>
    <button type="submit">เพิ่มข้อมูลลูกค้า</button>
    <button type="reset">ยกเลิก</button>
</form>
</body>
</html>


<?php
include 'connect.php'; // เรียกใช้ไฟล์เชื่อมต่อที่เราทำไว้ก่อนหน้า

// รับค่าจากฟอร์ม
// รับค่าให้ครบทุกตัวแปรที่ส่งมาจาก form
$name = $_POST['Customer_Name'];
$lastname = $_POST['Customer_Lastname'];
$gender = $_POST['Gender'];
$birthdate = $_POST['Birthdate'];
$address = $_POST['Address'];
$province = $_POST['Province'];
$zipcode = $_POST['Zipcode'];
$telephone = $_POST['Telephone'];
$description = $_POST['Customer_Description'];
$username = $_POST['username'];
$password = $_POST['password'];

// รับค่าอื่นๆ ให้ครบตามฟอร์ม เช่น Gender, Age, Province, username, password...
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// คำสั่ง SQL สำหรับเพิ่มข้อมูล
$sql = "INSERT INTO customer (Customer_Name, Customer_Lastname, Gender, Birthdate, Address, Province, Zipcode, Telephone, Customer_Description, username, password) 
        VALUES ('$name', '$lastname', '$gender', '$birthdate', '$address', '$province', '$zipcode', '$telephone', '$description', '$username', '$hashed_password')";

if ($_POST['password'] !== $_POST['confirm_password']) {
    die("รหัสผ่านไม่ตรงกัน! <a href='javascript:history.back()'>ย้อนกลับ</a>");
}

if (mysqli_query($conn, $sql)) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว!";
    echo "<br><a href='show_customer.php'>กลับไปดูรายชื่อลูกค้า</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>