<?php
session_start();
include("../include/config.php");
error_reporting(0);
?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/adminlte.css" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <?php include("include/navbar.php"); ?>
        <?php include("include/sidebar.php"); ?>

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Manage User</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Manage User</h3>
                                </div>

                                <div class="card-body">
                                    <form action="edit-category-api.php" method="post">
                                        <?php
                                        $pro_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                                        $sql = "SELECT * FROM product WHERE pro_id = :pro_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':pro_id', $pro_id, PDO::PARAM_INT);
                                        $query->execute();
                                        $result = $query->fetch(PDO::FETCH_OBJ);

                                        if ($result) {
                                        ?>
                                            <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>">
                                            <input type="hidden" name="current_img" value="<?php echo htmlspecialchars($result->pro_img); ?>">

                                            <div class="form-group">
                                                <label for="pro_name">ชื่อสินค้า:</label>
                                                <input type="text" class="form-control" id="pro_name" name="pro_name" required value="<?php echo htmlspecialchars($result->pro_name); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="cat_id">ประเภทสินค้า:</label>
                                                <select name="cat_id" id="cat_id" class="form-control" required>
                                                    <option value="">-- กรุณาเลือกประเภทสินค้า --</option>
                                                    <option value="เฟอร์นิเจอร์" <?php echo ($result->cat_id == "เฟอร์นิเจอร์") ? "selected" : ""; ?>>เฟอร์นิเจอร์</option>
                                                    <option value="ของตกแต่ง" <?php echo ($result->cat_id == "ของตกแต่ง") ? "selected" : ""; ?>>ของตกแต่ง</option>
                                                    <option value="เครื่องมือ" <?php echo ($result->cat_id == "เครื่องมือ") ? "selected" : ""; ?>>เครื่องมือ</option>
                                                    <option value="เครื่องมือ" <?php echo ($result->cat_id == "สินค้า") ? "selected" : ""; ?>>สินค้า</option>
                                                    <option value="เครื่องมือ" <?php echo ($result->cat_id == "สินค้าทะเล") ? "selected" : ""; ?>>สินค้าทะเล</option>
                                                    <option value="เครื่องมือ" <?php echo ($result->cat_id == "ขนม") ? "selected" : ""; ?>>ขนม</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="pro_price">ราคาทุน:</label>
                                                <input type="number" step="0.01" class="form-control" id="pro_price" name="pro_price" required value="<?php echo $result->pro_price; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="pro_cost">ราคาขาย:</label>
                                                <input type="number" step="0.01" class="form-control" id="pro_cost" name="pro_cost" required value="<?php echo $result->pro_cost; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="pro_img">ลิงก์รูปภาพสินค้า:</label>
                                                <input type="text" class="form-control" name="pro_img" value="<?php echo htmlspecialchars($result->pro_img); ?>">
                                            </div>

                                            <button type="submit" class="btn btn-success btn-block" name="update">อัพเดท</button>
                                        <?php } else { ?>
                                            <p class="text-danger">ไม่พบข้อมูลสินค้า</p>
                                        <?php } ?>
                                    </form>
                                </div>

                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-end">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("include/footer.php"); ?>
    </div>
</body>

</html>
