<?php
include("include/config.php");

// ดึงข้อมูลสินค้าและประเภทสินค้า
$sql = "SELECT * FROM product";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>My project</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo3.png" alt="">
        <h1 class="sitename">PLUB</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero" class="active">Home</a></li>

          <li><a href="login.php">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container">
        <h2 class="title">สินค้าแนะนำ</h2>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>รหัสประเภทสินค้า</th>
                <th>ราคาทุน</th>
                <th>ราคาขาย</th>
                <th>รูปภาพ</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product): ?>
                <tr>
                  <td><?= htmlspecialchars($product['pro_id']) ?></td>
                  <td><?= htmlspecialchars($product['pro_name']) ?></td>
                  <td><?= htmlspecialchars($product['cat_id']) ?></td>
                  <td><?= number_format($product['pro_price'], 2) ?></td>
                  <td><?= number_format($product['pro_cost'], 2) ?></td>
                  <td>
                    <?php if (!empty($product['pro_img'])): ?>
                      <!-- ใช้เส้นทางจาก pro_img -->
                      <img src="<?= htmlspecialchars($product['pro_img']) ?>" alt="<?= htmlspecialchars($product['pro_name']) ?>" style="width: 80px; height: auto;">
                    <?php else: ?>
                      <span>ไม่มีรูปภาพ</span>
                    <?php endif; ?>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>
      </div>
    </section>

    <style>
      /* จัดตำแหน่งและตกแต่ง container */
      .container {
        width: 90%;
        max-width: 1000px;
        margin: auto;
        text-align: center;
      }

      /* หัวข้อ */
      .title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
      }

      /* ตาราง */
      .table-container {
        overflow-x: auto;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
      }

      /* หัวตาราง */
      thead {
        background: #007bff;
        color: white;
      }

      th,
      td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
      }

      /* สลับสีพื้นหลังแถว */
      tbody tr:nth-child(odd) {
        background: #f8f9fa;
      }

      tbody tr:hover {
        background: #e9ecef;
      }

      /* รูปภาพสินค้า */
      td img {
        width: 50px;
        height: auto;
        border-radius: 5px;
        transition: transform 0.3s ease-in-out;
      }

      td img:hover {
        transform: scale(1.2);
      }

      /* ปรับให้แสดงผลบนมือถือได้ดี */
      @media screen and (max-width: 768px) {

        th,
        td {
          font-size: 14px;
          padding: 10px;
        }

        td img {
          width: 40px;
        }
      }
    </style>


  </main>

  <footer id="footer" class="footer position-relative light-background">



  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>