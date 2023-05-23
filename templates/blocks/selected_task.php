<?php 
    $profileScan = glob($_SERVER['DOCUMENT_ROOT'].'/profile/'.$taskRow['user'].'.*');
    if (empty($profileScan)) {
        $profile = "undefined.png";
    }
    else {
        $profile = basename($profileScan[0]);
    }
    $user = $taskRow['user'];
    $sql = "SELECT SUM(mark) AS rating FROM `Marks` WHERE targetUser = '$user'";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result); 
?>

<aside class="selected_task">

    <div class="artist-task">
        <img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/profile/".$profile;?>" alt="Artist photo">
        <div class="artist-task__title">
            <div class="artist-task__name"><?php echo $taskRow['user'];?></div>
            <div class="artist-task__rating">Рейтинг користувача: <?php echo $row['rating']; ?></div>
        </div>
    </div>
    <?php $title = "Інформація про завдання"; include '../elements/title.php'; ?>
    <div class="information">
        <div class="information__element">
            <label>Оцінка:</label>
            <div class="information__element-about"><?php echo $taskRow['mark'];?></div>
        </div>
        <div class="information__element">
            <label>Рівень складності:</label>
            <div class="information__element-about"><?php echo $taskRow['difficulty'];?></div>
        </div>
        <div class="information__element">
            <label>Тема завдання:</label>
            <div class="information__element-about"><?php echo $taskRow['title'];?></div>
        </div>
        <div class="information__element">
            <label>Опис:</label>
            <div class="information__element-about"><?php echo $taskRow['description'] != null ? $taskRow['description'] : "Опис відсутній";?></div>
        </div>
        <div class="section__actions">
            <?php $href = "http://".$_SERVER['HTTP_HOST'].'/canvas.php?taskID='.$taskRow['ID']; $button = "Виконати завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/buttons.php'; ?>
        </div>
    </div>

</aside>