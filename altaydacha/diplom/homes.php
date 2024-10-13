<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <div class="wrapper">
        <header id="myHeader" class="header">
            <div class="container">
                <div class="header-inner">
                    <a href="index.php" class="logo">
                        <img class="logo-img" src="Images/logo.png" alt="логотип сайта">
                    </a>
                    <nav class="menu">
                        <ul class="menu-list">
                            <li class="menu-list-item">
                                <a href="service.html" class="menu-list-link">Услуги</a>
                            </li>
                            <li class="menu-list-item">
                                <a href="index.html#rule" class="menu-list-link">Правила</a>
                            </li>
                            <li class="menu-list-item">
                                <a href="homes.php" class="menu-list-link menu-list-link--active">Дома</a>
                            </li>
                            <li class="menu-list-item">
                                <a href="contact.html" class="menu-list-link">Контакты</a>
                            </li>
                        </ul>
                    </nav> 
                    <?php
                        if ($_SESSION['user']){
                            $login = $_SESSION['user']['login'];
                            echo '<a href="profile.php" class="reg">'.$login.'</a>';
                        }
                        else{
                            echo '<a href="auth.php" class="reg">Войти</a>';
                        }
                    ?>   
                </div>
            </div>

        </header>

        <main class="main">
        <section class="choose-homes">
            <div class="container">
                <h2 class="section-title">Выбор домов</h2>
                    <div class="tabs">
                        <div class="tabs-content">
                            <div class="tabs-content-item">
                                <div class="home-card">
                                    <div class="card-content">
                                        <img class="card-img" src="images/card-1.jpg" alt="">
                                        <h4 class="card-title">Дом №1</h4>
                                        <p class="card-text">Прекрасный выбор для тех, кто хочет получить массу удовольствий в большой компании. 5 местный дом порадует даже самых превиредливых гостей.</p>
                                        <p class="card-price">5000₽</p>
                                        <a href="booking-sys/home1/index1.php" class="card-link">Забронировать</a>
                                    </div>
                                </div>
                                <div class="home-card">
                                    <div class="card-content">
                                        <img class="card-img" src="images/card-1.jpg" alt="">
                                        <h4 class="card-title">Дом №2</h4>
                                        <p class="card-text">Прекрасный выбор для тех, кто хочет получить массу удовольствий в большой компании. 5 местный дом порадует даже самых превиредливых гостей.</p>
                                        <p class="card-price">5900₽</p>
                                        <a href="#" class="card-link">Забронировать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-content-item">
                                <div class="home-card">
                                    <div class="card-content">
                                        <img class="card-img" src="images/card-1.jpg" alt="">
                                        <h4 class="card-title">Дом №3</h4>
                                        <p class="card-text">Прекрасный выбор для тех, кто хочет получить массу удовольствий в большой компании. 5 местный дом порадует даже самых превиредливых гостей.</p>
                                        <p class="card-price">5000₽</p>
                                        <a href="#" class="card-link">Забронировать</a>
                                    </div>
                                </div>
                                <div class="home-card">
                                    <div class="card-content">
                                        <img class="card-img" src="images/card-1.jpg" alt="">
                                        <h4 class="card-title">Дом №4</h4>
                                        <p class="card-text">Прекрасный выбор для тех, кто хочет получить массу удовольствий в большой компании. 5 местный дом порадует даже самых превиредливых гостей.</p>
                                        <p class="card-price">5900₽</p>
                                        <a href="#" class="card-link">Забронировать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-content-item">
                                <div class="home-card">
                                    <div class="card-content">
                                        <img class="card-img" src="images/card-1.jpg" alt="">
                                        <h4 class="card-title">Дом №5</h4>
                                        <p class="card-text">Прекрасный выбор для тех, кто хочет получить массу удовольствий в большой компании. 5 местный дом порадует даже самых превиредливых гостей.</p>
                                        <p class="card-price">5000₽</p>
                                        <a href="#" class="card-link">Забронировать</a>
                                    </div>
                                </div>
                                <div class="home-card">
                                    <div class="card-content">
                                        <img class="card-img" src="images/card-1.jpg" alt="">
                                        <h4 class="card-title">Дом №6</h4>
                                        <p class="card-text">Прекрасный выбор для тех, кто хочет получить массу удовольствий в большой компании. 5 местный дом порадует даже самых превиредливых гостей.</p>
                                        <p class="card-price">5900₽</p>
                                        <a href="#" class="card-link">Забронировать</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        </main>

        <footer class="footer">
            <div class="container">
                <nav class="footer-menu">
                    <ul class="footer-menu-list">
                        <li class="footer-menu-item">
                            <p class="footer-menu-title">Products</p>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">New</a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Sell your car</a>
                        </li>
                    </ul>
                    <ul class="footer-menu-list">
                        <li class="footer-menu-item">
                            <p class="footer-menu-title">Products</p>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        <li class="footer-menu-item">
                            <a class="footer-menu-link" href="tel:89137704133" >+7(913)-770-41-33</a>
                        </li>
                    </ul>
                    <ul class="footer-menu-list">
                        <li class="footer-menu-item">
                            <p class="footer-menu-title">Products</p>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        
                    </ul>
                    <ul class="footer-menu-list">
                        <li class="footer-menu-item">
                            <p class="footer-menu-title">Products</p>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">Used</a>
                        </li>
                    </ul>
                </nav>
                <ul class="app">
                    <li class="app-item">
                        <a href="#" class="app-item-link">
                            <img class="app-item-img" src="images/vk.png" alt="">
                        </a>
                    </li>
                    <li class="app-item">
                        <a href="#" class="app-item-link">
                            <img class="app-item-img" src="images/tg.png" alt="">
                        </a>
                    </li>
                </ul>
                <div class="footer-copy">
                    <p class="footer-copy-text">НЕГРЫ</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>