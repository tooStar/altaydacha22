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
                                <a href="#rule" class="menu-list-link menu-list-link--active">Правила</a>
                            </li>
                            <li class="menu-list-item">
                                <a href="homes.php" class="menu-list-link">Дома</a>
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
        <section class="top">
            <div class="container">
                <h1 class="title">
                    ALTAYDACHA22
                </h1>
                <a href="homes.php" class="top-link">
                    ЗАБРОНИРОВАТЬ ДОМА
                </a>
            </div>
        </section>
        <div class="slider">
            <div class="swiper1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image: url(images/slide-1.png);"></div>
                    <div class="swiper-slide" style="background-image: url(images/slide-1.jpg);"></div>
                    <div class="swiper-slide" style="background-image: url(images/slide-1.jpg);"></div>
                    <div class="swiper-slide" style="background-image: url(images/slide-1.jpg);"></div>
                </div>
                <div class="swiper-pagination"></div>                
            </div>            
        </div>
        <section class="why-lease">
            <div class="container">
                <h2 class="section-title">
                    Почему именно мы: 
                </h2>
                <ul class="why-lease-list">
                    <li class="why-lease-item">
                        <img class="why-lease-item-img" src="images/why-1.png" alt="">
                        <h3 class="why-lease-item-title">Красивая Природа</h3>
                        <p class="why-lease-item-text">Текст</p>
                    </li>
                    <li class="why-lease-item">
                        <img class="why-lease-item-img" src="images/why-1.png" alt="">
                        <h3 class="why-lease-item-title">Низкие Цены</h3>
                        <p class="why-lease-item-text">Текст</p>
                    </li>
                    <li class="why-lease-item">
                        <img class="why-lease-item-img" src="images/why-1.png" alt="">
                        <h3 class="why-lease-item-title">Городской Комфорт</h3>
                        <p class="why-lease-item-text">Текст</p>
                    </li>
                    <li class="why-lease-item">
                        <img class="why-lease-item-img" src="images/why-1.png" alt="">
                        <h3 class="why-lease-item-title">Работа Круглый Год</h3>
                        <p class="why-lease-item-text">Текст</p>
                    </li>
                </ul>
            </div>
        </section>
        <senction class="altay">
            <div class="container">
                <div class="altay-inner">
                    <h2 class="section-title">
                        Отдых На Горном Алтае
                    </h2>
                    <p class="altay-text">
                        Насладитесь дикой природой горных вершин в комфортной обстановке
                    </p>
                    <h4 id="rule" class="altay-title">
                        Правила поведения:
                    </h4>
                    <ol class="altay-list">
                        <li class="altay-item">Дома предназначены для временного проживания гостей на срок, согласованный с администрацией.</li>
                        <li class="altay-item">Режим работы Ресепшна с 9.00 до 22.00.</li>
                        <li class="altay-item">При заселении в дом  гость должен предъявить администратору документ, удостоверяющий личность (паспорт).</li>
                        <li class="altay-item">Дома предназначены для временного проживания гостей на срок, согласованный с администрацией.</li>
                        <li class="altay-item">Уборка домов производится по предварительной заявке администратору, осуществляется в промежутке с 14:00 до 19:00.</li>
                        <li class="altay-item">При заселении гость заполняет анкету и подписывает ее, чем подтверждает достоверность сведений о себе и согласие с правилами проживания.</li>
                        <li class="altay-item">Запрещено курение в закрытых помещениях. Курение: сигарет, кальяна, электронных сигарет, разрешено только в специально отведенных местах (открытая терраса дома, зона у беседки).</li>
                        <li class="altay-item">Плата за проживание взимается в соответствии с единым расчетным часом: с 14.00 текущих суток по местному времени. В случае задержки выезда гостя после расчетного часа, гость обязан оплатить услугу позднего выезда. При задержке выезда от 10 до 24 часов плата взимается за полные сутки. При проживании не более суток (24 часа) плата взимается за сутки, независимо от расчетного часа. Плата за дополнительное место в доме взимается согласно прейскуранту. За проживание детей в возрасте до 6 лет, без предоставления отдельного места, оплата не взимается. Продление времени размещения возможно только при условии наличия такой возможности и остается на усмотрение администрации.</li>
                        <li class="altay-item">Оказание всех видов услуг осуществляется после полной оплаты администратору.</li>
                        <li class="altay-item">В комплексе АлтайДача категорически запрещено размещение с животными (собаками, кошками, птицами и др. животными, независимо от их размера и привитых навыков).</li>
                        <li class="altay-item">В целях безопасности, гость, покидая дом, обязан закрывать террасу и входную дверь на ключ. Комплекс не несет ответственность за сохранность имущества, оставленного в общественных местах (у дома, в беседках и т. д.).</li>
                        <li class="altay-item">Сотрудники отеля не несут ответственности за детей, оставленных без присмотра родителей или сопровождающих лиц.</li>
                        <li class="altay-item">Гость должен возместить ущерб в случае утраты или повреждения имущества комплекса, согласно действующему конфликт-меню, а так же нести ответственность за иные нарушения в соответствии с законодательством РФ.</li>
                        <li class="altay-item">Гости обязаны строго соблюдать «Правила пожарной безопасности», установленный порядок проживания, чистоту. Проживающие в комплексе, выходя из дома, должны закрывать водопроводные краны, выключать свет, телевизор, другие электроприборы, закрывать окна и запирать двери на ключ.</li>
                        <li class="altay-item">С целью обеспечения в комплексе порядка и безопасности гостей запрещается: нарушать покой других гостей комплекса(прослушивать выносные аудиосистемы за пределами дома); оставлять посторонних лиц в доме в свое отсутствие; передавать посторонним лицам ключ; переставлять, выносить из дома мебель, постельные принадлежности; выносить за пределы комплекса полотенца, покрывала и другое имущество, принадлежащее комплексу.</li>
                        <li class="altay-item">При отсутствии гостя по месту проживания более суток (или по истечении 6 часов с момента наступления его расчетного часа), администрация вправе создать комиссию и сделать опись имущества, находящегося в номере. Материальные ценности в виде денежных средств, драгоценных металлов, ценных документов, администрация берет под свою ответственность.</li>
                        <li class="altay-item">Документы, деньги, ценные вещи, драгоценности необходимо хранить в индивидуальном сейфе.</li>
                        <li class="altay-item">В случае обнаружения пропажи личных вещей из дома гость немедленно должен известить об этом администрацию.</li>
                        <li class="altay-item">Администрация не несет ответственности за утрату ценных вещей гостя, находящихся в доме, при нарушении им порядка проживания.</li>
                        <li class="altay-item">В случае обнаружения забытых вещей администрация принимает меры к возврату их владельцам. Администрация отеля отвечает за сохранность вещей гостя и информирует владельца о необходимости забрать свои вещи. Если владелец не найден, администрация заявляет о находке в полицию или орган местного самоуправления.</li>
                        <li class="altay-item">Гость комплекса принимает к сведению и не возражает против факта использования в помещениях и на территории комплекса (за исключением домов постояльцев и ванной комнаты) систем видеонаблюдения.</li>
                        <li class="altay-item">Книга отзывов и предложений находится у администратора и выдается по первому требованию гостя (кроме лиц, находящихся в нетрезвом состоянии). Требования и жалобы рассматриваются администрацией в течение 1 дня.</li>
                        <li class="altay-item">Администрация оставляет за собой право посещения дома без согласования с гостем в случае задымления, пожара, затопления, а также в случае нарушения гостем настоящих правил проживания, общественного порядка, порядка пользования бытовыми приборами.</li>
                        <li class="altay-item">Парк-отель вправе расторгнуть договор на оказание гостиничных услуг в одностороннем порядке либо отказать в продлении срока проживания в случае нарушения гостем порядка проживания, несвоевременной оплаты услуг, причинения гостем материального ущерба. В случае причинения гостем материального ущерба администрация вправе применить штрафные санкции.</li>
                        <li class="altay-item">По окончании срока проживания гость сдает дом дежурному администратору.</li>
                        <li class="altay-item">В случаях, не предусмотренных настоящими правилами, администрация и потребитель руководствуются действующим законодательством РФ.</li>
                    </ol>
                    <p class="altay-text">
                        Насладитесь дикой природой горных вершин в комфортной обстановке
                    </p>
                </div>
            </div>
        </senction>
        <section class="video">
            <div class="container">
                <h2 class="section-title video-title">
                    Добро Пожаловать, На Алтай 
                </h2>
                <p class="video-text">Здесь могла быть ваша реклама</p>
                <iframe class="video-content" width="1000" height="500" src="https://www.youtube.com/embed/XSnAJPYzHUk?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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