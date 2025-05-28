<?php
// Обработка отправки формы
$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $time = htmlspecialchars($_POST['time']);
    $message = htmlspecialchars($_POST['message']);
    $language = htmlspecialchars($_POST['language']);
    
    $to = "mineearth2024@gmail.com";
    $subject = "Новая заявка на джейлбрейк от $name";
    $body = "Язык: $language\n";
    $body .= "Имя: $name\n";
    $body .= "Email: $email\n";
    $body .= "Телефон: $phone\n";
    $body .= "Удобное время: $time\n";
    $body .= "Сообщение:\n$message";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    if (mail($to, $subject, $body, $headers)) {
        $success = "Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.";
    } else {
        $error = "Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.";
    }
}

// Обработка выбора языка
$lang = 'ru'; // По умолчанию русский
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}

// Массив переводов
$translations = [
    'ru' => [
        'title' => 'YHub - Профессиональные услуги джейлбрейка',
        'home' => 'Главная',
        'services' => 'Услуги',
        'about' => 'О нас',
        'contact' => 'Контакты',
        'hero_title' => 'Профессиональный <span>джейлбрейк</span> для вашего устройства',
        'hero_text' => 'Получите полный контроль над вашим устройством. Установка неофициальных приложений, кастомизация интерфейса, расширение функционала.',
        'services_btn' => 'Наши услуги',
        'contact_btn' => 'Связаться',
        'features' => 'Наши преимущества',
        'features_desc' => 'Почему клиенты выбирают наши услуги по джейлбрейку',
        'security' => 'Безопасность',
        'security_desc' => 'Все процедуры выполняются с максимальным вниманием к безопасности вашего устройства и данных',
        'professionalism' => 'Профессионализм',
        'professionalism_desc' => 'Опытные специалисты с многолетним опытом работы с iOS и Android устройствами',
        'support' => 'Поддержка 24/7',
        'support_desc' => 'Круглосуточная техническая поддержка после выполнения джейлбрейка',
        'services_title' => 'Наши услуги',
        'services_desc' => 'Выберите подходящий пакет услуг для вашего устройства',
        'basic' => 'Базовый',
        'basic_list' => ['Выполнение джейлбрейка', 'Установка Cydia/AltStore', 'Базовые твики для кастомизации'],
        'pro' => 'Профессиональный',
        'pro_list' => ['Выполнение джейлбрейка', 'Установка Cydia/AltStore/Sileo', 'Продвинутые твики и кастомизация'],
        'premium' => 'Премиум',
        'premium_list' => ['Выполнение джейлбрейка', 'Установка всех менеджеров', 'Полная кастомизация интерфейса'],
        'price' => '/ устройство',
        'order' => 'Заказать',
        'contact_title' => 'Заказать услугу',
        'contact_desc' => 'Заполните форму и наш специалист свяжется с вами в течение 15 минут',
        'name' => 'Имя',
        'email' => 'Email',
        'phone' => 'Номер телефона',
        'time' => 'Удобное время',
        'message' => 'Сообщение',
        'language' => 'Язык',
        'submit' => 'Отправить заявку',
        'copyright' => '© 2023 YHub. Все права защищены.',
        'success' => 'Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.',
        'error' => 'Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.'
    ],
    'ua' => [
        'title' => 'YHub - Професійні послуги джейлбрейку',
        'home' => 'Головна',
        'services' => 'Послуги',
        'about' => 'Про нас',
        'contact' => 'Контакти',
        'hero_title' => 'Професійний <span>джейлбрейк</span> для вашого пристрою',
        'hero_text' => 'Отримайте повний контроль над вашим пристроєм. Встановлення неофіційних додатків, кастомізація інтерфейсу, розширення функціоналу.',
        'services_btn' => 'Наші послуги',
        'contact_btn' => "Зв'язатися",
        'features' => 'Наші переваги',
        'features_desc' => 'Чому клієнти обирають наші послуги з джейлбрейку',
        'security' => 'Безпека',
        'security_desc' => 'Усі процедури виконуються з максимальною увагою до безпеки вашого пристрою та даних',
        'professionalism' => 'Професіоналізм',
        'professionalism_desc' => 'Досвідчені фахівці з багаторічним досвідом роботи з пристроями iOS та Android',
        'support' => 'Підтримка 24/7',
        'support_desc' => 'Цілодобова технічна підтримка після виконання джейлбрейку',
        'services_title' => 'Наші послуги',
        'services_desc' => 'Виберіть пакет послуг, що підходить для вашого пристрою',
        'basic' => 'Базовий',
        'basic_list' => ['Виконання джейлбрейку', 'Встановлення Cydia/AltStore', 'Базові твіки для кастомізації'],
        'pro' => 'Професійний',
        'pro_list' => ['Виконання джейлбрейку', 'Встановлення Cydia/AltStore/Sileo', 'Просунуті твіки та кастомізація'],
        'premium' => 'Преміум',
        'premium_list' => ['Виконання джейлбрейку', 'Встановлення всіх менеджерів', 'Повна кастомізація інтерфейсу'],
        'price' => '/ пристрій',
        'order' => 'Замовити',
        'contact_title' => 'Замовити послугу',
        'contact_desc' => "Заповніть форму, і наш фахівець зв'яжеться з вами протягом 15 хвилин",
        'name' => "Ім'я",
        'email' => 'Email',
        'phone' => 'Номер телефону',
        'time' => 'Зручний час',
        'message' => 'Повідомлення',
        'language' => 'Мова',
        'submit' => 'Надіслати заявку',
        'copyright' => '© 2023 YHub. Всі права захищені.',
        'success' => "Ваша заявка успішно відправлена! Ми зв'яжемося з вами найближчим часом.",
        'error' => 'Виникла помилка при відправці заявки. Будь ласка, спробуйте пізніше.'
    ],
    'en' => [
        'title' => 'YHub - Professional Jailbreak Services',
        'home' => 'Home',
        'services' => 'Services',
        'about' => 'About',
        'contact' => 'Contact',
        'hero_title' => 'Professional <span>Jailbreak</span> for Your Device',
        'hero_text' => 'Gain full control over your device. Install unofficial apps, customize interface, extend functionality.',
        'services_btn' => 'Our Services',
        'contact_btn' => 'Contact Us',
        'features' => 'Our Advantages',
        'features_desc' => 'Why customers choose our jailbreak services',
        'security' => 'Security',
        'security_desc' => 'All procedures are performed with maximum attention to the security of your device and data',
        'professionalism' => 'Professionalism',
        'professionalism_desc' => 'Experienced specialists with years of experience with iOS and Android devices',
        'support' => '24/7 Support',
        'support_desc' => 'Round-the-clock technical support after jailbreak',
        'services_title' => 'Our Services',
        'services_desc' => 'Choose the right service package for your device',
        'basic' => 'Basic',
        'basic_list' => ['Jailbreak execution', 'Cydia/AltStore installation', 'Basic customization tweaks'],
        'pro' => 'Professional',
        'pro_list' => ['Jailbreak execution', 'Cydia/AltStore/Sileo installation', 'Advanced tweaks and customization'],
        'premium' => 'Premium',
        'premium_list' => ['Jailbreak execution', 'All managers installation', 'Full interface customization'],
        'price' => '/ device',
        'order' => 'Order',
        'contact_title' => 'Order Service',
        'contact_desc' => 'Fill out the form and our specialist will contact you within 15 minutes',
        'name' => 'Name',
        'email' => 'Email',
        'phone' => 'Phone Number',
        'time' => 'Convenient Time',
        'message' => 'Message',
        'language' => 'Language',
        'submit' => 'Submit Request',
        'copyright' => '© 2023 YHub. All rights reserved.',
        'success' => 'Your request has been sent successfully! We will contact you shortly.',
        'error' => 'An error occurred while sending the request. Please try again later.'
    ]
];

