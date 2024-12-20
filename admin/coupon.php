<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة إنشاء الكوبونات</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .navbar {
            background: linear-gradient(90deg, #007bff, #00c6ff);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: gold;
        }
        .form-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .stats-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
            text-align: center;
        }
        .stats-card .icon {
            font-size: 40px;
            color: #1188eb;
            margin-bottom: 10px;
        }
        .stats-card h4 {
            font-size: 18px;
            margin: 10px 0;
        }
        .stats-card p {
            font-size: 16px;
            color: #555;
        }
        @media (max-width: 768px) {
            .stats-card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>



<?php

include 'navbar.php';

include '../config.php';

// معالجة النموذج عند الإرسال
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // الحصول على عدد الكوبونات من النموذج
    $couponCount = intval($_POST['barcodeCount']);
    $barcode_id = intval($_GET['barcode_id']);

    // التحقق من صحة البيانات
    if ($couponCount > 0 && $barcode_id > 0) {
        for ($i = 0; $i < $couponCount; $i++) {
            // توليد كود عشوائي فريد
            do {
                $randomCode = bin2hex(openssl_random_pseudo_bytes(5)); 
                $checkQuery = "SELECT COUNT(*) AS count FROM coupons WHERE code = '$randomCode'";
                $result = $conn->query($checkQuery);
                $row = $result->fetch_assoc();
            } while ($row['count'] > 0);

            // إدخال الكوبون في قاعدة البيانات
            $insertQuery = "INSERT INTO coupons (barcode, code, status, created_at)
                            VALUES ($barcode_id, '$randomCode', '0', NOW())";
            $conn->query($insertQuery);
        }
        echo "<script>alert('تم إنشاء $couponCount كوبون بنجاح!');</script>";
    } else {
        echo "<script>alert('تأكد من إدخال عدد صحيح من الكوبونات!');</script>";
    }
}
?>

<div class="container mt-4">
    <!-- Form Section -->
    <div class="form-section">
        <form id="generateBarcodeForm" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-3">إنشاء كوبونات جديدة</h4>
                    <label for="barcodeCount" class="form-label">عدد الكوبونات</label>
                    <input type="number" class="form-control" id="barcodeCount" name="barcodeCount" placeholder="أدخل العدد" min="1" required>
                </div>
                <div class="col-md-6">
                    <center style="float: left;">
                        <?php 
                        $id = intval($_GET['barcode_id']);
                        $sql_barcodes = "SELECT * FROM `barcodes` WHERE `id` = $id";
                        $result_barcodes = mysqli_query($conn, $sql_barcodes);
                        while ($barcode_row = mysqli_fetch_array($result_barcodes)) {
                            $store_name = "";
                            $store_id = $barcode_row['store_id'];
                            $sql_stores = "SELECT * FROM `stores` WHERE `id` = $store_id";
                            $result_stores = mysqli_query($conn, $sql_stores);
                            while ($store_row = mysqli_fetch_array($result_stores)) {
                                $store_name = $store_row['name'];
                            }
                        ?>
                        <h3><?php echo $store_name; ?></h3>
                        <img src="<?php echo $barcode_row['barcode'] ?>" width="100">
                        <?php } ?><br/>
                    </center>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">إنشاء كوبونات</button>
        </form>
           <a href="print.php?id=<?php echo $_GET['barcode_id']; ?>"><button style="float: left;margin-top: -50px;margin-left: 25px;" class="btn btn-success"> طباعة </button></a>
    </div>

        <!-- Statistics Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="icon">
                        <i class="fas fa-barcode"></i>
                    </div>
                    <h4>عدد الكوبونات الكلي</h4>
                    <p>
                        
                        <?php
                        // حساب العدد الكلي للكوبونات
                        $sql_total_coupons = "SELECT COUNT(*) AS total_coupons FROM coupons WHERE `barcode` LIKE '$id' ";
                        $result_total = mysqli_query($conn, $sql_total_coupons);
                        $row_total = mysqli_fetch_assoc($result_total);
                        $total_coupons = $row_total['total_coupons'];
                        echo $total_coupons;
                        ?>

                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>الكوبونات المستخدمة</h4>
                    <p>
                        <?php
                        // حساب العدد الكلي للكوبونات
                        $sql_total_coupons = "SELECT COUNT(*) AS total_coupons FROM coupons WHERE `barcode` LIKE '$id' AND `status` LIKE '1' ";
                        $result_total = mysqli_query($conn, $sql_total_coupons);
                        $row_total = mysqli_fetch_assoc($result_total);
                        $total_coupons = $row_total['total_coupons'];
                        echo $total_coupons;
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">

                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>الكوبونات المتبقية</h4>
                    <p>
                        <?php
                        // حساب العدد الكلي للكوبونات
                        $sql_total_coupons = "SELECT COUNT(*) AS total_coupons FROM coupons WHERE `barcode` LIKE '$id' AND `status` LIKE '0' ";
                        $result_total = mysqli_query($conn, $sql_total_coupons);
                        $row_total = mysqli_fetch_assoc($result_total);
                        $total_coupons = $row_total['total_coupons'];
                        echo $total_coupons;
                        ?>
                    </p>

                </div>
            </div>
        </div>
    </div>

</div>



<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
