<?php

use yii\helpers\Url;

/* @var $mode */
/* @var $category */
/* @var $image */
/* @var $title */
/* @var $productName */

?>

<div class="category">
    <a href="<?= Url::toRoute([
            'products/store',
            'mode' => $mode,
            'category' => $category
    ]) ?>">
        <img src="<?= $image ?>" alt=''>
    </a>
    <a href="<?= Url::toRoute([
            'products/store',
            'mode' => $mode,
            'category' => $category
    ]) ?>" class='category-link'><?= $title ?></a>
</div>
