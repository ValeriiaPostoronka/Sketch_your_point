<!-- subtitle - subtitle content -->
<script>
    <?php $link = "http://".$_SERVER['HTTP_HOST']."/assets/src/css/elements/subtitle.css"; ?>
    if (document.querySelector("link[href='<?php echo $link; ?>']") === null) {
        let link = document.createElement("link");
        link.setAttribute("rel", "stylesheet");
        link.setAttribute ("type", "text/css");
        link.setAttribute ("href", "<?php echo $link; ?>");
        document.getElementsByTagName("head")[0].appendChild(link);
    }
</script>


<div class="section__subtitle">
    <p>
        <?php echo $subtitle; ?> 
    </p>
</div>
