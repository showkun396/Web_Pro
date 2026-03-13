<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
</head>
<body>
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <form action="" method="POST" id= "customerFrom">

    <label for="Customer_Name">ชื่อ :</label>
    <input type="text" id="Customer_Name" name="Customer_Name" required><br>

    <label for="Customer_Lastname">นามสกุล :</label>
    <input type="text" id="Customer_Lastname" name="Customer_Lastname" required><br>

    <label>เพศ :</label>
    <input type="radio"  id="gender_m" name="Gender" value="ชาย">  <label for="gender_m">ชาย</label>
    <input type="radio"  id="gender_f" name="Gender" value="หญิง"> <label for="gender_f">หญิง</label><br>

    <label for="Birthdate" >วัน-เดือน-ปี เกิด :</label>
    <input type="date" id="Birthdate" name="Birthdate"><br> 

    <label for="Address">ที่อยู่:</label>
    <input type="text"  id="Address" name="Address" style="width: 300px;"><br>
    
    <label for="Province" >จังหวัด :</label>
    <select id="Province" name="Province">
        <option value="">- เลือกจังหวัด -</option>
        <option value="เชียงราย">เชียงราย</option>
        <option value="เชียงใหม่">เชียงใหม่</option>
        <option value="น่าน">น่าน</option>
        <option value="พะเยา">พะเยา</option>
        <option value="แพร่">แพร่</option>
        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
        <option value="ลำปาง">ลำปาง</option>
        <option value="ลำพูน">ลำพูน</option>
        <option value="อุตรดิตถ์">อุตรดิตถ์</option>
    </select><br>

    <label for="Zipcode" >รหัสไปรษณีย์ :</label> 
    <input type="text" id="Zipcode" name="Zipcode" maxlength="5"><br>
    
    <label  for="Telephone" >โทรศัพท์ :</label> 
    <input type="tel" id="Telephone" name="Telephone"><br>
    
    <label for="Customer_Description">รายละเอียดอื่นๆ :</label><br>
    <textarea id="Customer_Description" name="Customer_Description" rows="4" cols="50"></textarea><br>

    <fieldset>
        <legend>Account ของลูกค้า</legend>
        <label for="username">Username :</label> 
        <input type="text" id="username" name="username" required><br>

       <label for="password"> Password :</label> 
       <input type="password" id="password" name="password" required><br>
        
       <label for="confirm_password" > Confirm Password :</label> 
       <input type="password" id="confirm_password" name="confirm_password" required><br>
    </fieldset>

    <br>
    <button type="submit">เพิ่มข้อมูลลูกค้า</button>
    <button type="reset">ยกเลิก</button>
</form>
    <script>
        document.getElementById('customerFrom').onsubmit = function(event){
                const pass = document.getElementById('password').value;
                const confirmPass = document.getElementById('confirm_password').value;

                const zip = document.getElementById('Zipcode').value;
                const phon = document.getElementById('Telephone').value;

                const name = document.getElementById('Customer_Name').value;
                const lastname = document.getElementById('Customer_Lastname').value;
                const Address = document.getElementById('Address').value;

            if (name&&lastname&&Address !== "" && !/^\d{5}$/.test(name&&lastname&&Address)) {
                alert("กรุณาใส่ข้อมูลให้ครบ");
                return false;
            }
            
                // ตรวจสอบรหัสผ่าน
            if (pass !== confirmPass) {
                alert("รหัสผ่านไม่ตรงกัน!");
                return false;
            }

                // ตรวจสอบรหัสไปรษณีย์ (ต้องเป็นตัวเลข 5 หลัก)
            if (zi !== "" && !/^\d{5}$/.test(zip)) {
                alert("รหัสไปรษณีย์ต้องเป็นตัวเลข 5 หลัก");
                return false;
            }

                // ตรวจสอบรหัสไปรษณีย์ (ต้องเป็นตัวเลข 5 หลัก)
            if (zi !== "" && !/^\d{5}$/.test(zip)) {
                alert("รหัสไปรษณีย์ต้องเป็นตัวเลข 5 หลัก");
                return false;
            }

            alert("ระบบบันทึกข้อมูลข้อคุณเรียบร้อย");
            return true;
        };     
    </script>
</body>
</html>