<?php
    if (isset($_GET['user'])){
        $user = $_GET['user'];        
    }
    else {
        $user = $_SESSION['user'];
    }

    $dbURL = $_SERVER['DOCUMENT_ROOT'].'/templates/blocks/script/database.php';
    require_once $dbURL;

    $sql = "SELECT * FROM `Users` WHERE email = '$user' OR name = '$user'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    else {
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM `Users` WHERE email = '$user' OR name = '$user'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
?>

<?php 
    $profileScan = glob($_SERVER['DOCUMENT_ROOT'].'/profile/'.$user.'.*');
    if (empty($profileScan)){
        $profile = "undefined.png";
    }
    else {
        $profile = basename($profileScan[0]);
    }
?>

<section class="section section-hero_artist">
    <div class="container">
        <div class="section__inner">
            <div class="section__image">
                <picture>
                    <img id="avatar" src="<?php echo "http://".$_SERVER['HTTP_HOST']."/profile/".$profile;?>" alt="artist">
                </picture>
            </div>
            <div class="section__text">
                <?php $title = $row['name']; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/title.php'; ?>
                <?php $subtitle = $row['descriprion'] == NULL ? "Опис пустий" : $row['descriprion'] ; include $_SERVER['DOCUMENT_ROOT'].'/templates/elements/subtitle.php'; ?>
                <?php if ($user == $_SESSION['user']) {?>
                    <div class="section__actions">
                        <label for="file-upload" class="button">
                            Завантажте фото профілю
                        </label>
                        <input id="file-upload" type="file" accept="image/*"/>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>