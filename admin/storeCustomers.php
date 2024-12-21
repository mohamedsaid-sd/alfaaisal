<?php
// Database Configration
include '../config.php';
// Block Store
if(isset($_POST['block'])){
    $id = $_POST['id'];
    $query = "UPDATE `stores` SET `status` = '0' WHERE `stores`.`id` = $id;";
    $result = mysqli_query($conn,$query);
}
// Active Store
if(isset($_POST['active'])){
    $id = $_POST['id'];
    $query = "UPDATE `stores` SET `status` = '1' WHERE `stores`.`id` = $id;";
    $result = mysqli_query($conn,$query);
}

?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> صفحة مستخدمين المتاجر </title>
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
    
    


    // 1. إضافة متجر جديد
    if(isset($_POST['addstore'])){
        $name = $_POST['name'];
        $owner = $_POST['owner'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $phone = $_POST['phone'];
        
        $sql = "INSERT INTO stores (name, owner, country, region, phone) VALUES ('$name', '$owner', '$country', '$region', '$phone')";
        
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
 
        <!-- DataTable Section -->
        <div class="table-responsive">
            <table id="storesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="text-align: right;">اسم المتجر</th>
                        <th style="text-align: right;"> المستخدمين </th>
                        <th style="text-align: right;"> حالة المشاركة </th>
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
                        $sql_barcodes = "SELECT * FROM `customers` WHERE store LIKE '$store_id' ";
                        $result_barcodes = mysqli_query($conn, $sql_barcodes);

                        // الحصول على عدد الباركودات
                        if(mysqli_num_rows($result_barcodes) > 0)
                        $barcode_count = @mysqli_num_rows($conn,$result_barcodes);
                        else
                        $barcode_count = 0;


                        // Store Status : 
                        $status = $row['status'];
                        if($status =="1"){
                            $statustext = "<font color='green'> <b> مشارك </b> </font>";
                        }else{
                            $statustext = "<font color='red'> <b> غير مشارك </b> </font>";
                        }


                        echo "<tr>
                                <td>" . $i . "</td>
                                <td><a href='customers.php?id=".$row['id']."'>" . $row['name'] . "</a></td>
                                <td> ". $barcode_count ." </td>
                                <td> ".$statustext." </td>
                                <td class='action-buttons'>

                        <form method='post'>
                        <input type='text' id='id' name='id' value='".$row['id']."' hidden/>
                                ";
                        // Store Status : 
                        if($status =="1"){
                            echo "<button name='block' class='btn btn-sm btn-danger'> حجب </button>";
                        }else{
                            echo "<button name='active' class='btn btn-sm btn-success'> تنشيط </button>";
                        }            
                        echo "
                        </form>
                        </td> </tr>";
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
