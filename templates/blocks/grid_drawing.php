<?php 
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    debug_to_console($user);
    debug_to_console($_SESSION['user'] === $user);
    debug_to_console(isset($user));

    $imgFiles = array_filter(scandir($_SERVER["DOCUMENT_ROOT"].'/results/'), function($item) use ($user) {
        if (strpos($item, $user) === 0) {
            return $item;   
        }
    });

    if (isset($_SESSION['admin'])) {?>
        <script>window.onload = () => {adminRulesAccept();}</script>
    <?php }
?>

<section class="section section-grid_drawing">
    <div class="container">
        <div class="section__inner">
            <?php $title = "Взяті завдання"; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/title.php'; ?>
            <div class="section__list">
                <?php if (!empty($imgFiles)) { ?>
                <?php foreach ($imgFiles as $image) { ?>
                    <?php
                        $task = explode('.', explode('_', $image)[1])[0];
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
                                <?php $subtitle = $row['title']; include $_SERVER["DOCUMENT_ROOT"].'/templates/elements/subtitle.php'; ?>
                            </h3>
                        </a>
                        <div class="item__mark">
                            Ствердження викладача: <i class="fa-regular fa-circle<?php echo $rowCount > 0 ? "-check" : "" ;?>" id="<?php echo $user."_".$row['ID']; ?>"></i>
                        </div>
                    </div>
                <?php } } else { ?>
                    <div class="item__mark">Поки ще немає робіт.</div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>