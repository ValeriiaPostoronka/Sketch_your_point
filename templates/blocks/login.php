<?php 
    $href = "#open-modal-log"; $button = "Log in"; 
    include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; 
?>

<script>
    <?php $link = "http://".$_SERVER['HTTP_HOST']."/assets/src/css/blocks/registration-login.css"; ?>
    if (document.querySelector("link[href='<?php echo $link; ?>']") === null) {
        let link = document.createElement("link");
        link.setAttribute("rel", "stylesheet");
        link.setAttribute ("type", "text/css");
        link.setAttribute ("href", "<?php echo $link; ?>");
        document.getElementsByTagName("head")[0].appendChild(link);
    }
</script>

<section class="section section-login">
    <?php
        if (isset($_POST["username"]) && !isset($_POST["email"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            require_once 'templates/blocks/script/database.php';
    
            $sql = "SELECT * FROM Users WHERE name = '$username'";
            $resultUser = mysqli_query($conn, $sql);
            $sql = "SELECT * FROM Users WHERE email = '$username'";
            $resultEmail = mysqli_query($conn, $sql);
            $email = mysqli_fetch_array($resultEmail, MYSQLI_ASSOC);
            $user = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);

            if ($user || $email) {
                if (password_verify($password, $user["password"]) || password_verify($password, $email["password"])) {
                    $_SESSION["user"] = $username;

                    $email = null;
                    $user = null;

                    $sql = "SELECT * FROM Admin WHERE name = '$username'";
                    $resultUser = mysqli_query($conn, $sql);
                    $sql = "SELECT * FROM Admin WHERE email = '$username'";
                    $resultEmail = mysqli_query($conn, $sql);

                    $email = mysqli_fetch_array($resultEmail, MYSQLI_ASSOC);
                    $user = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);

                    if ($user || $email) {
                        if ($password == $user["password"] || $password == $email["password"]) {
                            $_SESSION["admin"] = $username;
                        }
                    }

                    header("Location: index.php");
                    die();
                }
                else {
                    ?><script>window.onload = () => {alert('Password does not match');}</script><?php
                }
            }
            else {
                ?><script>window.onload = () => {alert('Email or user does not match');}</script><?php
            }
        }
    ?>
    <div class="modal" id="modal-login" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true">
                <div class="modal__wrapper">

                    <header class="modal__header">
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>

                    <main class="modal__content">
                        <div class="form-wrapper">
                            <?php $title = "Log in Form"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/title.php'; ?>
                        </div>

                        <form id="login-form" class="form" aria-label="Contact form" method="post" action="">
                            <div class="alert hidden">There are empty fields</div>
                            <div class="form__element">
                                <label>Username</label>
                                <br>
                                <input type="text" placeholder="Username" name="username">
                            </div>
                            <div class="form__element">
                                <label>Password</label>
                                <br>
                                <input type="password" placeholder="Password" name="password">
                            </div>
                            <div class="form__element section__actions">
                                <?php $href = "#submit-login"; $button = "Log in"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; ?>
                            </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>
</section>