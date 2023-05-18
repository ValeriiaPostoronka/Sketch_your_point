<?php
    if (isset($_POST["task"])) {
        $task = $_POST["task"];
        
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
            $sql = "INSERT INTO `Tasks` (`ID`, `title`, `description`) VALUES (NULL, ?, '');";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "s", $task);
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
    <!-- <div class="tasks__container"> -->
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
            <div class="tasks__list-item">
                <div class="item__evaluation">
                    <i class="fa-solid fa-caret-up"></i>
                    <div class="item__evaluation-number">+20</div>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="item__description"><?php echo $row['title']; ?></div>
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
    <!-- </div> -->
</aside>