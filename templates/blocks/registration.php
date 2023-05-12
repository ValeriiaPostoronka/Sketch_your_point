<section class="section section-reg">
    <?php
        if (isset($_POST["email"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            require_once 'templates/blocks/script/database.php';

            $sql = "SELECT * FROM Users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
            ?>
                <script>window.onload = () => {alert('Used email already defined in tha database, try again');}</script>
            <?php
            }
            else {
                $sql = "INSERT INTO Users (email, name, password) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $password_hash);
                    mysqli_stmt_execute($stmt);
                    //all good
                    ?>
                    <div class='success'>Registration is successful!</div>
                    <?php
                }
                else {
                    die("Something went wrong");
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
                            <?php $title = "Registration"; include 'templates/elements/title.php'; ?>
                        </div>

                        <form id="registration-form" class="form" aria-label="Contact form" method="post" action="">
                            <div class="alert hidden">All fields are required</div>
                            <div class="alert hidden">Password must be at least 8 characters long</div>
                            <div class="alert hidden">Confirm password is wrong</div>
                            <div class="alert hidden">Check your email</div>
                            <div class="form__element">
                                <label>Username</label>
                                <br>
                                <input type="text" placeholder="Username" name="username">
                            </div>
                            <div class="form__element">
                                <label>Email</label>
                                <br>
                                <input type="email" placeholder="Email" name="email">
                            </div>
                            <div class="form__element">
                                <label>Password</label>
                                <br>
                                <input type="password" placeholder="Password" name="password">
                            </div>
                            <div class="form__element">
                                <label>Repeat password</label>
                                <br>
                                <input type="password" placeholder="Password" name="repeatPassword">
                            </div>
                            <div class="form__element section__actions">
                                <?php $href = "#submit-registration"; $button = "Registration"; include 'templates/elements/buttons.php'; ?>
                            </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>
</section>
                            