<?php 

?>
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
            /*background: linear-gradient(135deg, #00c6ff, #007bff);*/
            background: url('images/test.jpg');

            font-family: 'Arial', sans-serif;
            color: #fff;
            overflow-x: hidden;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }


        #registrationCard {
            background: rgba(255, 255, 255, 0.80);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transform: translateY(50px);
            animation: slideIn 0.8s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateY(100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .form-group label {
            color: #555;
            font-weight: bold;
        }

        .form-control {
            border: 2px solid #1f4037;
            border-radius: 8px;
        }

        .form-control:focus {
            box-shadow: 0 0 10px #1f4037;
        }

        .btn-hover-effect {
            font-weight: bold;
            background: #1f4037;
            color: #fff;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .btn-hover-effect:hover {
            transform: scale(1.1);
            background: #99f2c8;
            color: #000;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            color: #e4ffe1;
            background: rgba(0, 0, 0, 0.2);
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
        .circle-logo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 20px;
        display: block;
        object-fit: cover;
        border: 3px solid #03ABE8;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-12 col-md-6 col-lg-4">
            <br/><br/><br/><br/>
            <div class="card" id="registrationCard">

         <img src="images/logo.jpg" alt="Logo" class="circle-logo">
        <h2>شركة الفيصل للاستثمار</h2>
        <p>اشترك الآن في سحب جوائز رائعة!</p>

                <h3 class="text-center mb-4 text-success">تسجيل عميل جديد</h3>
                <?php
                // Deal with registration 
                    if(isset($_POST['subscribe'])){
                        // pass variable from the forms 
                        $name = htmlspecialchars($_POST['name']);
                        $phone = htmlspecialchars($_POST['phone']);
                        $country = htmlspecialchars($_POST['country']);
                        $region = htmlspecialchars($_POST['region']);
                        $coupon = htmlspecialchars($_POST['coupon']);

                        echo "<font> جااهز لعملية الاضافة </font>";   
                    }
                ?>
                <form method="POST">
                    <div class="form-group mb-3">
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
                    <button name="subscribe" type="submit" class="btn-hover-effect">شارك في السحب</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 شركة الفيصل للاستثمار | <a href="#">سياسة الخصوصية</a></p>
    </footer>
</body>

</html>
