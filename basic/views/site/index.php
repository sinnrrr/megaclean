<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Echo-Eko';
$this->registerCssFile('@web/css/index.css');
$this->registerCssFile("@web/css/all.min.css");

?>

<div class="site-index">
    <div id="myCarousel" class="carousel slide" data-ride="carousel"">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="https://images.wallpaperscraft.ru/image/glitchart_linii_pikseli_121670_1280x720.jpg" alt="">
            </div>

            <div class="item">
                <img src="https://images.wallpaperscraft.ru/image/steklo_kapli_mokryj_130747_1280x720.jpg" alt="">
            </div>

            <div class="item">
                <img src="https://images.wallpaperscraft.ru/image/neon_konstruktsiia_svechenie_123932_1280x720.jpg" alt="">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <hr>
    <div class="cardsHolder">
        <h1><?= \Yii::t('app', 'We render services at rent and upkeep for mobile sanitary systems') ?></h1>
        <div class="flex-center">
            <div class="card">
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'rent']) ?>" class="fas fa-person-dolly card-icon"></a>
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'rent']) ?>"><?= \Yii::t('app', 'Rent') ?></a>
            </div>
            <div class="card">
                <a href="<?= Url::toRoute('site/service') ?>" class="fas fa-recycle card-icon"></a>
                <a href="<?= Url::toRoute('site/service') ?>"><?= \Yii::t('app', 'Service') ?></a>
            </div>
            <div class="card">
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'sale']) ?>" class="fas fa-shopping-cart card-icon" style="padding-left: 30px;"></a>
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'sale']) ?>"><?= \Yii::t('app', 'Sale') ?></a>
            </div>
        </div>
    </div>
</div>
