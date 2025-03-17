<?php
include("include/config.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SignUp Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color:rgb(118, 186, 255);
    }

    .container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: white;
    }
  </style>

</head>

<body>

  <div class="container">
    <h2 class="text-center">กรุณาเข้าสู่ระบบ</h2>
    <form action="checklogin.php" method="post">

      <div class="form-group">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required>
      </div>
      <div class="form-group">
        <label for="loginpassword">รหัสผ่าน:</label>
        <input type="password" class="form-control" id="loginpassword" placeholder="Enter password" name="loginpassword" required>
      </div>

      <div class="row">
        <div class="col text-center">ยังไม่ได้ลงทะเบียน ?</br><a href="signup.php">ลงทะเบียนที่นี่</a></div>
      </div>
      </br>

      <button type="submit" class="btn btn-success btn-block" name="login" id="login">Login</button>
      <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='index.php';">ย้อนกลับ</button>
    </form>
  </div>

</body>

</html>