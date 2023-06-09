<section class="section section-reg">
    <?php
    
        if (isset($_POST["email"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $description = $_POST["description"];
            
            require_once $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';

            $sql = "SELECT * FROM Users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
            ?>
                <script>window.onload = () => {alert('Користувач з такою електронною поштою вже існує.');}</script>
            <?php
            }
            else {
                $sql = "INSERT INTO Users (email, name, password, descriprion) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $email, $username, $password_hash, $description);
                    mysqli_stmt_execute($stmt);
                    ?>
                    <script>window.onload = () => {alert('Вітаю! Реєстрація пройшла успішно.');}</script>
                    <?php
                }
                else {
                    die("Щось пішло не так. Перевірте введені дані та спробуйте надіслати форму повторно. Якщо проблема не буде вирішена зв'яжіться з нами.");
                }
            }
        }                
    ?>
    <div class="modal" id="modal-registration" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true">
                <div class="modal__wrapper">

                    <header class="modal__header">
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>

                    <main class="modal__content">
                        <div class="form-wrapper">
                            <?php $title = "Реєстрація"; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/title.php'; ?>
                        </div>

                        <form id="registration-form" class="form" aria-label="Contact form" method="post" action="">
                            <div class="alert hidden">Необхідно заповнити всі поля</div>
                            <div class="alert hidden">Пароль повинен бути більше 8 символів</div>
                            <div class="alert hidden">Повторений пароль неправильний</div>
                            <div class="alert hidden">Перевірте використану пошту</div>
                            <div class="form__element">
                                <label>Нікнейм</label>
                                <br>
                                <input type="text" placeholder="Нікнейм" name="username">
                            </div>
                            <div class="form__element">
                                <label>Електронна пошта</label>
                                <br>
                                <input type="email" placeholder="Електронна пошта" name="email">
                            </div>
                            <div class="form__element">
                                <label>Пароль</label>
                                <br>
                                <input type="password" placeholder="Пароль" name="password">
                            </div>
                            <div class="form__element">
                                <label>Повторіть пароль</label>
                                <br>
                                <input type="password" placeholder="Повторіть пароль" name="repeatPassword">
                            </div>
                            <div class="form__element">
                                <label>Опис користувача</label>
                                <br>
                                <textarea placeholder="Опис..." name="description"></textarea>
                            </div>
                            <div class="form__element section__actions">
                                <?php $href = "#submit-registration"; $button = "Реєстрація"; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/buttons.php'; ?>
                            </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>
</section>
                            