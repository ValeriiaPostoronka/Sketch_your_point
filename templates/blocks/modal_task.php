<?php
    $user = $_SESSION['user'];
    $profileScan = glob($_SERVER['DOCUMENT_ROOT'].'/profile/'.$user.'.*');
    if (empty($profileScan)){
        $profile = "undefined.png";
    }
    else {
        $profile = basename($profileScan[0]);
    }
?>

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
                        <img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/profile/".$profile;?>" alt="Artist photo">
                        <div class="artist-task__title">
                            <div class="artist-task__name"><?php echo $user;?></div>
                            <textarea form="task-form" name="task" class="artist-task__text"></textarea>
                        </div>
                    </div>

                    <form id="task-form" class="form" aria-label="Task form" method="post" action="">
                        <div class="first-line">
                            <div class="form__element">
                                <label>Оцінка (1-10)</label>
                                <br>
                                <input type="number" name="mark" value="5" min="1" max="10">
                            </div>
                            <div class="form__element">
                                <label>Рівень складності</label>
                                <br>
                                <select class="tasks__sorting-list" name="difficulty">
                                    <option value="Початковий" selected>Початковий</option>
                                    <option value="Середній">Середній</option>
                                    <option value="Високий">Високий</option>
                                </select>
                            </div>
                        </div>
                        <div class="form__element">
                            <label>Опис</label>
                            <br>
                            <textarea class="tasks__description-field" placeholder="Детальний опис завдання... (не обов'язково)" name="description"></textarea>
                        </div>
                        <div class="form__element section__actions">
                            <?php $href = "#submit-form"; $button = "Додати завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; ?>
                        </div>
                    </form>
                </main>

            </div>
        </div>
    </div>
</div>