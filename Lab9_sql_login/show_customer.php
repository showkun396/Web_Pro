<?php
session_start();
// ถ้าไม่มี Session แปลว่าไม่ได้ล็อคอิน ให้ส่งกลับไปหน้า login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$conn = mysqli_connect("localhost", "root", "123", "mystore");
mysqli_set_charset($conn, "utf8");

if (!$conn) { die("Connection Failed: " . mysqli_connect_error()); }
?>

<style>
    body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; padding: 20px; }
    
    .user-info { text-align: right; margin-bottom: 10px; color: #333; }
    .user-info a { color: #e74c3c; text-decoration: none; font-weight: bold; }
    
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    th { background-color: #3498db; color: white; padding: 12px; text-align: left; }
    td { padding: 12px; border-bottom: 1px solid #ddd; }
    
    tr:hover { background-color: #f1f1f1; }
    
    .btn-add { display: inline-block; padding: 10px 15px; background: #2ecc71; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 10px; }
    .btn-add:hover { background: #27ae60; }
    
    .action-icon { font-size: 1.2em; text-decoration: none; }
</style>

<div style="user-info">
    ชื่อผู้ใช้: <strong><?php echo $_SESSION['full_name']; ?></strong> 
    | <a href="logout.php" style="color: red;">Log out</a>
</div>
<hr>

<?php 
    $conn = mysqli_connect("localhost", "root", "", "mystore");
    mysqli_set_charset($conn, "utf8");

    if (!$conn) { die("Connection Failed: " . mysqli_connect_error()); }
?>

<!DOCTYPE html>
<html>
    <boby>
        <h2>ข้อมูลลูกค้า</h2>
        <a href="add_customer.php"> + เพื่อข้อมูลลูกค้า</a>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>ชื่อ - สกุล</th>
                <th>จังหวัด</th>
                <th>โทรศัพท์</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
            <?php
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $row["Customer_id"] . "</td>";
                    echo "<td>" . $row["Customer_Name"] . " " . $row["Customer_Lastname"] . "</td>";
                    echo "<td>" . $row["Province"] . "</td>";
                    echo "<td>" . $row["Telephone"] . "</td>";
                    echo "<td><a href='edit_customer.php?id=".$row["Customer_id"]."'>✏️</a></td>";
                    echo "<td><a href='delete.php?id=".$row["Customer_id"]."'>🗑️</a></td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='6'>ไม่มีข้อมูล</td></tr>";
            }
            ?>
        </table>
    </boby>
</html>