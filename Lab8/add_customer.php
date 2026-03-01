<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
</head>
<boby>
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <form action="insert_customer.php" method="POST">
    <label>ชื่อ :</label> <input type="text" name="Customer_Name" required><br>
    <label>นามสกุล :</label> <input type="text" name="Customer_Lastname" required><br>

    <lable>เพศ :</lable>
    <input type="radio" name="Gender" value="ชาย">ชาย
    <input type="radio" name="Gender" value="หญิง">หญิง <br>

    <lable>วัน-เดือน-ปี เกิด :</lable>
    <input type="date" name="Birthdate"><br> <lable>ที่อยู่:</lable> <input type="text" name="Address" style="width: 300px;"><br>

    <lable>จังหวัด :</lable>
    <select name="Province">
        <option valur="">- เลื่อกจังหวัด -</option>
        <option valur="เชียงใหม่">เชียงใหม่</option>
        <option valur="ลำปาง">ลำปาง</option>
    </select><br>

    <lable>รหัสไปรษณีย์ :</lable> <input type="text" name="Zipcode" maxlength="5"><br>
    <lable>โทรศัพท์ :</lable> <input type="text" name="Telephone"><br>

    <lable>รายละเอียดอื่นๆ :</lable><br>
    <textarea name="Customer_Description" row="4" cols="50"></textarea><br>

    <fieldset>
        <legend>Account ของลูกค้า</legend>
        <lable>Username :</lable> <input type="text" name="username" required><br>
        <lable>Password :</lable> <input type="password" name="password" required><br>
        <label>Confirm Password :</label> <input type="password" name="confirm_password" required><br>
    </fieldset>

    <br>
    <button type="submit">เพิ่มข้อมูลลูกค้า</button>
    <button type="reset">ยกเลิก</button>
</form>
</boby>
</html>


<?php
include 'connect.php'; // เรียกใช้ไฟล์เชื่อมต่อที่เราทำไว้ก่อนหน้า

// รับค่าจากฟอร์ม
$name = $_POST['Customer_Name'];
$lastname = $_POST['Customer_Lastname'];
// รับค่าอื่นๆ ให้ครบตามฟอร์ม เช่น Gender, Age, Province, username, password...

// คำสั่ง SQL สำหรับเพิ่มข้อมูล
$sql = "INSERT INTO customer (Customer_Name, Customer_Lastname, Province, Telephone) 
        VALUES ('$name', '$lastname', '$province', '$telephone')";

if (mysqli_query($conn, $sql)) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว!";
    echo "<br><a href='show_customer.php'>กลับไปดูรายชื่อลูกค้า</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>