<?php
// เริ่มต้น session
session_start();
include("../include/config.php");

// ตรวจสอบว่ามีการส่ง ID มาใน URL หรือไม่
if(isset($_GET['did'])) {
    $user_id = $_GET['did'];
    
    // ตรวจสอบว่า ID ที่ส่งมามีค่าหรือไม่
    if (!empty($user_id)) {
        try {
            // สร้างคำสั่ง SQL เพื่อลบผู้ใช้ตาม ID
            $sql = "DELETE FROM userdata WHERE id = :user_id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            
            // ถ้าลบสำเร็จ
            if ($stmt->execute()) {
                // ส่งผลลัพธ์ว่า delete สำเร็จ
                echo json_encode(["status" => "success", "message" => "User deleted successfully."]);
            } else {
                // ถ้ามีข้อผิดพลาดในการลบ
                echo json_encode(["status" => "error", "message" => "Failed to delete user."]);
            }
        } catch (PDOException $e) {
            // ถ้าเกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล
            echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User ID is required."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User ID is not provided."]);
}
?>
