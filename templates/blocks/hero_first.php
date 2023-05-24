<section class="section section-hero_first">
    <div class="container">
        <div class="section__inner">
            <?php $title = "Створюйте мистецтво разом з нами, навчайтеся цифровій графіці легко й весело "; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/title.php'; ?>
            <?php $subtitle = "Sketch your point - це безкоштовна онлайн-платформа для опанування дітьми навичок цифрової графіки методом цифрової ігровізації. Ця галузь є актуальною у зв'язку зі зростаючою важливістю цифрових навичок у сучасному світі. Вивчення цифрової графіки не тільки розвиває творчість та художні здібності у дітей, але й надає їм необхідні інструменти для вираження своїх ідей у цифровому середовищі. "; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/subtitle.php'; ?>
            <div class="main-image">
                <img src="../../assets/src/img/hero_image.png" alt="Main image">
            </div>
            <div class="log-in">
                <span class="log-in__text">Вже маєте акаунт?</span>
            </div>
            <div class="button_wrap">
                <?php
                if (isset($_SESSION["user"])) 
                { 
                    $href = "templates/blocks/script/logout.php"; $button = "Вийти з аккаунту"; 
                    include 'templates/elements/buttons.php';
                    $href = "templates/pages/artist.php"; $button = "Сторінка користувача"; 
                    include 'templates/elements/buttons.php';
                } 
                else 
                { 
                    $href = "#open-modal-log"; $button = "Увійти в аккаунт"; 
                    include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; 
                    $href = "#open-modal-reg"; $button = "Реєстрація";
                    include 'templates/elements/buttons.php'; 
                }
                ?>
            </div>
        </div>
    </div>
</section>