<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); }
$conn = mysqli_connect("localhost", "root", "", "my_exam");

// ส่วนของการลบข้อมูล
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM customer WHERE id=$id");
    header("Location: show.php");
}

$result = mysqli_query($conn, "SELECT * FROM customer");
?>
ชื่อผู้ใช้: <?php echo $_SESSION['user']; ?> | <a href="login.php">Log out</a>
<hr>
<a href="add.php">เพิ่มข้อมูล</a>
<table border="1">
    <tr><th>ชื่อ-สกุล</th><th>อายุ</th><th>แก้ไข</th><th>ลบ</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?php echo $row['name']." ".$row['lastname']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><a href="edit.php?id=<?php echo $row['id']; ?>">แก้ไข</a></td>
        <td><a href="show.php?del=<?php echo $row['id']; ?>" onclick="return confirm('ยืนยัน?')">ลบ</a></td>
    </tr>
<?php } ?>       
</table>