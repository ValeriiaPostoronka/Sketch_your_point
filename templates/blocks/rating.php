<?php
    $dbURL = $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';
    require_once $dbURL;
    
    $sql = "SELECT name FROM `Users`";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $ratingRow = array();

    foreach ($users as $user) {
        $currentUser = $user['name'];
        $sql = "SELECT SUM(mark) AS rating FROM `Marks` WHERE targetUser = '$currentUser'";
        $resultRating = mysqli_query($conn, $sql); 
        $rowRating = mysqli_fetch_assoc($resultRating);     

        $sql = "SELECT COUNT(*) AS crTasks FROM `Tasks` WHERE user = '$currentUser'";
        $resultRating = mysqli_query($conn, $sql);
        $crTasks = mysqli_fetch_assoc($resultRating);

        $sql = "SELECT COUNT(*) AS complTasks FROM `Marks` WHERE targetUser = '$currentUser'";
        $resultRating = mysqli_query($conn, $sql);
        $complTasks = mysqli_fetch_assoc($resultRating);

        $ratingRow[] = array("name" => $currentUser, "rating" => $rowRating['rating'], "crTasks" => $crTasks["crTasks"], "complTasks" => $complTasks["complTasks"]);
    }

    function compare($a, $b) {
        if ($a['rating'] == $b['rating']) {
            return 0;
        }
        return ($a['rating'] < $b['rating']) ? 1 : -1;
    }
    
    usort($ratingRow, 'compare');
?>

<section class="section section-rating">
    <div class="container">
        <div class="section__inner">
        <?php $title = "Рейтинг користувачів"; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/title.php'; ?>
            <div class="artist-list">
                <?php
                    $i = 1; 
                    foreach ($ratingRow as $row) { 
                        $profileScan = glob($_SERVER['DOCUMENT_ROOT'].'/profile/'.$row["name"].'.*');
                    
                    if (empty($profileScan)){
                        $profile = "undefined.png";
                    }
                    else {
                        $profile = basename($profileScan[0]);
                    }
                ?>
                <a href="http://localhost:8888/templates/pages/artist.php?user=<?php echo $row["name"]?>" class="artist-list__item">
                    <div class="artist-task">
                        <div class="artist-task__rating">
                            <?php echo $i;?>
                        </div>
                        <img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/profile/".$profile;?>" alt="Artist photo">
                            <div class="artist-task__name"><?php echo $row["name"]; ?></div>
                        <div class="artist-task__number">Кількість виконаних завдань: 
                            <?php echo $row["complTasks"] != null ? $row["complTasks"] : 0;?>
                        </div>
                        <div class="artist-task__mark">Бали користувача: 
                            <?php echo $row["rating"] != null ? $row["rating"] : 0;?>
                        </div>
                        <div class="artist-task__create">Кількість створених завдань: 
                            <?php echo $row["crTasks"] != null ? $row["crTasks"] : 0;?>
                        </div>
                    </div>
                </a>
                <?php $i++; } ?>
                
            </div>
        </div>
    </div>
</section>