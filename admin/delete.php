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
 
// ตรวจสอบว่า pro_id ถูกส่งมาหรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    // คำสั่ง SQL สำหรับลบข้อมูล
    $sql = "DELETE FROM product WHERE pro_id = ?"; // ใช้ pro_id แทน id
   
    // เตรียมคำสั่ง SQL และรันการลบ
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
 
    // รีไดเร็กต์ไปยังหน้าที่ต้องการหลังจากลบเสร็จ
    header('Location: manage_category.php');
    exit;
}
?>