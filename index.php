<?php

$files = scandir('img/cardBacks');

$images = array_filter($files, function($f) {
   return is_file("img/cardBacks/$f") && preg_match('/.*\.jpg$/', $f);
});
?>
<link rel="stylesheet" href="css/style.css">
<div class="main">
    <div class="allGames">
        <?php foreach ($images as $image): ?>
            <div class="game">
                <a href="play.php?game=<?=explode('.', $image)[0]?>"><img src="img/cardBacks/<?=$image?>" alt="<?=$image?>"></a>
            </div>
        <?php endforeach;?>
    </div>
</div>

<script src="js/script.js"></script>

