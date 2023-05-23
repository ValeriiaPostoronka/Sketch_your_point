<?php
    $user = $_SESSION["user"];
    if (isset($_POST["task"])) {
        $task = $_POST["task"];
        $mark = $_POST["mark"];
        $dif = $_POST["difficulty"];
        $des = $_POST["description"];
        
        $dbURL = 'script/database.php';
        require_once $dbURL;

        $sql = "SELECT * FROM Tasks WHERE title = '$task'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
        ?>
            <script>window.onload = () => {alert('Вже точно таке ж завдання існує, вигадайте інше');}</script>
        <?php
        } 
        else {
            $sql = "INSERT INTO `Tasks` (`ID`, `title`, `mark`, `difficulty`, `description`) VALUES (NULL, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "siss", $task, $mark, $dif, $des);
                mysqli_stmt_execute($stmt);
                ?>
                <script>window.onload = () => {alert('Додавання завдання виконано успішно');}</script>
                <?php
            }
            else {
                ?>
                <script>window.onload = () => {alert('Щось пішло не так');}</script>
                <?php
            }
        }
    }
    $dbURL = 'script/database.php';
    require_once $dbURL;

    $sql = "SELECT * FROM `Tasks`";
    $result = mysqli_query($conn, $sql);
?>

<aside class="tasks">
    <div class="tasks__search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <form class="tasks__search-form">
            <input class="tasks__search-field" placeholder="Знайди нове завдання!" type="text">
        </form>
    </div>
    <div class="tasks__sorting">
        <label>Відсортувати за:</label>
        <select class="tasks__sorting-list">
            <option value="time" selected>Часом</option>
            <option value="rating">Рейтингом</option>
            <option value="my">Моїм виконанням</option>
        </select>
    </div>
    <div class="tasks__list">
        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/taskGetMarks.php'?>
        <?php 
            $id = $row["ID"];
            $sql = "SELECT * FROM `TaskMarks` WHERE user = '$user' AND taskID = $id";
            $plusRes = mysqli_query($conn, $sql);
            $rowPlus = mysqli_num_rows($plusRes);

            $sql = "SELECT * FROM `TaskMarksMin` WHERE user = '$user' AND taskID = $id";
            $minusRes = mysqli_query($conn, $sql);
            $rowMin = mysqli_num_rows($minusRes);
        ?>
        <div class="tasks__list-item" id="<?php echo $row['ID'];?>">
            <div class="item__evaluation">
                <i class="fa-solid fa-caret-up<?php echo $rowPlus > 0 ? " active" : ""; ?>"></i>
                <div class="item__evaluation-number"><?php echo $num > 0 ? '+'.$num : $num ;?></div>
                <i class="fa-solid fa-caret-down<?php echo $rowMin > 0 ? " active" : ""; ?>"></i>
                <?php if ($row['user'] == $_SESSION['user']) { ?>
                    <i class="fa-solid fa-star fa-xs" title="Ваше завдання"></i>
                <?php } ?>
            </div>
            <a class="item__description" href="<?php echo "http://".$_SERVER['HTTP_HOST'].'/canvas.php?taskID='.$row['ID']?>">
                <?php echo $row['title']; ?>
            </a>
        </div>
        <?php }?>
    </div>
    <label>Додай своє завдання:</label>
    <form class="tasks__text" id="submit-form" aria-label="Contact form" method="post" action="">
        <textarea class="tasks__text-field" placeholder="Моє завдання..." name="task"></textarea>
        <div class="section__actions">
            <?php $href = "#send-task"; $button = "<i class='fa-solid fa-arrow-turn-up'></i>"; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/buttons.php'; ?>
        </div>
    </form>
</aside>