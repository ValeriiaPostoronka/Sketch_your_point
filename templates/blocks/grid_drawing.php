<?php 
    if (isset($taskRow)) {
        $imgFiles = array_filter(scandir($_SERVER["DOCUMENT_ROOT"].'/results/'), function($item) use ($taskRow) {
            if (strpos($item, '_'.$taskRow['ID']) !== false) {
                return $item;   
            }
        });
    } else {
        $imgFiles = array_filter(scandir($_SERVER["DOCUMENT_ROOT"].'/results/'), function($item) use ($user) {
            if (strpos($item, $user.'_') === 0) {
                return $item;   
            }
        });
    }    

    if (isset($_SESSION['admin'])) {?>
        <script>window.onload = () => {adminRulesAccept();}</script>
    <?php }
?>

<section class="section section-grid_drawing">
    <div class="container">
        <div class="section__inner">
            <?php $title = "Взяті завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/title.php'; ?>
                <?php if (!empty($imgFiles)) { ?>
                <div class="section__list">
                <?php foreach ($imgFiles as $image) { ?>
                    <?php
                        $task = isset($taskRow) ? $taskRow['ID'] : explode('.', explode('_', $image)[1])[0];
                        $user = explode('_', $image)[0];
                        $sql = "SELECT * FROM Tasks WHERE ID = ".$task;
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $sql = "SELECT * FROM Marks WHERE targetUser = '$user' AND taskID = $task";
                        $rowCount = mysqli_num_rows(mysqli_query($conn, $sql));
                    ?>
                    <div class="item">
                        <a data-fslightbox="gallery" href="http://<?php echo $_SERVER['HTTP_HOST'].'/results/'.$image; ?>" class="item">
                            <div class="item__image">
                                <img src="http://<?php echo $_SERVER['HTTP_HOST'].'/results/'.$image; ?>" alt="">
                            </div>
                            <h3 class="item__name">
                                <?php $subtitle = isset($taskRow) ? $user : $row['title']; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/subtitle.php'; ?>
                            </h3>
                        </a>
                        <div class="item__mark">
                            Ствердження викладача: 
                            <i class="fa-regular fa-circle<?php echo $rowCount > 0 ? "-check" : "" ;?>"  id="<?php echo $user."_".$row['ID']."_".$row['mark']; ?>">
                            </i>
                        </div>
                    </div>
                <?php } ?>
                </div>
            <?php } else { ?>
                <div class="nothing__grid">Поки ще немає робіт.</div>
            <?php } ?>
        </div>
    </div>
</section>