<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $surname = isset($_POST['surname']) ? $_POST['surname'] : '';

    $content = "My name is " . $name . "\r\n";
    $content .= "My surname is " . $surname;

    $filename = "myfile.txt";

    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($content));

    echo $content;
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP Save to Text File</title>
    <style>
        body { font-family: sans-serif; margin: 50px; line-height: 1.6; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 80px; }
    </style>
</head>
<body>

    <h2>กรอกข้อมูลและบันทึกไฟล์</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        
        <div class="form-group">
            <label>Surname:</label>
            <input type="text" name="surname" required>
        </div>

        <button type="submit" name="save">Save&Download as Text File</button>
    </form>

</body>
</html>