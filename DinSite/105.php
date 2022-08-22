<?php
    include "path.php";
    include "app/database/db.php";
?>

<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d60f6d9b1b.js" crossorigin="anonymous"></script>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
    <title>Балаково-Центролит (Разработка)></title>
</head>
<body>
<!-- HEADER -->
<?php include ("app/include/header.php"); ?>
<div class="container con-105">
    <div>
        <h2>
        АКТУАЛЬНЫЕ ВАКАНСИИ АО «БАЛАКОВО-ЦЕНТРОЛИТ»
        </h2>
    </div>
    <div class="row">
        <div class="col col-105">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="ct-hack carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/vac1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/vac2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/vac3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/vac4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/vac5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="text-105">
                <h3>
                    АО «БАЛАКОВО-ЦЕНТРОЛИТ» ПРЕДЛАГАЕТ:
                </h3>
                <p>
                    <i class="fa-solid fa-check"></i>&nbsp;ОФИЦИАЛЬНОЕ ТРУДОУСТРОЙСТВО;<br>
                    <i class="fa-solid fa-check"></i>&nbsp;СВОЕВРЕМЕННУЮ ВЫПЛАТУ ЗАРАБОТНОЙ ПЛАТЫ;<br>
                    <i class="fa-solid fa-check"></i>&nbsp;КОРПОРАТИВНЫЙ ТРАНСПОРТ;<br>
                    <i class="fa-solid fa-check"></i>&nbsp;ВОЗМОЖНОСТЬ КАРЬЕРНОГО РОСТА;<br>
                    <i class="fa-solid fa-check"></i>&nbsp;ОБУЧЕНИЕ ПРОФЕССИИ ЗА СЧЕТ ПРЕДПРИЯТИЯ;<br>
                    <i class="fa-solid fa-check"></i>&nbsp;КАЧЕСТВЕННОЕ И НЕДОРОГОЕ ПИТАНИЕ В СТОЛОВОЙ ПРЕДПРИЯТИЯ;<br>
                    <i class="fa-solid fa-check"></i>&nbsp;ПРЕДОСТАВЛЕНИЕ КОМПЕНСАЦИЙ И ЛЬГОТ, ПРЕДУСМОТРЕННЫХ КОЛЛЕКТИВНЫМ ДОГОВОРОМ.
                </p>
            </div>
        </div>
        <div class="col">
            <div class="bd-example">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                Обрубщик, занятый обработкой литья и сварных изделий абразивными кругами и пневматическим инструментом
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> знание устройства шаблонов и условия их применения при обрубке; места подключения и переключения воздухопровода и требуемое давление воздуха для нормальной работы пневматического инструмента; механические свойства обрабатываемых материалов. (обучение на производстве в процессе работы).
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> обрубка, опиливание, зачистка и вырубка пневматическим молотком или зубилом вручную, абразивными кругами, шарошками заливов, приливов, пригара, прибылей, заусенцев, литников и других неровностей на внутренних поверхностях в неудобных для работы местах в мелких отливках и деталях, наружных поверхностей крупных и средних размеров отливок, труб, поковок, деталей и при поточно-массовом производстве — наружных поверхностей мелких отливок. Удаление из отливок сложных по конфигурации остатков стержней и каркасов. Вырубка дефектов в металле под заварку в простых отливках.
                                <br><strong>Заработная плата:</strong> сдельно-премиальная оплата труда, от 30 000 до 120 000 руб. (ученический договор на 2 месяца с выплатой стипендии — 19 550руб)
                                <br><strong>График работы:</strong> сменный график работы ( 1 смена с 07.00 до 15.30, 2 смена с 15.30 до 00.00, 3 смена с 00.00 до 07.00) Полный соц.пакет, бесплатное молоко и питание, льготное обеспечение
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Пультовщик электропавильной печи
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> знание принципа работы пусковой аппаратуры; устройство оборудования пульта, автоматического управления электродами печи; номинальные мощности печных трансформаторов и допустимые нагрузки; назначение применяемых контрольно-измерительных приборов
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> включение и выключение с пульта электропитания печного трансформатора, генератора, редуктора на печах . Регулирование по команде сталевара или плавильщика ферросплавов напряжения и силы тока по ходу плавки. Управление подъемом и опусканием электродов, наклоном печи при выпуске металла. Наблюдение за показаниями контрольно-измерительных приборов и сигнальной аппаратуры. Ведение записей фактического режима плавки и расхода электроэнергии. Участие в ремонтах электрооборудования пульта.
                                <br><strong>Заработная плата:</strong> до 27 000 руб.
                                <br><strong>График работы:</strong> сменный график работы ( 1 смена с 07.00 до 15.30, 2 смена с 15.30 до 00.00, 3 смена с 00.00 до 07.00)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Шихтовщик на шихтовый двор
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> знание правил ведения погрузочно-разгрузочных работ; желательно наличие действующего удостоверения стропальщика.
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> погрузка шихты с одновременной подготовкой ее в шихтовых отделениях сталеплавильных и литейных цехах, Погрузка, выгрузка, сортировка, укладка, переноска, перевеска, с применением простейших погрузочно-разгрузочных приспособлений и др.
                                <br><strong>Заработная плата:</strong> от 36000 руб.
                                <br><strong>График работы:</strong> сменный график работы по 12 часов ( 2 дня с 07.00 до 19.00, 2 дня выходных, 2 дня с 19.00 до 07.00)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                Лаборант
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> начальное профессиональное или среднее профессиональное образование (профильное); Опыт работы по специальности желателен.
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> испытание шихтовых и формовочных смесей для жаропрочных сплавов. Наладка приборов и аппаратов, применяемых для испытаний. Составление рецептов на приготовление формовочных, шихтовых и стержневых смесей для чугунных, стальных, цветных отливок и жаропрочных сплавов, строительных и огнеупорных материалов.
                                <br><strong>Заработная плата:</strong> от 22 500 руб.
                                <br><strong>График работы:</strong> сменный график работы ( 1 смена с 07.00 до 15.30, 2 смена с 15.30 до 00.00, 3 смена с 00.00 до 07.00)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                Дефектоскопист по магнитному и ультразвуковому контролю
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> среднее профессиональное образование без предъявления требований к стажу (обучение на производстве в процессе работы)
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> проверка качества деталей простой и средней конфигурации. Умение настраивать магнитные, электромагнитные и простые ультразвуковые дефектоскопы. Ведение учетной документации. При необходимости работа с более сложными задачами, если будет находиться под контролем дефектоскописта с более высокой разрядом.
                                <br><strong>Заработная плата:</strong> от 24 000 руб.
                                <br><strong>График работы:</strong> сменный график работы по 12 часов ( 2 дня с 07.00 до 19.00, 2 дня выходных, 2 дня с 19.00 до 07.00)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                Электрогазосварщик 5 разряда
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> удостоверение на II группу допуска по работе с электроустановками. Опыт работы обязателен
                                <br><strong>Образование:</strong> начальное профессиональное или среднее профессиональное образование по специальности «Электрогазосварщик» или свидетельство о специальной подготовке специалистов сварочного производства по направлению «Электрогазосварщик»
                                <br><strong>Должностные обязанности:</strong> сварка узлов и деталей
                                <br><strong>Заработная плата:</strong> от 40 000 руб.
                                <br><strong>График работы:</strong> сменный график работы ( 1 смена с 07.00 до 15.30, 2 смена с 15.30 до 00.00, 3 смена с 00.00 до 07.00)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                                Контролер в литейном производстве
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> среднее профессиональное образование без предъявления требований к стажу
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> определение соответствия качества отливок техническим условиям. Контроль соблюдения технологических инструкций. Контроль сложных деталей из цветных металлов, сплавов и пластмасс, отлитых под давлением
                                <br><strong>Заработная плата:</strong> от 24 000 руб.
                                <br><strong>График работы:</strong> сменный график работы ( 1 смена с 07.00 до 15.30, 2 смена с 15.30 до 00.00, 3 смена с 00.00 до 07.00)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                                Токарь
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> опыт работы не менее 3х лет. Вохможна работа вахтой
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> работа на станках ДИП-300 и ДИП-500
                                <br><strong>Заработная плата:</strong> от 50 000 руб. до 100 000 руб.
                                <br><strong>График работы:</strong> сменный график работы
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                                Уборщик в литейных цехах
                            </button>
                        </h3>
                        <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNine">
                            <div class="accordion-body">
                                <strong>Требования к кандидату:</strong> опыт работы желателен
                                <br><strong>Образование:</strong> среднее профессиональное образование
                                <br><strong>Должностные обязанности:</strong> поддержание закрепленной территории в течение дня в чистоте
                                <br><strong>Заработная плата:</strong> 20 000 руб.
                                <br><strong>График работы:</strong> сменный график работы(1 смена с 07.00 до 15.30, 2 смена с 15.30 до 00.00, 3 смена с 00.00 до 07.00)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="last-text-105">
            <h3>
                ПО ВОПРОСАМ ТРУДОУСТРОЙСТВА, А ТАКЖЕ ПОЛУЧЕНИЯ ДОПОЛНИТЕЛЬНОЙ ИНФОРМАЦИИ ОБРАЩАТЬСЯ В ОТДЕЛ КАДРОВ.<br>
                ПО АДРЕСУ: УЛ. САРАТОВСКОЕ ШОССЕ, 10. ПРОЕЗД: НА ТРОЛЛЕЙБУСЕ №6, №2.<br>
                ТЕЛЕФОН: 36-00-73;  8 909 341 46 44<br>
                ВЫ МОЖЕТЕ НАПРАВИТЬ НАМ СВОЕ РЕЗЮМЕ НА АДРЕС <a href=""><i class="fas fa-envelope"></i> ok-zemskova@bcl64.ru</a>, ИЛИ ЗАПОЛНИТЬ АНКЕТУ НА НАШЕМ САЙТЕ
            </h3>
            <button type="button" class="btn btn-outline-secondary">Заполнить анкету</button>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include ("app/include/footer.php"); ?>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>

