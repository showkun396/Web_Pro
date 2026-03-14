<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "my_exam");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE username='$user' AND password='$pass'");
    $row = mysqli_fetch_assoc($result);

    if ($row){
        $_SESSION['user'] = $row['name'] . "" . $row['lastname'];
        header("Location: show.php");
    }else{
        echo "Login Failed!";
    }
}
?>
<form method="POST">
    User: <input type="text" name="user">
    Pass: <input type="password" name="pass">
    <button type="submit">Login</button>
</form>