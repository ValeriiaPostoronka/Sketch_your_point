<?php 
    $imgFiles = scandir($_SERVER["DOCUMENT_ROOT"].'/results/');
    $userImg = [];

    foreach ($imgFiles as $string) {
        if (strpos($string, $_SESSION['user']) === 0) {
            $userImg[] = $string;
        }
    }   
?>

<section class="section section-grid_drawing">
    <div class="container">
        <div class="section__inner">
            <?php $title = "Search engines analyze text, images are not text"; include '../elements/title.php'; ?>
            <div class="section__list">
                <?php foreach ($userImg as $image) {?>
                    <a data-fslightbox="gallery" href="http://<?php echo $_SERVER['HTTP_HOST'].'/results/'.$image; ?>" class="item">
                        <div class="item__image">
                            <img src="http://<?php echo $_SERVER['HTTP_HOST'].'/results/'.$image; ?>" alt="">
                        </div>
                        <h3 class="item__name"><?php $subtitle = "Search engines analyze text"; include '../elements/subtitle.php'; ?></h3>
                    </a>
                <?php } ?>
            </div>
            <div class="section__actions">
                <?php $href = "#"; $button = "Log in"; include '../elements/buttons.php'; ?>
            </div>
        </div>
    </div>
</section>