<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
</head>
<body>
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <form action="" method="POST" id="customerForm">

    <label for="Customer_Name">ชื่อ :</label>
    <input type="text" id="Customer_Name" onblur="checkMinLength(this, 3)" name="Customer_Name" required><br>

    <label for="Customer_Lastname">นามสกุล :</label>
    <input type="text" id="Customer_Lastname" onblur="checkMinLength(this, 3)" name="Customer_Lastname" required><br>

    <label>เพศ :</label>
    <input type="radio" id="gender_m" name="Gender" value="ชาย"> <label for="gender_m">ชาย</label>
    <input type="radio" id="gender_f" name="Gender" value="หญิง"> <label for="gender_f">หญิง</label><br>

    <label for="Birthdate">วัน-เดือน-ปี เกิด :</label>
    <input type="date" id="Birthdate" name="Birthdate"><br> 

    <label for="Address">ที่อยู่:</label>
    <input type="text" id="Address" onblur="checkMinLength(this, 3)" style="width: 300px;"><br>
    
    <label for="Province">จังหวัด :</label>
    <select id="Province" name="Province">
        <option value="">- เลือกจังหวัด -</option>
        <option value="เชียงราย">เชียงราย</option>
        <option value="เชียงใหม่">เชียงใหม่</option>
        </select><br>

    <label for="Zipcode">รหัสไปรษณีย์ :</label> 
    <input type="text" id="Zipcode" onkeyup="checkIsNumber(this)" onblur="checkExactLength(this, 5)"><br>
    
    <label for="Telephone">โทรศัพท์ :</label> 
    <input type="tel" id="Telephone" onkeyup="checkIsNumber(this)" onblur="checkExactLength(this, 10)"><br>
    
    <label for="Customer_Description">รายละเอียดอื่นๆ :</label><br>
    <textarea id="Customer_Description" name="Customer_Description" rows="4" cols="50"></textarea><br>

    <fieldset>
        <legend>Account ของลูกค้า</legend>
        <label for="username">Username :</label> 
        <input type="text" id="username" onblur="checkMinLength(this, 5)" required><br>

       <label for="password"> Password :</label> 
       <input type="password" id="password" onblur="checkMinLength(this, 8)" required><br>
       
       <label for="confirm_password"> Confirm Password :</label> 
       <input type="password" id="confirm_password" name="confirm_password" required><br>
    </fieldset>

    <br>
    <button type="submit">เพิ่มข้อมูลลูกค้า</button>
    <button type="reset">ยกเลิก</button>
</form>

<script>
    // --- 1. ตรวจสอบความยาวขั้นต่ำ (ชื่อ, สกุล, ที่อยู่, User, Pass) ---
    function checkMinLength(input, min) {
        let value = input.value.trim();
        // หากมีการกรอกข้อมูล (length > 0) แต่ไม่ครบตามกำหนด [cite: 4, 7, 9]
        if (value.length > 0 && value.length < min) {
            alert("กรุณาใส่ข้อมูลให้ครบ (อย่างน้อย " + min + " ตัวอักษร)"); [cite: 5, 8, 10]
        }
    }

    // --- 2. ตรวจสอบว่าเป็นตัวเลขเท่านั้นขณะพิมพ์ (Onkeyup) ---
    function checkIsNumber(input) {
        let pattern = /^[0-9]*$/;
        if (!pattern.test(input.value)) {
            alert("กรุณาใส่ตัวเลข"); [cite: 6]
            input.value = input.value.replace(/\D/g, ''); // ลบตัวอักษรที่ไม่ใช่ตัวเลขทิ้งทันที
        }
    }

    // --- 3. ตรวจสอบจำนวนหลัก (รหัสไปรษณีย์ 5, โทรศัพท์ 10) ---
    function checkExactLength(input, target) {
        let value = input.value.trim();
        if (value.length > 0 && value.length < target) {
            alert("กรุณาใส่ข้อมูลให้ครบ"); [cite: 6]
        }
    }

    // --- 4. ตรวจสอบก่อนส่งข้อมูล (Submit) ---
    document.getElementById('customerForm').onsubmit = function() {
        const pass = document.getElementById('password').value;
        const confirmPass = document.getElementById('confirm_password').value;

        // เพิ่มการตรวจสอบเบื้องต้นว่ารหัสผ่านตรงกันหรือไม่
        if (pass !== confirmPass) {
            alert("รหัสผ่านไม่ตรงกัน!");
            return false;
        }

        alert("ระบบบันทึกข้อมูลของคุณเรียบร้อย");
        return true;
    };
</script>
</body>
</html>