$t = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t['title']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4a00e0;
            --secondary: #8e2de2;
            --accent: #00c9ff;
            --dark: #1a1a2e;
            --light: #f5f5fa;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--dark) 0%, #16213e 100%);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background: rgba(26, 26, 46, 0.8);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--light);
            text-decoration: none;
        }

        .logo i {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--accent);
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        .nav-links a:hover:after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .lang-selector {
            display: flex;
            gap: 10px;
            margin-left: 20px;
        }

        .lang-btn {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .lang-btn.active {
            background: var(--accent);
            color: var(--dark);
            border-color: var(--accent);
        }

        .nav-btn {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(142, 45, 226, 0.4);
        }

        .nav-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(142, 45, 226, 0.6);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero h1 span {
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #ccc;
        }

        .hero-btns {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .btn {
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 5px 15px rgba(142, 45, 226, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(142, 45, 226, 0.6);
        }

        .btn-outline {
            border: 2px solid var(--accent);
            color: var(--accent);
        }

        .btn-outline:hover {
            background: var(--accent);
            color: var(--dark);
        }

        .hero-image {
            position: absolute;
            right: -50px;
            top: 50%;
            transform: translateY(-50%);
            width: 50%;
            max-width: 700px;
            z-index: 1;
            opacity: 0.8;
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.5));
        }

        /* Features Section */
        .section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title p {
            color: #aaa;
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border-color: rgba(74, 0, 224, 0.3);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: rgba(0, 201, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: var(--accent);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #bbb;
        }

        /* Services Section */
        .services {
            background: rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .services:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(74, 0, 224, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: rgba(26, 26, 46, 0.7);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(74, 0, 224, 0.3);
        }

        .service-header {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            padding: 25px;
            text-align: center;
        }

        .service-header h3 {
            font-size: 1.8rem;
        }

        .service-body {
            padding: 30px;
        }

        .service-features {
            list-style: none;
            margin: 25px 0;
        }

        .service-features li {
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
        }

        .service-features li:last-child {
            border-bottom: none;
        }

        .service-features li i {
            color: var(--success);
            margin-right: 10px;
        }

        .service-price {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 20px 0;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .service-price span {
            font-size: 1rem;
            color: #aaa;
        }

        .service-btn {
            display: block;
            text-align: center;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .service-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(142, 45, 226, 0.4);
        }

        /* Form Section */
        .contact-section {
            background: rgba(0, 0, 0, 0.2);
            padding: 100px 0;
            position: relative;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(26, 26, 46, 0.7);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .contact-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .contact-title p {
            color: #aaa;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: var(--accent);
        }

        .form-control {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(0, 201, 255, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            display: block;
            width: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(142, 45, 226, 0.4);
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(142, 45, 226, 0.6);
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert-success {
            background: rgba(46, 204, 113, 0.2);
            border: 1px solid var(--success);
            color: var(--success);
        }

        .alert-error {
            background: rgba(231, 76, 60, 0.2);
            border: 1px solid var(--danger);
            color: var(--danger);
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 40px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--light);
            font-size: 1.3rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--accent);
            color: var(--dark);
            transform: translateY(-5px);
        }

        .copyright {
            color: #aaa;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.8rem;
            }
            
            .hero-image {
                opacity: 0.3;
                right: -100px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero-content {
                text-align: center;
                margin: 0 auto;
            }
            
            .hero-btns {
                justify-content: center;
            }
            
            .hero-image {
                display: none;
            }
            
            .contact-container {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .btn {
                padding: 12px 30px;
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-unlock-alt"></i>
                    YHub
                </a>
                <ul class="nav-links">
                    <li><a href="#"><?php echo $t['home']; ?></a></li>
                    <li><a href="#services"><?php echo $t['services']; ?></a></li>
                    <li><a href="#contact"><?php echo $t['contact']; ?></a></li>
                </ul>
                <div class="lang-selector">
                    <a href="?lang=ru" class="lang-btn <?php echo $lang == 'ru' ? 'active' : ''; ?>">RU</a>
                    <a href="?lang=ua" class="lang-btn <?php echo $lang == 'ua' ? 'active' : ''; ?>">UA</a>
                    <a href="?lang=en" class="lang-btn <?php echo $lang == 'en' ? 'active' : ''; ?>">EN</a>
                </div>
                <a href="#contact" class="nav-btn"><?php echo $t['order']; ?></a>
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo $t['hero_title']; ?></h1>
                <p><?php echo $t['hero_text']; ?></p>
                <div class="hero-btns">
                    <a href="#services" class="btn btn-primary"><?php echo $t['services_btn']; ?></a>
                    <a href="#contact" class="btn btn-outline"><?php echo $t['contact_btn']; ?></a>
                </div>
            </div>
            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=700" alt="Jailbreak" class="hero-image">
        </div>
    </section>

    <!-- Features Section -->
    <section class="section" id="features">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $t['features']; ?></h2>
                <p><?php echo $t['features_desc']; ?></p>
            </div>
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3><?php echo $t['security']; ?></h3>
                    <p><?php echo $t['security_desc']; ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3><?php echo $t['professionalism']; ?></h3>
                    <p><?php echo $t['professionalism_desc']; ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3><?php echo $t['support']; ?></h3>
                    <p><?php echo $t['support_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section services" id="services">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $t['services_title']; ?></h2>
                <p><?php echo $t['services_desc']; ?></p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-header">
                        <h3><?php echo $t['basic']; ?></h3>
                    </div>
                    <div class="service-body">
                        <ul class="service-features">
                            <?php foreach ($t['basic_list'] as $item): ?>
                            <li><i class="fas fa-check"></i> <?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="service-price">$50 <span><?php echo $t['price']; ?></span></div>
                        <a href="#contact" class="service-btn"><?php echo $t['order']; ?></a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-header">
                        <h3><?php echo $t['pro']; ?></h3>
                    </div>
                    <div class="service-body">
                        <ul class="service-features">
                            <?php foreach ($t['pro_list'] as $item): ?>
                            <li><i class="fas fa-check"></i> <?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="service-price">$80 <span><?php echo $t['price']; ?></span></div>
                        <a href="#contact" class="service-btn"><?php echo $t['order']; ?></a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-header">
                        <h3><?php echo $t['premium']; ?></h3>
                    </div>
                    <div class="service-body">
                        <ul class="service-features">
                            <?php foreach ($t['premium_list'] as $item): ?>
                            <li><i class="fas fa-check"></i> <?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="service-price">$120 <span><?php echo $t['price']; ?></span></div>
                        <a href="#contact" class="service-btn"><?php echo $t['order']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact-section" id="contact">
        <div class="container">
            <div class="contact-container">
                <div class="contact-title">
                    <h2><?php echo $t['contact_title']; ?></h2>
                    <p><?php echo $t['contact_desc']; ?></p>
                </div>
                
                <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo $t['success']; ?></div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                    <div class="alert alert-error"><?php echo $t['error']; ?></div>
                <?php endif; ?>
                
                <form id="contactForm" method="POST">
                    <input type="hidden" name="language" value="<?php echo $t['language']; ?>">
                    
                    <div class="form-group">
                        <label for="name"><?php echo $t['name']; ?></label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email"><?php echo $t['email']; ?></label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone"><?php echo $t['phone']; ?></label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="time"><?php echo $t['time']; ?></label>
                        <input type="text" id="time" name="time" class="form-control" required placeholder="<?php echo $lang == 'ru' ? 'Например: Пн-Пт после 18:00' : ($lang == 'ua' ? 'Наприклад: Пн-Пт після 18:00' : 'e.g. Mon-Fri after 6 PM'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="message"><?php echo $t['message']; ?></label>
                        <textarea id="message" name="message" class="form-control" placeholder="<?php echo $lang == 'ru' ? 'Опишите ваше устройство и пожелания' : ($lang == 'ua' ? 'Опишіть ваш пристрій та побажання' : 'Describe your device and requirements'); ?>"></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn"><?php echo $t['submit']; ?></button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="social-links">
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-viber"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <p class="copyright"><?php echo $t['copyright']; ?></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        mobileMenuBtn.addEventListener('click', () => {
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });
        
        // Form validation
        const contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', (e) => {
            const phone = document.getElementById('phone').value;
            const phoneRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/;
            
            if (!phoneRegex.test(phone)) {
                e.preventDefault();
                alert('<?php echo $lang == "ru" ? "Пожалуйста, введите корректный номер телефона" : ($lang == "ua" ? "Будь ласка, введіть коректний номер телефону" : "Please enter a valid phone number"); ?>');
            }
        });
    </script>
</body>
</html>