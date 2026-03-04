<?php
session_start();
// ถ้าไม่มี Session แปลว่าไม่ได้ล็อคอิน ให้ส่งกลับไปหน้า login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'connect.php';
?>
<div style="text-align: right;">
    ชื่อผู้ใช้: <strong><?php echo $_SESSION['full_name']; ?></strong> 
    | <a href="logout.php" style="color: red;">Log out</a>
</div>
<hr>

<?php include 'connect.php'; ?>
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