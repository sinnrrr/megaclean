<?php

$this->title = Yii::t('app', 'Gallery') . ' | ' . Yii::$app->name;
$this->registerCssFile('@web/css/gallery.css');


$imagesArray = scandir('img/gallery');

unset($imagesArray[0]);
unset($imagesArray[1]);

foreach ($imagesArray as $image) {
    $galleryItems[]['url'] = '@web/img/gallery/' . $image;
    $galleryItems[]['src'] = '@web/img/gallery/' . $image;
}

?>

<div class="site-gallery">
    <h1 class="text-center"><?= Yii::t('app', 'Gallery') ?></h1>
    <div class="flex-center">
        <?= dosamigos\gallery\Gallery::widget(['items' => $galleryItems]) ?>
    </div>
</div>
