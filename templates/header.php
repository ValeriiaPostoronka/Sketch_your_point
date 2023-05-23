<?php 
    function getLoadFile($fileName) {
        if (file_exists($_SERVER['DOCUMENT_ROOT']."/results/".$fileName)) { 
            $filePath = "http://".$_SERVER['HTTP_HOST']."/results/".$fileName;
            echo "<script>window.onload = () => {loadImage(\"".$filePath."\");}</script>";
        }
    }

    if (isset($_GET['taskID']) && basename($_SERVER['PHP_SELF']) == "canvas.php") {
        $ID = $_GET['taskID'];
    }
?>
<header class="header">
    <a href="<?php echo "http://".$_SERVER['HTTP_HOST'];?>" class="header__logo">
        <i class="fa-solid fa-paintbrush fa-2xl fa-beat-fade"></i>
    </a>
    <?php if (basename($_SERVER['PHP_SELF']) != "canvas.php") { ?>
        <div class="header__page">
            <a href = "http://localhost:8888/canvas.php">Редактор</a>
            <a href = "http://localhost:8888/templates/pages/artist.php">Сторінка користувача</a>
            <a href = "#">Рейтинг</a>
        </div>
    <?php } else { ?>
        <div class="header__task">
            <?php 
            $fileName = $_SESSION['user'];
            if (isset($_GET['taskID'])) {
                $dbURL = $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';
                require_once $dbURL;
        
                $sql = "SELECT * FROM Tasks WHERE ID = ".$ID;
                $result = mysqli_query($conn, $sql);
                $rowNum = mysqli_num_rows($result);

                if ($rowNum > 0) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo $row['ID'].'. '.$row['title'];
                    $fileName = $fileName."_".$row['ID'].".png";
                    getLoadFile($fileName);
                }
                else { 
                    $fileName = $fileName.".png";
                    getLoadFile($fileName); 
                ?>
                    Вдалого тренування!    
                <?php }
            } 
            else { 
                $fileName = $fileName.".png";
                    getLoadFile($fileName);
                ?>
                Вдалого тренування!
            <?php } ?>
        </div>
    <?php }?>
    <?php 
        $href = "http://".$_SERVER['HTTP_HOST']."/templates/blocks/script/logout.php"; $button = "Log out"; 
        include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/buttons.php';
    ?>
</header>