<?php
session_start();

// بيانات تسجيل الدخول الصحيحة
$correct_username = 'faisal';
$correct_password = '2024';

// التحقق من البيانات المُدخلة
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    if ($username === $correct_username && $password === $correct_password) {
        // تسجيل دخول ناجح - إعادة توجيه المستخدم إلى صفحة dashboard
        //header("Location: dashboard.php");
        echo "<div class='alert alert-success'> تم الدخول جاري توجيهك ... </div>";
        echo "<meta http-equiv='refresh' content='3;url=dashboard.php'>";
        //exit();
    } else {
        // رسالة خطأ
        $error_message = "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
}
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - شركة الفيصل للاستثمار</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="../images/logo.jpg" alt="شعار الفيصل للاستثمار">
        </div>
        <h1>مرحبًا بكم في شركة الفيصل للاستثمار</h1>
        <p>من فضلك قم بتسجيل الدخول للوصول إلى حسابك</p>

        <!-- عرض رسالة الخطأ إذا كانت موجودة -->
        <?php if (isset($error_message)): ?>
            <p style="color:red; text-align:center;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="" method="post" class="login-form">
            <div class="form-group">
                <label for="email">إسم المستخدم</label>
                <input type="text" id="email" name="email" placeholder="أدخل إسم المستخدم" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
            </div>
            <button type="submit" class="btn">تسجيل الدخول</button>
            <p class="forgot-password"><a href="#">نسيت كلمة المرور؟</a></p>
        </form>
    </div>
</body>
</html>
