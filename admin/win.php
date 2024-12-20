<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>السحب العشوائي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
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

        .draw-section {
            text-align: center;
            margin-top: 50px;
        }
        .winner-box {
            font-size: 28px;
            font-weight: bold;
            margin-top: 20px;
            color: #28a745;
            display: none;
        }
        .spinner {
            width: 80px;
            height: 80px;
            border: 10px solid #ddd;
            border-top: 10px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
            display: none;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        #cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        .card {
            width: 150px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            font-weight: bold;
            color: #333;
            transition: all 0.3s;
        }
        .card.winner {
            background: #28a745;
            color: #fff;
            border-color: #28a745;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<?php

    include 'navbar.php';
    include '../config.php';
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT name , phone FROM customers");
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>

<div class="container mt-4">
    <div class="draw-section">
        <h2>السحب العشوائي</h2>
        <button id="startDraw" class="btn btn-primary btn-lg">
            <i class="fas fa-dice"></i> ابدأ السحب
        </button>
        <div class="spinner"></div>
        <div class="winner-box">
            الفائز: <span id="winnerName"></span><br/>
            صاحب الرقم: <span id="winnerPhone"></span><br/>
        </div>
        <div id="cards">
            <?php foreach ($customers as $customer): ?>
                <div class="card" data-name="<?= htmlspecialchars($customer['name'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($customer['name'], ENT_QUOTES, 'UTF-8') ?><br/>
                    <?= htmlspecialchars($customer['phone'], ENT_QUOTES, 'UTF-8') ?><br/>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<br/><br/><br/><br/>

<footer class="text-center mt-auto py-3 bg-primary text-white">
    &copy; 2024 جميع الحقوق محفوظة.
</footer>

<script>
    const cards = document.querySelectorAll('.card');
    const startDrawButton = document.getElementById('startDraw');
    const winnerBox = document.querySelector('.winner-box');
    const winnerName = document.getElementById('winnerName');
    const winnerPhone = document.getElementById('winnerPhone');
    const spinner = document.querySelector('.spinner');

    startDrawButton.addEventListener('click', () => {
        winnerBox.style.display = 'none';
        spinner.style.display = 'block';

        setTimeout(() => {
            spinner.style.display = 'none';
            const randomIndex = Math.floor(Math.random() * cards.length);

            cards.forEach(card => card.classList.remove('winner'));
            const winnerCard = cards[randomIndex];
            winnerCard.classList.add('winner');

            winnerName.textContent = winnerCard.dataset.name;
            winnerPhone.textContent = winnerCard.dataset.phone;
            winnerBox.style.display = 'block';
        }, 3000);
    });
</script>
</body>
</html>