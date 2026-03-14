<?php
$conn = mysqli_connect("localhost", "root", "", "my_exam");
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id=$id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = $_POST['name']; $l = $_POST['last']; $a = $_POST['age'];
    
    mysqli_query($conn, "UPDATE customer SET name='$n', lastname='$l', age='$a' WHERE id=$id");
    header("Location: show.php");
}
?>
<form method="POST">
    ชื่อ: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    สกุล: <input type="text" name="last" value="<?php echo $row['lastname']; ?>"><br>
    อายุ: <input type="number" name="age" value="<?php echo $row['age']; ?>"><br>
    <button type="submit">อัพเดท</button>
</form>