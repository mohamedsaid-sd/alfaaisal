<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المتاجر</title>
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

    // 1. إضافة متجر جديد
    if(isset($_POST['addstore'])){
        $name = $_POST['name'];
        $owner = $_POST['owner'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $phone = $_POST['phone'];
        
        $sql = "INSERT INTO stores (name, owner, country, region, phone,status) VALUES ('$name', '$owner', '$country', '$region', '$phone' , '1')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<center><div class='alert alert-success'> تم إضافة المتجر بنجاح! </div></center>";
        } else {
            echo "<center><div class='alert alert-danger'> خطأ: " . $sql . "<br>" . $conn->error . " </div></center>";
        }
    }

    // 2. تعديل متجر
    if(isset($_POST['editstore'])){
        $id = $_GET['id']; // استلام المعرف
        $name = $_POST['name'];
        $owner = $_POST['owner'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $phone = $_POST['phone'];
        
        $sql = "UPDATE stores SET name='$name', owner='$owner', country='$country', region='$region', phone='$phone' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "<center><div class='alert alert-success'> تم تعديل المتجر بنجاح! </div> </center>";
        } else {
            echo "<center><div class='alert alert-danger'> خطأ: " . $sql . "<br>" . $conn->error."</div> </center>";
        }
    }

    // 3. حذف متجر
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM stores WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "تم حذف المتجر بنجاح!";
        } else {
            echo "خطأ: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <!-- Content -->
    <div class="container mt-4">
        <!-- Button to Open Modal -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addStoreModal">إضافة متجر جديد</button>

        <!-- Modal for Adding and Editing Store -->
        <div class="modal fade" id="addStoreModal" tabindex="-1" aria-labelledby="addStoreModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStoreModalLabel">إضافة متجر جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="stores.php" id="addStoreForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="storeName" class="form-label">اسم المتجر</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسم المتجر" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="storeOwner" class="form-label">اسم المالك</label>
                                    <input type="text" class="form-control" id="owner" name="owner" placeholder="أدخل اسم المالك" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="storeLocation" class="form-label">الدولة</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="أدخل موقع المتجر" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="storeRegion" class="form-label">المنطقة</label>
                                    <input type="text" class="form-control" id="region" name="region" placeholder="أدخل المنطقة" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="storePhone" class="form-label">رقم الهاتف</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                <button type="submit" name="addstore" class="btn btn-primary">إضافة المتجر</button>
                                <button type="submit" name="editstore" class="btn btn-warning">تعديل المتجر</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTable Section -->
        <div class="table-responsive">
            <table id="storesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="text-align: right;">اسم المتجر</th>
                        <th style="text-align: right;"> الدولة </th>
                        <th style="text-align: right;"> المنطقة </th>
                        <th style="text-align: right;">رقم الهاتف</th>
                        <th style="text-align: right;">اسم المالك</th>
                        <th style="text-align: right;"> الباركودات </th>
                        <th style="text-align: right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM stores";
                    $result = $conn->query($sql);
                    $i = 1;
                    while($row = $result->fetch_assoc()) {

                        $store_id = $row['id'];
                        $sql_barcodes = "SELECT * FROM `barcodes` WHERE `store_id` = '$store_id'";
                        $result_barcodes = mysqli_query($conn, $sql_barcodes);

                        // الحصول على عدد الباركودات
                        $barcode_count = mysqli_num_rows($result_barcodes);


                        echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['country'] . "</td>
                                <td>" . $row['region'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['owner'] . "</td>
                                <td> ". $barcode_count ." </td>
                                <td class='action-buttons'>
                                    <button class='btn btn-sm btn-warning' onclick='editStore(" . $row['id'] . ", \"" . $row['name'] . "\", \"" . $row['owner'] . "\", \"" . $row['country'] . "\", \"" . $row['region'] . "\", \"" . $row['phone'] . "\")'>تعديل</button>
                                    <button class='btn btn-sm btn-danger' onclick='confirmDelete(" . $row['id'] . ")'>حذف</button>
                                    <a href='barcode.php?id=".$row['id']."'> <button class='btn btn-success'> إدارة </button? </a>
                                </td>
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

        // Edit Store Function
        function editStore(id, name, owner, country, region, phone) {
            $('#name').val(name);
            $('#owner').val(owner);
            $('#country').val(country);
            $('#region').val(region);
            $('#phone').val(phone);
            $('#addStoreModalLabel').text("تعديل المتجر");
            $('button[type="submit"][name="addstore"]').hide();
            $('button[type="submit"][name="editstore"]').show();
            $('#addStoreForm').attr('action', 'stores.php?id=' + id); // Pass store id for editing
            $('#addStoreModal').modal('show');
        }

        // Confirm Deletion
        function confirmDelete(id) {
            if (confirm("هل أنت متأكد من حذف هذا المتجر؟")) {
                window.location.href = "stores.php?delete=" + id;
            }
        }
    </script>
</body>
</html>
