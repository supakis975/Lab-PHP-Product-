<?php
session_start();
include("../include/config.php");
error_reporting(0);

// รับค่าจากฟอร์ม
$pro_name = filter_input(INPUT_POST, 'pro_name', FILTER_SANITIZE_STRING);
$cat_id = filter_input(INPUT_POST, 'cat_id', FILTER_SANITIZE_STRING);
$pro_price = filter_input(INPUT_POST, 'pro_price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$pro_cost = filter_input(INPUT_POST, 'pro_cost', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$pro_id = filter_input(INPUT_POST, 'pro_id', FILTER_VALIDATE_INT);
$pro_img = filter_input(INPUT_POST, 'pro_img', FILTER_SANITIZE_URL);
$current_img = filter_input(INPUT_POST, 'current_img', FILTER_SANITIZE_URL);

// ถ้าไม่มีการอัปเดตรูป ใช้รูปเดิม
if (empty($pro_img)) {
    $pro_img = $current_img;
}

// ตรวจสอบข้อมูลก่อนอัปเดต
if ($pro_name && $cat_id && $pro_price && $pro_cost && $pro_id) {
    $sql = "UPDATE product 
            SET pro_name = :pro_name, cat_id = :cat_id, pro_price = :pro_price, 
                pro_cost = :pro_cost, pro_img = :pro_img 
            WHERE pro_id = :pro_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
    $query->bindParam(':cat_id', $cat_id, PDO::PARAM_STR);
    $query->bindParam(':pro_price', $pro_price, PDO::PARAM_STR);
    $query->bindParam(':pro_cost', $pro_cost, PDO::PARAM_STR);
    $query->bindParam(':pro_img', $pro_img, PDO::PARAM_STR);
    $query->bindParam(':pro_id', $pro_id, PDO::PARAM_INT);

    if ($query->execute()) {
        $_SESSION['msg'] = "อัพเดทสินค้าสำเร็จ!";
    } else {
        $_SESSION['msg'] = "เกิดข้อผิดพลาดในการอัพเดทสินค้า!";
    }
} else {
    $_SESSION['msg'] = "กรุณากรอกข้อมูลให้ครบถ้วน!";
}

// เปลี่ยนเส้นทางกลับไปยังหน้าจัดการสินค้า
header("Location: manage_category.php");
exit();
?>
