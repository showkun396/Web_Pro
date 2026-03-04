<?php
include 'connect.php';

// --- ส่วนที่ 1: รับค่าเพื่อบันทึกข้อมูล (เมื่อกดปุ่ม Submit) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Customer_id']; // ต้องส่ง ID มาจากฟอร์มด้วย (ใน input hidden)
    $name = $_POST['Customer_Name'];
    $lastname = $_POST['Customer_Lastname'];
    $gender = $_POST['Gender'];
    // เติมตัวแปรที่ขาดให้ครบ
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'] - 543; // แปลง พ.ศ. เป็น ค.ศ.
    $birthdate = "$year-$month-$day";
    $address = $_POST['Address'];
    $province = $_POST['Province'];
    $zipcode = $_POST['Zipcode'];
    $telephone = $_POST['Telephone'];
    $description = $_POST['Customer_Description'];
    $username = $_POST['username'];

    $sql = "UPDATE customer SET 
            Customer_Name = '$name', 
            Customer_Lastname = '$lastname', 
            Gender = '$gender', 
            Birthdate = '$birthdate', 
            Address = '$address', 
            Province = '$province', 
            Zipcode = '$zipcode', 
            Telephone = '$telephone', 
            Customer_Description = '$description', 
            username = '$username' 
            WHERE Customer_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "แก้ไขข้อมูลเรียบร้อยแล้ว! <a href='show_customer.php'>กลับไปดูรายชื่อ</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    exit(); // จบการทำงาน ไม่ต้องแสดงฟอร์มซ้ำ
}

// --- ส่วนที่ 2: ดึงข้อมูลเก่ามาแสดง (เมื่อเข้าหน้านี้ครั้งแรกด้วย GET) ---
$id = $_GET['id'];
$sql = "SELECT * FROM customer WHERE Customer_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form action="" method="POST">
    <input type="hidden" name="Customer_id" value="<?php echo $row['Customer_id']; ?>">

    ชื่อ: <input type="text" name="Customer_Name" value="<?php echo $row['Customer_Name']; ?>"><br>
    นามสกุล: <input type="text" name="Customer_Lastname" value="<?php echo $row['Customer_Lastname']; ?>"><br>

    เพศ: 
    <input type="radio" name="Gender" value="ชาย" <?php if($row['Gender'] == 'ชาย') echo 'checked'; ?>> ชาย
    <input type="radio" name="Gender" value="หญิง" <?php if($row['Gender'] == 'หญิง') echo 'checked'; ?>> หญิง<br>

    วัน-เดือน-ปี เกิด:
    <?php
    // ป้องกัน Error กรณีข้อมูลในฐานข้อมูลเป็นค่าว่าง
    $birthdate = !empty($row['Birthdate']) ? $row['Birthdate'] : "01-01-2500";
    $dateParts = explode("-", $birthdate);
    $day = $dateParts[0]; $month = $dateParts[1]; $year = $dateParts[2];
    ?>

    <select name="day">
        <?php for ($i = 1; $i <= 31; $i++) {
            $d = sprintf("%02d", $i); 
            $selected = ($d == $day) ? "selected" : "";
            echo "<option value='$d' $selected>$d</option>";
        } ?>
    </select>

    <select name="month">
        <?php $months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
        foreach ($months as $m) {
            $selected = ($m == $month) ? "selected" : "";
            echo "<option value='$m' $selected>$m</option>";
        } ?>
    </select>

    <select name="year">
        <?php 
        // แปลงปีจากฐานข้อมูล (ค.ศ.) เป็น พ.ศ. 
        // สมมติว่า $dateParts[0] คือปี ค.ศ.
        $current_year_th = (int)$dateParts[0] + 543; 

        for ($y = 2500; $y <= 2570; $y++) {
            // เปรียบเทียบค่า $y (พ.ศ.) กับ $current_year_th
            $selected = ($y == $current_year_th) ? "selected" : "";
            echo "<option value='$y' $selected>$y</option>";
        } ?>
    </select>
    <br>
    ที่อยู่ : <input type="text" name="Address" style="width: 300px;" value="<?php echo $row['Address']; ?>">
    <br>

    จังหวัด:
    <select name="Province">
        <option value="เชียงใหม่" <?php if($row['Province'] == 'เชียงใหม่') echo 'selected'; ?>>เชียงใหม่</option>
        <option value="เชียงราย" <?php if($row['Province'] == 'เชียงราย') echo 'selected'; ?>>เชียงราย</option>
        <option value="น่าน" <?php if($row['Province'] == 'น่าน') echo 'selected'; ?>>น่าน</option>
        <option value="พะเยา" <?php if($row['Province'] == 'พะเยา') echo 'selected'; ?>>พะเยา</option>
        <option value="แพร่" <?php if($row['Province'] == 'แพร่') echo 'selected'; ?>>แพร่</option>
        <option value="แม่ฮ่องสอน" <?php if($row['Province'] == 'แม่ฮ่องสอน') echo 'selected'; ?>>แม่ฮ่องสอน</option>
        <option value="ลำปาง" <?php if($row['Province'] == 'ลำปาง') echo 'selected'; ?>>ลำปาง</option>
        <option value="ลำพูน" <?php if($row['Province'] == 'ลำพูน') echo 'selected'; ?>>ลำพูน</option>
        <option value="อุตรดิตถ์" <?php if($row['Province'] == 'อุตรดิตถ์') echo 'selected'; ?>>อุตรดิตถ์</option>
    </select><br>

    รหัสไปรษณีย์: <input type="text" name="Zipcode" value="<?php echo $row['Zipcode']; ?>" maxlength="5"><br>
    โทรศัพท์: <input type="text" name="Telephone" value="<?php echo $row['Telephone']; ?>"><br>

    Username: <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>

    รายละเอียด:
    <textarea name="Customer_Description"><?php echo $row['Customer_Description']; ?></textarea><br>

    <button type="submit">แก้ไขข้อมูลลูกค้า</button>
    <button type="reset">ยกเลิก</button>
</form>

