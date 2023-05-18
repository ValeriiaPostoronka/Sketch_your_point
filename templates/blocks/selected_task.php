<aside class="selected_task">

    <div class="artist-task">
        <img src="../../assets/src/img/106906351.jpeg" alt="Artist photo">
        <div class="artist-task__title">
            <div class="artist-task__name">Посторонка Валерія</div>
            <div class="artist-task__rating">Рейтинг користувача: </div>
        </div>
    </div>
    <?php $title = "Інформація про завдання"; include '../elements/title.php'; ?>
    <div class="information">
        <div class="information__element">
            <label>Оцінка:</label>
            <div class="information__element-about">10</div>
        </div>
        <div class="information__element">
            <label>Рівень складності:</label>
            <div class="information__element-about">Середній</div>
        </div>
        <div class="information__element">
            <label>Тема завдання:</label>
            <div class="information__element-about">Бла бла бла</div>
        </div>
        <div class="information__element">
            <label>Опис:</label>
            <div class="information__element-about">Бла бла бла</div>
        </div>
        <div class="section__actions">
            <?php $href = "#submit-login"; $button = "Виконати завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; ?>
        </div>
    </div>

</aside>