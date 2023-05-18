<div class="modal" id="modal-task" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true">
                <div class="modal__wrapper">

                    <header class="modal__header">
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>

                    <main class="modal__content">
                        <div class="form-wrapper">
                            <?php $title = "Доповніть своє завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/title.php'; ?>
                        </div>

                        <div class="artist-task">
                            <img src="../../assets/src/img/106906351.jpeg" alt="Artist photo">
                            <div class="artist-task__title">
                                <div class="artist-task__name">Посторонка Валерія</div>
                                <div class="artist-task__text">Намалюйте свого аватара, що стане вашою індивідуальною заставкою.</div>
                            </div>
                        </div>

                        <form id="task-form" class="form" aria-label="Task form" method="post" action="">
                            <div class="first-line">
                                <div class="form__element">
                                    <label>Оцінка (1-10)</label>
                                    <br>
                                    <input type="number" name="tentacles" value="0" min="1" max="10">
                                </div>
                                <div class="form__element">
                                    <label>Рівень складності</label>
                                    <br>
                                    <select class="tasks__sorting-list">
                                        <option value="initial" selected="">Початковий</option>
                                        <option value="middle">Середній</option>
                                        <option value="high">Високий</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form__element">
                                <label>Опис</label>
                                <br>
                                <textarea class="tasks__description-field" placeholder="Детальний опис завдання..." name="task"></textarea>
                            </div>
                            <div class="form__element section__actions">
                                <?php $href = "#submit-login"; $button = "Додати завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; ?>
                            </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>