<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> الفيصل للإستثمار </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white py-3">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center text-white" href="#">
                    <img style="margin-left: 10px;" src="images/logo.jpg" alt="شعار الشركة" class="logo-img me-2">
                    <h1 class="fs-5 m-5"> الفيصل للإستثمار </h1>
                </a>
                <!-- Toggler for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> الرئيسية </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">عن الشركة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#how-it-works">كيف نعمل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonials">آراء العملاء</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">تواصل معنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light ms-2 me-2" href="#login" role="button">تسجيل دخول</a> 
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning text-dark ms-2 me-2" href="#signup" role="button">تسجيل جديد</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>


<!-- Welcome Section -->
<section id="welcome" class="text-center py-5" style="background: linear-gradient(90deg, #007bff, #00c6ff);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="welcome-content">
                    <h2 class="display-4 fw-bold text-white mb-3">أهلاً بك في شركة الفيصل للإستثمار !</h2>
                    <p class="lead mb-4">نحن نقدم لك فرصة الفوز بجوائز نقدية مذهلة كلما قمت بمسح الكوبون من محلاتنا الشريكة. اجعل كل عملية شراء أكثر قيمة وابدأ رحلة الفوز الآن!</p>
                    <a href="#about" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow-lg">اكتشف المزيد</a>
                </div>
                <!-- Icons below the message -->
                <div class="icons mt-4">
                    <i class="fas fa-gift fa-3x text-white me-3"></i>
                    <i class="fas fa-qrcode fa-3x text-white me-3"></i>
                    <i class="fas fa-trophy fa-3x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Multiple Winners Announcement Section -->
<section id="winner-announcement" class="winner-section py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">إعلان الفائزين في السحب الكبير!</h2>
        <br/><br/>
        <div class="row justify-content-center">
            <!-- Winner Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="winner-card shadow-lg p-5 rounded-lg glow-effect">
                    <div class="icon-container mb-4">
                        <i class="fas fa-trophy fa-4x text-warning"></i>
                    </div>
                    <h3 class="winner-name fw-bold">أحمد علي</h3>
                    <!-- <p class="lead mb-4"> فاز أحمد علي بجائزة نقدية بقيمة 1000 جنيه! </p> -->
                    <div class="reward-info">
                        <span class="reward-amount text-success"> 1000 جنيه </span>
                        <span class="reward-description"> جائزة نقدية! </span>
                    </div>
                    <p class="phone-number"><i class="fas fa-phone-alt text-info"></i> 01012345678</p>
                    <a href="#how-it-works" class="btn .btn-warning btn-lg mt-4">شارك الفوز !</a>
                </div>
            </div>
            
            <!-- Winner Card 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="winner-card shadow-lg p-5 rounded-lg glow-effect">
                    <div class="icon-container mb-4">
                        <i class="fas fa-trophy fa-4x text-warning"></i>
                    </div>
                    <h3 class="winner-name fw-bold">سارة محمد</h3>
                    <!-- <p class="lead mb-4">فازت سارة محمد احمد بجائزة 500 جنيه!</p> -->
                    <div class="reward-info">
                        <span class="reward-amount text-success"> 500 جنيه </span>
                        <span class="reward-description">جائزة نقدية!</span>
                    </div>
                    <p class="phone-number"><i class="fas fa-phone-alt text-info"></i> 01198765432</p>
                    <a href="#how-it-works" class="btn .btn-warning btn-lg mt-4">شارك الفوز !</a>
                </div>
            </div>

            <!-- Winner Card 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="winner-card shadow-lg p-5 rounded-lg glow-effect">
                    <div class="icon-container mb-4">
                        <i class="fas fa-trophy fa-4x text-warning"></i>
                    </div>
                    <h3 class="winner-name fw-bold">محمد يوسف</h3>
                    <!-- <p class="lead mb-4">فاز محمد احمد علي بجائزة 300 جنيه!</p> -->
                    <div class="reward-info">
                        <span class="reward-amount text-success"> 300 جنيه </span>
                        <span class="reward-description">جائزة نقدية!</span>
                    </div>
                    <p class="phone-number"><i class="fas fa-phone-alt text-info"></i> 01234567890</p>
                    <a href="#how-it-works" class="btn .btn-warning btn-lg mt-4">شارك الفوز !</a>
                </div>
            </div>
        </div>
    </div>
</section>


 <!-- Hero Section -->
<section id="hero" class="text-center text-white d-flex align-items-center position-relative" style="background: url('images/hero2.jpg') no-repeat center center/cover; height: 100vh;">
    <div class="overlay"></div> <!-- الطبقة السوداء -->
    <div class="container position-relative z-1">
        <h1 class="display-4 fw-bold">جوائز نقدية لك وبطريقة مبتكرة!</h1>
        <p class="lead my-4">تسجل العملاء، وزيادة ولاء الزبائن، والفوز بجوائز قيمة.</p>
        <a href="#about" class="btn btn-lg">تعرف علينا أكثر</a>
    </div>
</section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="text-primary mb-4">عن الشركة</h2>
            <p class="text-muted">نحن شركة متخصصة في تقديم حلول تسويقية مبتكرة تعتمد على نظام الجوائز والكوبونات. نعمل على تعزيز التفاعل بين المحلات التجارية والعملاء من خلال توفير نظام شامل ومتكامل للتسجيل والتسويق.</p>
        </div>
    </section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-5" style="background: linear-gradient(90deg, #007bff, #00c6ff); color: #fff;">
    <div class="container text-center">
        <h2 class="display-4 fw-bold mb-5">كيف نعمل؟</h2>
        <div class="row justify-content-center">
            <!-- Step 1: تحديد المتاجر -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="how-it-works-box p-4 rounded shadow-lg bg-white text-dark position-relative">
                    <i class="fas fa-store fa-4x text-primary mb-3"></i>
                    <h4 class="fw-bold mb-3">تحديد المتاجر</h4>
                    <p>نبحث عن المتاجر التي بحاجة لجذب عملاء جدد وتحقيق النجاح في السوق.</p>
                    <div class="hover-overlay"></div>
                </div>
            </div>
            <!-- Step 2: توفير الكوبونات -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="how-it-works-box p-4 rounded shadow-lg bg-white text-dark position-relative">
                    <i class="fas fa-qrcode fa-4x text-primary mb-3"></i>
                    <h4 class="fw-bold mb-3">توفير الكوبونات</h4>
                    <p>نقدم كوبونات خصم فريدة باستخدام QR كود لسهولة التسجيل والوصول للجوائز.</p>
                    <div class="hover-overlay"></div>
                </div>
            </div>
            <!-- Step 3: توزيع الجوائز -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="how-it-works-box p-4 rounded shadow-lg bg-white text-dark position-relative">
                    <i class="fas fa-trophy fa-4x text-primary mb-3"></i>
                    <h4 class="fw-bold mb-3">توزيع الجوائز</h4>
                    <p>نقوم بالسحب العشوائي على الجوائز النقدية بانتظام لزيادة ولاء العملاء.</p>
                    <div class="hover-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-primary text-center mb-4">آراء العملاء</h2>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote text-center">
                        <p>"خدمة رائعة زادت من تفاعل زبائني مع المحل."</p>
                        <footer class="blockquote-footer">أحمد علي، صاحب محل</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote text-center">
                        <p>"الفكرة ممتازة والنتائج ملموسة من الأسبوع الأول."</p>
                        <footer class="blockquote-footer">منى سالم، مديرة متجر</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-4">
        <div class="container text-center">
            <p>© 2024 شركة الفيصل للجوائز والكوبونات. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
