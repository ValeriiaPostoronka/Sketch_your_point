<?php
    $taskID = $taskRow['ID'];

    if (isset($_POST["comment"])) {
        $comment = $_POST['comment'];
        $user = $_SESSION['user'];
        
        $dbURL = $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';
        require_once $dbURL;

        $sql = "INSERT INTO `Comments` (`taskID`, `user`, `comment`) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "iss", $taskID, $user, $comment);
            mysqli_stmt_execute($stmt);
        }
    }

    $sql = "SELECT * FROM `Comments` WHERE taskID = $taskID";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
?>

<section class="section section-messanger">
    <div class="messages__list">
        <?php 
            if ($rowCount > 0) { 
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $user = $row['user'];
                    $sql = "SELECT SUM(mark) AS rating FROM `Marks` WHERE targetUser = '$user'";
                    $resultRating = mysqli_query($conn, $sql); 
                    $rowRating = mysqli_fetch_assoc($resultRating);     
        ?>
            <div class="messages__list-item">
                <div class="item__title">
                    <div class="item__title__name"><?php echo $row['user']; ?></div>
                    <div class="item__title__rating">Рейтинг користувача: <?php echo $rowRating['rating'] != null ? $rowRating['rating'] : 0;?></div>
                </div>
                <div class="item__description"><?php echo $row['comment']; ?></div>
            </div>
        <?php } } else { ?>
            <div class="messages__list-item">
                <div class="item__description">
                    Коментарі відсутні
                </div>
            </div>
        <?php } ?>
    </div>

    <form class="messages__text" method="post" action="" id="submit-form">
        <textarea class="messages__text-field" placeholder="Скажи, що думаєш..." name="comment"></textarea>
        <div class="section__actions">
            <?php $href = "#send-comment"; $button = "<i class='fa-solid fa-arrow-turn-up'></i>"; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/buttons.php'; ?>
        </div> 
    </form>
</section>