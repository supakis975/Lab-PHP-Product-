<?php
include("include/config.php");
error_reporting(0);
$message = "";

if (isset($_POST['signup'])) {
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['useremail'];
  $mobile = $_POST['usermobile'];
  $password = $_POST['loginpassword'];
  $hasedpassword = hash('sha256', $password);

  $ret = "SELECT * FROM userdata WHERE (username=:uname || useremail=:uemail)";
  $queryt = $dbh->prepare($ret);
  $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
  $queryt->bindParam(':uemail', $email, PDO::PARAM_STR);
  $queryt->execute();
  $results = $queryt->fetchAll(PDO::FETCH_OBJ);

  if ($queryt->rowCount() == 0) {
    $sql = "INSERT INTO userdata(fullname,username,useremail,usermobile,loginpassword) VALUES (:fname,:uname,:uemail,:umobile,:upass)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':uname', $username, PDO::PARAM_STR);
    $query->bindParam(':uemail', $email, PDO::PARAM_STR);
    $query->bindParam(':umobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':upass', $hasedpassword, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      $message = "<div class='alert alert-success'>สมัครสมาชิกสำเร็จ!</div>";
    } else {
      $message = "<div class='alert alert-danger'>เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!</div>";
    }
  } else {
    $message = "<div class='alert alert-warning'>ชื่อผู้ใช้หรืออีเมลนี้มีอยู่แล้ว กรุณาใช้ข้อมูลอื่น!</div>";
  }
}
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
    <h2 class="text-center">สมัครสมาชิก</h2>

    <?php echo $message; ?>

    <form action="#" method="post">
      <div class="form-group">
        <label for="fullname">ชื่อ-นามสกุล:</label>
        <input type="text" class="form-control" id="fullname" placeholder="Enter FullName" name="fullname" required>
      </div>
      <div class="form-group">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required>
      </div>
      <div class="form-group">
        <label for="useremail">อีเมล:</label>
        <input type="email" class="form-control" id="useremail" placeholder="Enter Email" name="useremail" required>
      </div>
      <div class="form-group">
        <label for="usermobile">เบอร์โทรศัพท์:</label>
        <input type="text" maxlength="10" pattern="[0-9]{10}" title="ตัวเลขสิบหลักเท่านั้น" class="form-control" id="usermobile" placeholder="Enter Mobile" name="usermobile" required>
      </div>
      <div class="form-group">
        <label for="loginpassword">รหัสผ่าน:</label>
        <input type="password" class="form-control" id="loginpassword" placeholder="Enter password" name="loginpassword" required>
      </div>
      <button type="submit" class="btn btn-success btn-block" name="signup" id="signup">ยืนยันสมัครสมาชิก</button>
      <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='index.php';">ย้อนกลับ</button>

    </form>
  </div>

</body>

</html>