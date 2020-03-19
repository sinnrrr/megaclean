<?php

use yii\helpers\Url;

/* @var $category */
/* @var $image */
/* @var $title */

?>

<div class="category">
    <a href="<?= Url::toRoute(['store', 'category' => $category]) ?>"><img src="<?= $image ?>" alt=''></a>
    <a href="<?= Url::toRoute(['store', 'category' => $category]) ?>" class='category-link'><?= $title ?></a>
</div>
