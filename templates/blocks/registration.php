<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/base/base.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/button.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/elements/title.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/src/css/blocks/registration-login.css">
</head>
<body>
    <div class="modal is-open" id="modal-registration" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true">
                <div class="modal__wrapper">

                    <header class="modal__header">
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>

                    <main class="modal__content">
                        <div class="form-wrapper">
                            <?php $title = "Registration Form"; include '../elements/title.php'; ?>
                        </div>
                        <form class="form" aria-label="Contact form">
                            <div class="form__element">
                                <label>Username</label>
                                <br>
                                <input type="text" placeholder="Username">
                            </div>
                            <div class="form__element">
                                <label>Email</label>
                                <br>
                                <input type="email" placeholder="Email">
                            </div>
                            <div class="form__element">
                                <label>Password</label>
                                <br>
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="form__element section__actions">
                                <?php $href = "#"; $button = "Log in"; include '../elements/buttons.php'; ?>
                            </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
</body>
</html>