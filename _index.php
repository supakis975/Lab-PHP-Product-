<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(174, 30, 236), rgb(148, 148, 148));
            background-size: cover;
            color: white;
            font-family: 'Roboto', sans-serif;
        }

        .img-fluid {
            border: 5px solid #4CAF50;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .img-fluid:hover {
            transform: scale(1.05);
        }

        .jumbotron {
            background-color: rgba(52, 152, 219, 0.8);
            color: white;
            padding: 30px;
        }

        .navbar {
            background-color: rgba(33, 46, 59, 0.9);
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #f39c12;
        }

        .container {
            margin-top: 30px;
        }

        .footer {
            background-color: rgba(52, 152, 219, 0.8);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .nav-pills .nav-link {
            background-color: #f39c12;
            color: white;
        }

        .nav-pills .nav-link:hover {
            background-color: #e67e22;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }
    </style>
</head>

<body>

    <div class="jumbotron text-center">
        <h1>ยินดีต้อนรับ ณัฐพงษ์ ธรรมสอน</h1>
        <h4>เพจนี้จัดทำขึ้นเพื่อหาคะแนนเท่านั้น</h4>
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="#">รายการเมนู</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">สมัครสมาชิก</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2>รูปภาพสวยๆ</h2>
                <img src="img/img1.jpg" alt="Your Image" class="img-fluid">
                <p>รูปภาพภายในบ้าน</p>
                <h3>ลิ้งค์อะไรไม่รู้ใส่ไปก่อน</h3>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">ลงทะเบียน</a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-8">
                <h2>รูปที่ 1</h2>
                <h5>จัดทำวันที่ 31 ธันวาคม 2567</h5>
                <img src="img/img2.png" alt="Your Image" class="img-fluid">
                <p>รูปภาพการ์ตูน</p>
                <br>
                <h2>รูปที่ 2</h2>
                <h5>จัดทำวันที่ 31 ธันวาคม 2567</h5>
                <img src="img/img3.jpg" alt="Your Image" class="img-fluid">
                <p>รูปภาพผู้หญิงกำลังนั่งมอง</p>
            </div>
        </div>


    </div>

    <div class="footer">
        <p>Footer หน้าหลัก</p>
    </div>

</body>

</html>