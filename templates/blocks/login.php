<section class="section section-login">
    <div class="modal" id="modal-registration" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true">
                <div class="modal__wrapper">

                    <header class="modal__header">
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>

                    <main class="modal__content">
                        <div class="form-wrapper">
                            <?php $title = "Log in Form"; include 'templates/elements/title.php'; ?>
                        </div>
                        <form class="form" aria-label="Contact form">
                            <div class="form__element">
                                <label>Username</label>
                                <br>
                                <input type="text" placeholder="Username">
                            </div>
                            <div class="form__element">
                                <label>Password</label>
                                <br>
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="form__element section__actions">
                                <?php $href = "#"; $button = "Log in"; include 'templates/elements/buttons.php'; ?>
                            </div>
                        </form>
                    </main>
                    
                </div>
            </div>
        </div>
    </div>
</script>