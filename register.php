<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل العملاء | شركة الفيصل للاستثمار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #00c6ff, #007bff);
            font-family: 'Arial', sans-serif;
            color: #fff;
            overflow-x: hidden;
        }

        .company-header {
            text-align: center;
            padding-top: 30px;
            padding-bottom: 20px;
        }

        .company-header h2 {
            font-size: 30px;
            font-weight: bold;
            color: #fff;
        }

        .company-header p {
            font-size: 18px;
            margin-top: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: bold;
        }

        .company-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        #registrationCard {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            animation: cardFadeIn 0.6s ease-out;
        }

        .btn-hover-effect {
            font-weight: bold;
            background: gold;
            border: none;
            color: black;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .btn-hover-effect:hover {
            transform: scale(1.05);
            background: yellow;
        }
    </style>
</head>
<body>
<?php

include 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger text-center'>عذرًا، لقد وصلت إلى هذه الصفحة عن طريق الخطأ.</div>";
    exit;
}

$id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM `barcodes` WHERE `get_link` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<div class='alert alert-danger text-center'>عذرًا، الكود الذي أدخلته غير صحيح.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $country = $conn->real_escape_string($_POST['country']);
    $region = $conn->real_escape_string($_POST['region']);
    $coupon = $conn->real_escape_string($_POST['coupon']);
    $store = $conn->real_escape_string($_POST['store']);

    if (empty($name) || empty($phone) || empty($country) || empty($region) || empty($coupon) || empty($store)) {
        echo "<div class='alert alert-danger text-center'>يرجى ملء جميع الحقول.</div>";
    } else {
        $sql2 = "SELECT * FROM coupons WHERE code = ? AND status != '1'";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s", $coupon);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            $sql3 = "INSERT INTO customers (name, phone, country, region, coupon , store) VALUES (?, ?, ?, ?, ? , ?)";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param("ssssss", $name, $phone, $country, $region, $coupon , $store);

            if ($stmt3->execute()) {
                $updateSql = "UPDATE coupons SET status = 1 WHERE code = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("s", $coupon);
                $updateStmt->execute();

                echo "<div class='alert alert-success text-center'>تم إضافة العميل بنجاح!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>حدث خطأ أثناء الإضافة.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>عذرًا، الكوبون غير صالح أو مستخدم مسبقًا.</div>";
        }

        $stmt2->close();
    }
}


?>
<div class="company-header">
    <h2>شركة الفيصل للاستثمار</h2>
    <p>اشترك الآن في سحب جوائز رائعة!</p>
</div>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card" id="registrationCard">
            <h3 class="text-center mb-4">تسجيل عميل جديد</h3>
            <?php
            $store_id = "";
            $barcode_query = "SELECT * FROM `barcodes` WHERE `get_link` LIKE '$id'"; 
            $barcode_result = mysqli_query($conn,$barcode_query);
            while ($barcode_row = mysqli_fetch_array($barcode_result)) {
                $store_id = $barcode_row['store_id'];
            }
            $conn->close();
            ?>
            <form method="POST">
                <div class="form-group mb-3">
                    <input type="text" id="store" name="store" value="<?php echo $store_id;  ?>" hidden>
                    <label for="name"><i class="fas fa-user"></i> الاسم الكامل</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="phone"><i class="fas fa-phone"></i> رقم الهاتف</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group mb-3">
                    <label for="country"><i class="fas fa-flag"></i> الدولة</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
                <div class="form-group mb-3">
                    <label for="region"><i class="fas fa-map-marker-alt"></i> المنطقة</label>
                    <input type="text" class="form-control" id="region" name="region" required>
                </div>
                <div class="form-group mb-3">
                    <label for="coupon"><i class="fas fa-gift"></i> رقم الكوبون</label>
                    <input type="text" class="form-control" id="coupon" name="coupon" required>
                </div>
                <button type="submit" class="btn-hover-effect">شارك في السحب</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
