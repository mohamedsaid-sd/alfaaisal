<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> صفحة المستخدمين </title>
    <!-- Bootstrap CSS -->
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
    
    <?php include 'navbar.php'; ?>

    <?php 
    
    
include '../config.php';
$id = $_GET['id'];
    ?>

    <!-- Content -->
    <div class="container mt-4">
 
        <!-- DataTable Section -->
        <div class="table-responsive">
            <table id="storesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="text-align: right;">اسم المستخدم</th>
                        <th style="text-align: right;"> رقم الهاتف </th>
                        <th style="text-align: right;"> الدولة </th>
                         <th style="text-align: right;"> المنطقة </th>
                          <th style="text-align: right;"> الكوبون </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM customers WHERE store LIKE '$id' ";
                    $result = $conn->query($sql);
                    $i = 1;
                    while($row = $result->fetch_assoc()) {

                        $store_id = $row['id'];
                        $sql_barcodes = "SELECT * FROM `customers` ";
                        $result_barcodes = mysqli_query($conn, $sql_barcodes);

                        // الحصول على عدد الباركودات
                        $barcode_count = mysqli_num_rows($result_barcodes);


                        echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $row['name'] . "</td>
                                <td> ". $row['phone'] ." </td>
                                <td> ". $row['country'] ." </td>
                                <td> ". $row['region'] ." </td>
                                <td> ". $row['coupon'] ." </td>
                              </tr>";
                              $i ++;
                    }
                    ?>
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
            $('#storesTable').DataTable();
        });
    </script>
</body>
</html>
