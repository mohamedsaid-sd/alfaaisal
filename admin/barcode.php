<?php

require_once 'phpqrcode/qrlib.php';


include '../config.php';

$id = $_GET['id'];
// // تحقق من الاتصال
// if ($conn->connect_error) {
//     die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
// }

// إضافة باركود جديد
if(isset($_POST['createBarcode'])){
    $rnd          = rand(99, 9999);
    $text = "https://alfaaisal.com/register.php?id=$rnd";
    $path   = 'QRimages/';
    $qrcode = $path.time().$rnd.".png"; 
    QRcode:: png($text , $qrcode , 'H' , 4 , 4 );
    $barcode_code = "https://alfaaisal.com/register?id=$id&&brand=".$_POST['name']; // لتوليد باركود فريد
    $query = "INSERT INTO `barcodes` (`id`, `store_id`, `barcode`, `link`,  `get_link`, `create_at`) VALUES (NULL, '$id', '$qrcode' , '$text' , '$rnd' , CURRENT_TIMESTAMP);";
    $conn->query($query);
}

// استعلام لعرض الباركودات القديمة
$sql = "SELECT * FROM `barcodes` WHERE `store_id` LIKE '$id'";
$barcodes = $conn->query($sql);


// حذف باركود
if (isset($_GET['deleteBarcode'])) {
    $barcodeId = $_GET['deleteBarcode'];
    $deleteQuery = "DELETE FROM `barcodes` WHERE `id` = $barcodeId";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('تم حذف الباركود بنجاح'); window.location.href='barcode.php?id=$id';</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء حذف الباركود');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الباركود</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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

        table.dataTable thead {
            background-color: #87ceeb;
            color: white;
        }

        .action-buttons button {
            margin: 0 2px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Content -->
    <div class="container mt-4">
        <!-- Button to Open Modal for Creating Barcode -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createBarcodeModal">إنشاء باركود جديد</button>

        <!-- Modal for Creating Barcode -->
        <div class="modal fade" id="createBarcodeModal" tabindex="-1" aria-labelledby="createBarcodeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBarcodeModalLabel">إنشاء باركود جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="barcode.php?id=<?php echo $_GET['id']; ?>">
                            <div class="col-md-12">
                                    <label for="storeName" class="form-label"> ما اسم المنتج الذي ستقوم بعمل باركود له  </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="أدخل المنتج " required>
                                </div>
                            <button type="submit" name="createBarcode" class="btn btn-primary">إنشاء باركود</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table to Display Old Barcodes -->
        <div class="table-responsive">
            <table id="barcodesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="text-align: right;">الباركود</th>
                        <th style="text-align: right;">عدد الكوبونات</th>
                        <th style="text-align: right;">الكوبونات المستخدمة</th>
                        <th style="text-align: right;">الكوبونات النشطة</th>
                        <th style="text-align: right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 


                    include '../config.php';

                    $sum_total = 0;
                    $sum_used = 0;
                    $sum_unused = 0;

                    while ($barcode = $barcodes->fetch_assoc()): 

                    
                    $id = $barcode['id'];
                            // حساب العدد الكلي للكوبونات
                    $sql_total_coupons = "SELECT COUNT(*) AS total_coupons FROM coupons WHERE `barcode` LIKE '$id' ";
                    $result_total = mysqli_query($conn, $sql_total_coupons);
                    $row_total = mysqli_fetch_assoc($result_total);
                    $total_coupons = $row_total['total_coupons'];

                    // حساب العدد الكلي للكوبونات
                    $sql_used_coupons = "SELECT COUNT(*) AS total_coupons FROM coupons WHERE `barcode` LIKE '$id' AND `status` LIKE '1' ";
                    $result_used = mysqli_query($conn, $sql_used_coupons);
                    $row_used = mysqli_fetch_assoc($result_used);
                    $total_used = $row_used['total_coupons'];

                    // حساب العدد الكلي للكوبونات
                    $sql_unused_coupons = "SELECT COUNT(*) AS total_coupons FROM coupons WHERE `barcode` LIKE '$id' AND `status` LIKE '0' ";
                    $result_unused = mysqli_query($conn, $sql_unused_coupons);
                    $row_unused = mysqli_fetch_assoc($result_unused);
                    $total_unused = $row_unused['total_coupons'];
                        
                    
                    ?>

                        <tr>
                            <td><?php echo $barcode['id']; ?></td>
                            <td> <a href="<?php echo $barcode['barcode']; ?>"><img src="<?php echo $barcode['barcode']; ?>" width="50"></a>
                            <span style="text-decoration: underline;"><?php echo $barcode['link']; ?></span> <br/> انشئ في : <?php echo $barcode['create_at']; ?>  </td>
                            <td>
                                <?php 
                                $sum_total += $total_coupons ;
                                echo $total_coupons; ?>
                            </td>
                            <td>
                                <?php 
                                $sum_used += $total_used ;
                                echo $total_used; ?>
                            </td>
                            <td>
                                <?php echo $total_unused; ?>
                            </td>
                            <td>
                                <a href="coupon.php?barcode_id=<?php echo $barcode['id']; ?>"><button class="btn btn-sm btn-success">إنشاء كوبونات جديدة</button></a>
                                <a href="barcode.php?id=<?php echo $id; ?>&deleteBarcode=<?php echo $barcode['id']; ?>"><button class="btn btn-sm btn-danger">حذف</button></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td> المجموع </td>
                        <td>  </td>
                        <td> <?php echo $sum_total; ?> </td>
                        <td> <?php echo $sum_used; ?>  </td>
                        <td>  </td>
                        <td>  </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // Initialize DataTable
        $(document).ready(function () {
            $('#barcodesTable').DataTable();
        });
    </script>
</body>
</html>
