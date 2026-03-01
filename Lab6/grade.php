<?php
/**
 * Grade.php
 * 
 * @author Poomrapee Kawanna
 */

$score = 70;

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบตัดเกรด</title>
</head>
<?php
    $score = "";
    $grade = "";
    $color = "#ffffff"; // สีขาวเป็นค่าเริ่มต้น

    if (isset($_POST['submit'])) {
        $score = $_POST['score'];

        if ($score >= 80) {
            $grade = "A";
            $color = "#2ecc71"; 
        }elseif ($score >= 75) {
            $grade = "B+";
            $color = "#2ecc71"; 
        }
        elseif ($score >= 70) {
            $grade = "B";
            $color = "#2ecc71"; 
        }
        elseif ($score >= 65) {
            $grade = "C+";
            $color = "#f1c40f"; 
        }
         elseif ($score >= 60) {
            $grade = "C";
            $color = "#f1c40f"; 
        } elseif ($score >= 55) {
            $grade = "D+";
            $color = "#f1c40f"; 
        } elseif ($score >= 50) {
            $grade = "D";
            $color = "#f1c40f"; 
        } else {
            $grade = "F";
            $color = "#dd2e1b"; 
        }
    }
?>
<body style="background-color: <?php echo $color; ?>; transition: 0.5s;">

    <div style="background: white; padding: 20px; width: 300px; margin: 50px auto; border-radius: 10px; text-align: center; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
        <h2>คำนวณเกรด</h2>
        <form method="post">
            <input type="number" name="score" placeholder="กรอกคะแนน (0-100)" value="<?php echo $score; ?>" required style="padding: 10px; width: 80%;">
            <br><br>
            <button type="submit" name="submit" style="padding: 10px 20px; cursor: pointer;">ดูผลลัพธ์</button>
        </form>

        <?php if ($grade != ""): ?>
            <hr>
            <h3>คะแนน: <?php echo $score; ?></h3>
            <h1>เกรด: <?php echo $grade; ?></h1>
        <?php endif; ?>
    </div>

</body>
</html>