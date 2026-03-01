<?php
    $number = 18; // กำหนดแม่สูตรคูณที่ต้องการ

    echo "<h3>แม่สูตรคูณแม่ $number</h3>";
    
    // ใช้ for loop วนรอบ 1 ถึง 12
    for ($i = 1; $i <= 12; $i++) {
        $result = $number * $i;
        echo "$number x $i = $result <br>";
    }
?>