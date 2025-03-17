<?php
// เชื่อมต่อฐานข้อมูล
$host = 'localhost'; // ชื่อโฮสต์ของฐานข้อมูล
$dbname = 'myproject'; // ชื่อฐานข้อมูล
$username = 'root'; // ชื่อผู้ใช้
$password = ''; // รหัสผ่าน

try {
    // สร้างการเชื่อมต่อ PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// ตรวจสอบว่ามีการส่งข้อมูลฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากฟอร์ม
    $pro_name = $_POST['pro_name'];
    $cat_id = $_POST['cat_id'];
    $pro_price = $_POST['pro_price'];
    $pro_cost = $_POST['pro_cost'];
    $pro_img = $_POST['pro_img'];

    // คำสั่ง SQL สำหรับเพิ่มสินค้า
    $sql = "INSERT INTO product (pro_name, cat_id, pro_price, pro_cost, pro_img) 
            VALUES (?, ?, ?, ?, ?)";

    // เตรียมคำสั่ง SQL และรันการเพิ่มข้อมูล
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$pro_name, $cat_id, $pro_price, $pro_cost, $pro_img]);

    // รีไดเร็กต์ไปยังหน้าหลักหรือหน้าจัดการสินค้า
    header('Location: manage_category.php');
    exit;
}

// ดึงข้อมูลประเภทสินค้าจากฐานข้อมูลเพื่อนำไปแสดงในฟอร์ม
$sql = "SELECT * FROM product";  // เปลี่ยนจาก product เป็น category
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group select {
            width: calc(100% - 22px);
            /* Adjust width to fit padding */
        }

        .form-group input[type="text"] {
            width: calc(100% - 22px);
            /* Adjust width to fit padding */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>เพิ่มสินค้าใหม่</h1>

        <form action="add-category.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pro_name">ชื่อสินค้า:</label>
                <input type="text" name="pro_name" required>
            </div>

            <div class="form-group">
                <label for="cat_id">ประเภทสินค้า:</label>
                <select name="cat_id" id="cat_id" class="form-control" required>
                    <option value="">-- กรุณาเลือกประเภทสินค้า --</option>
                    <option value="เฟอร์นิเจอร์">เฟอร์นิเจอร์</option>
                    <option value="ของตกแต่ง">ของตกแต่ง</option>
                    <option value="เครื่องมือ">เครื่องมือ</option>
                    <option value="สินค้า">สินค้า</option>
                    <option value="สินค้าทะเล">สินค้าทะเล</option>
                    <option value="ขนม">ขนม</option>
                </select>
            </div>



            <div class="form-group">
                <label for="pro_price">ราคาทุน:</label>
                <input type="number" name="pro_price" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="pro_cost">ราคาขาย:</label>
                <input type="number" name="pro_cost" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="pro_img">ลิงก์รูปภาพสินค้า:</label>
                <input type="text" name="pro_img" required>
            </div>

            <button type="submit">เพิ่มสินค้า</button>
        </form>
    </div>
</body>

</html>