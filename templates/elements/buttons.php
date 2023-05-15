<!-- href - link for button.
button - name for button -->
<script>
    <?php $link = "http://".$_SERVER['HTTP_HOST']."/assets/src/css/elements/button.css"; ?>
    if (document.querySelector("link[href='<?php echo $link; ?>']") === null) {
        console.log("siag");
        let link = document.createElement("link");
        link.setAttribute("rel", "stylesheet");
        link.setAttribute ("type", "text/css");
        link.setAttribute ("href", "<?php echo $link; ?>");
        document.getElementsByTagName("head")[0].appendChild(link);
    }
</script>

<div class="section__actions">
    <a href="<?php echo $href; ?>" class="button"><?php echo $button;?></a>
</div>