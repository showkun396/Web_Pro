<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab7 - Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Personal Information</h1>
    <form action="Lab7_67543206018-3.php" method="POST">
        <fieldset>
            <legend>Personal Info</legend>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname">

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname"><br><br>

            <label>Birth:</label>
            <select name="day">
                <?php for($i=1;$i<=31;$i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
            <select name="month">
                <?php 
                $m_arr = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
                foreach($m_arr as $m) echo "<option value='$m'>$m</option>";
                ?>
            </select>
            <input type="text" name="year" placeholder="พ.ศ." size="5">
        </fieldset>

        <br>

        <fieldset>
            <legend>Account Info</legend>
            <label>Username:</label> <input type="text" name="User"><br><br>
            <label>Password:</label> <input type="password" name="pwd"><br><br>
            <label>Confirm Password:</label> <input type="password" name="cpwd"><br><br>
            <label>Email:</label> <input type="email" name="email"><br><br>

            <input type="checkbox" name="agree" value="yes"> I agree to the Terms of Service and Privacy Policy.
        </fieldset>

        <br>

        <fieldset>
            <legend>Your Favorites</legend>
            คุณอยู่ภาคอะไร :
            <select name="region">
                <option value="เหนือ">ภาคเหนือ</option>
                <option value="กลาง">ภาคกลาง</option>
                <option value="อีสาน">ภาคตะวันออกเฉียงเหนือ</option>
                <option value="ใต้">ภาคใต้</option>
            </select>
        </fieldset>

        <div style="margin-top: 20px;">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>

        <style>
            /* ===============================
   Reset & Base
   =============================== */
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, sans-serif;
}

body {
    background: #e0f4f8;
    margin: 0;
    padding: 40px;
}

/* ===============================
   Heading
   =============================== */
h1 {
    text-align: center;
    color: #202a33;
    margin-bottom: 30px;
    background: #85afee;  
    
}

legend {
    padding: 0 10px;
    font-weight: bold;
    color: #2c9de9;
}


/* focus effect */
input:focus,
select:focus,
textarea:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 5px rgba(52,152,219,0.4);
}



/* ===============================
   File input
   =============================== */
input[type="file"] {
    margin-top: 10px;
}

/* ===============================
   Buttons
   =============================== */
input[type="submit"],
input[type="reset"],
input[type="button"] {
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

/* reset */
input[type="submit"] {
    background: #db3434;
    color: #fff;
}

/* sumid */
input[type="reset"] {
    background: #72e75b;
    color: #fff;
    margin-left: 10px;
}

/* finish */
#Finich {
    background: #2e80cc;
    color: #fff;
}

/* hover effect */
input[type="submit"]:hover {
    background: #2980b9;
}

input[type="reset"]:hover {
    background: #c0392b;
}

#Finich:hover {
    background: #27ae60;
}
        </style>
    </form>
</body>
</html>