<?php
include 'connect.php';
$id = $_GET['id']; // รับ ID มาจาก URL

$sql = "SELECT * FROM customer WHERE Customer_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); // ดึงข้อมูลออกมาเป็น Array
?>

<form action="update_customer.php" method="POST">
    <input type="hidden" name="Customer_id" value="<?php echo $row['Customer_id']; ?>">

    ชื่อ: <input type="text" name="Customer_Name" value="<?php echo $row['Customer_Name']; ?>"><br>
    
    เพศ: 
    <input type="radio" name="Gender" value="ชาย" <?php if($row['Gender'] == 'ชาย') echo 'checked'; ?>> ชาย
    <input type="radio" name="Gender" value="หญิง" <?php if($row['Gender'] == 'หญิง') echo 'checked'; ?>> หญิง<br>

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
    
    รายละเอียด:
    <textarea name="Customer_Description"><?php echo $row['Customer_Description']; ?></textarea><br>

    <button type="submit">แก้ไขข้อมูลลูกค้า</button>
</form>

<?php
include 'connect.php';

$id = $_POST['Customer_id'];
$name = $_POST['Customer_Name'];
$gender = $_POST['Gender'];
// รับค่าอื่นๆ...

$sql = "UPDATE customer SET 
        Customer_Name = '$name', 
        Gender = '$gender',
        ... 
        WHERE Customer_id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: show_customer.php"); // ถ้าสำเร็จ ให้เด้งกลับไปหน้าแสดงผล
} else {
    echo "Error: " . mysqli_error($conn);
}
?>