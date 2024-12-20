<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم الاشتراك في السحب بنجاح | شركة الفيصل للاستثمار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* خلفية متدرجة مع تصميم عصري */
        body {
           background: linear-gradient(135deg, #00c6ff, #007bff);
            font-family: 'Arial', sans-serif;
            color: #fff;
            overflow-x: hidden;
            position: relative;
            height: 100vh;
            margin: 0;
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

        .company-header p {
            font-size: 20px;
            margin-top: 10px;
            color: rgba(255, 255, 255, 0.8);
        }

        /* رسالة النجاح */
        .success-message {
            text-align: center;
            margin-top: 100px;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            animation: fadeIn 2s ease-out;
        }

        .success-message span {
            font-size: 30px;
            color: #FFD700;
        }

        /* تأثير الأنيميشن عند الانتقال */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* تأثير للأيقونات المتحركة */
        .reward-icons {
            bottom: 20px;
            transform: translateX(-50%);
            font-size: 40px;
            color: #fff;
            z-index: 999;
            animation: bounce 1.5s infinite;
        }

        .reward-icons i {
            margin: 0 15px;
        }

        @keyframes bounce {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        /* عرض التأثيرات */
        .confetti {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
            pointer-events: none;
        }

        .confetti div {
            width: 10px;
            height: 10px;
            background-color: #FFD700;
            margin: 5px;
            border-radius: 50%;
            animation: confettiFall 1s ease-in-out infinite;
        }

        /* حركة الزينة المنسكبة */
        @keyframes confettiFall {
            0% { transform: translateY(-100px); opacity: 0; }
            100% { transform: translateY(100vh); opacity: 1; }
        }

    </style>
</head>
<body>

      <div class="company-header">
        <img src="images/logo.jpg" alt="Logo" class="company-logo">
        <h2>شركة الفيصل للاستثمار</h2>
        <p> تم الاشتراك في السحب بنجاح ! </p>
    </div>

    <!-- رسالة النجاح -->
    <div class="success-message">
        <p>لقد تم الاشتراك في السحب بنجاح! <span>حظاً موفقاً</span></p>
    </div>

    <!-- الأيقونات المتحركة -->
    <center>
    <div class="reward-icons">
        <i class="fas fa-gift"></i>
        <i class="fas fa-trophy"></i>
        <i class="fas fa-coins"></i>
    </div>
    </center>

    <!-- الزينة المتساقطة -->
    <div class="confetti">
        <div style="animation-delay: 0s;"></div>
        <div style="animation-delay: 0.2s;"></div>
        <div style="animation-delay: 0.4s;"></div>
        <div style="animation-delay: 0.6s;"></div>
        <div style="animation-delay: 0.8s;"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
    <script>
        // تأثرات الأنيميشن باستخدام مكتبة Anime.js
        anime({
            targets: '.success-message span',
            scale: [0.8, 1.2],
            easing: 'easeInOutSine',
            duration: 1000,
            direction: 'alternate',
            loop: true
        });

        // التأثيرات المتساقطة للعناصر
        $(document).ready(function() {
            setInterval(function() {
                $(".confetti div").each(function() {
                    var confetti = $(this);
                    confetti.css({
                        "left": Math.random() * 100 + "vw",
                        "animation-duration": Math.random() * 2 + 2 + "s"
                    });
                });
            }, 200);
        });
    </script>
</body>
</html>
