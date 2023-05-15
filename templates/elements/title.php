<!-- title - content of the h2 tag -->
<script>
    <?php $link = "http://".$_SERVER['HTTP_HOST']."/assets/src/css/elements/title.css"; ?>
    if (document.querySelector("link[href='<?php echo $link; ?>']") === null) {
        let link = document.createElement("link");
        link.setAttribute("rel", "stylesheet");
        link.setAttribute ("type", "text/css");
        link.setAttribute ("href", "<?php echo $link; ?>");
        document.getElementsByTagName("head")[0].appendChild(link);
    }
</script>

<h2 class="section__title"><?php echo $title; ?></h2>