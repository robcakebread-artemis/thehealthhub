<?php
$link = get_field('link','options');
?>

<div class="aws-cookie-consent">
    <div class="aws-cookie-text-wrapper">
        <p class="aws-cookie-text"><?= get_field('cookie_text','options'); ?><br> <a href="<?= $link['url']; ?>"><?= $link['title']; ?></a></p>
        <button id="aws-cookie-accept"><?= get_field('button_text','options'); ?></button>
    </div>
</div>