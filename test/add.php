<?php
$conn = mysqli_connect("localhost", "root", "", "my_exam");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST['name']; $l = $_POST['last']; $a = $_POST['age'];
    
    mysqli_query($conn, "INSERT INTO customer (name, lastname, age) VALUES ('$n', '$l', '$a')");
    header("Location: show.php");
}
?>
<script>
function check(input) {
    if (input.value.length > 0 && input.value.length < 3) {
        alert("กรุณาใส่ข้อมูลให้ครบ (3 ตัวอักษรขึ้นไป)");
        input.focus();
    }
}
</script>
<form method="POST">
    ชื่อ: <input type="text" name="name" onblur="check(this)" required><br>
    สกุล: <input type="text" name="last" onblur="check(this)" required><br>
    อายุ: <input type="number" name="age" required><br>
    <button type="submit">บันทึก</button>
</form>