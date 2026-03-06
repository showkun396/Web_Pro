<?php
$conn = mysqli_connect("localhost", "root", "123", "mystore");
mysqli_set_charset($conn, "utf8");

if (!$conn) { die("Connection Failed: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>

    <style>
        /* จัด Layout ทั่วไป */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 { text-align: center; color: #333; }

        /* จัดระเบียบแต่ละฟิลด์ */
        .form-group { margin-bottom: 15px; }
        
        label { display: block; font-weight: bold; margin-bottom: 5px; }

        input[type="text"], input[type="password"], input[type="date"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* สำคัญมาก เพื่อไม่ให้ padding เกินขอบ */
        }

        /* ปรับแต่ง fieldset */
        fieldset {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* ปุ่มกด */
        .btn-group { display: flex; gap: 10px; }
        button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"] { background-color: #28a745; color: white; }
        button[type="submit"]:hover { background-color: #218838; }
        button[type="reset"] { background-color: #dc3545; color: white; }
        button[type="reset"]:hover { background-color: #c82333; }
    </style>

</head>
<body>
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <form action="" method="POST">
    <label>ชื่อ :</label> <input type="text" name="Customer_Name" required><br>
    <label>นามสกุล :</label> <input type="text" name="Customer_Lastname" required><br>

    <label>เพศ :</label>
    <input type="radio" name="Gender" value="ชาย">ชาย
    <input type="radio" name="Gender" value="หญิง">หญิง <br>

    <label>วัน-เดือน-ปี เกิด :</label>
    <input type="date" name="Birthdate"><br> 
    <label>ที่อยู่:</label> <input type="text" name="Address" style="width: 300px;"><br>

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