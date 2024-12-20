<?php
// Database Configration File 
include '../config.php';
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .welcome {
            text-align: center;
            margin: 20px 0;
        }

        .welcome h1 {
            color: #4b9cd3;
        }

        .stat-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card h2 {
            color: #4b9cd3;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 2px 7px gold;
        }
    </style>
</head>
<body>
 	

 	<?php include 'navbar.php'; ?>

    <!-- Dashboard -->
    <div class="container mt-4">
        <!-- Welcome Section -->
        <div class="welcome">
            <h1>مرحبًا، محمد!</h1>
            <p>سعيدون برؤيتك اليوم. إليك بعض الإحصائيات السريعة.</p>
        </div>

        <!-- Stats Section -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <h2>
                    <?php 
                    // THe Users Number 
                    $user_query = "SELECT * FROM `customers`";
                    $users_result = mysqli_query($conn,$user_query);
                    $total_users = mysqli_num_rows($users_result);
                    echo $total_users;
                    ?>
                    </h2>
                    <p> عدد العملاء </p>
                </div>
            </div>
             <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <h2> <?php

// استعلام SQL لحساب عدد المتاجر
$sql = "SELECT COUNT(*) AS totalStores FROM stores";
$result = $conn->query($sql);

// التحقق من وجود نتيجة
if ($result->num_rows > 0) {
    // استرجاع البيانات
    $row = $result->fetch_assoc();
    echo $row['totalStores'];
} else {
    echo "لا توجد بيانات";
}
?> </h2>
                    <p>  عدد المتاجر </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <h2> 300 </h2>
                    <p> السحوبات السابقة </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <h2> 200 </h2>
                    <p> عدد الفائزين </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
// close the connection
$conn->close();
?>
</body>
</html>
