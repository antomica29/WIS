<div class="wis-feed">
<h1 class="title">
    <?= $title ?>
</h1>
    <div class="blog-item-container">
        <?php
        $arr = explode('<div class="blog-section">', $page);

        $finalOutput = "";

        for ($i = 1;
        $i <= 4;
        $i++) {
        ?>
        <div class="blog-item-container-card">
            <?php
            echo $arr[$i];
            }

            ?>
        </div>
    </div>
    <div class="clear"></div>
