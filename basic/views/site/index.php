<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Echo-Eko';
$this->registerCssFile('@web/css/index.css');
$this->registerCssFile("@web/css/all.min.css");

?>

<div class="site-index">
    <div class="flex-center">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('app', 'Festival and events') ?></h3>
                    </div>
                    <img src="https://www.visit-hampshire.co.uk/dbimgs/Wickham%20Festival%202019.jpg" alt="">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('app', 'Construction') ?></h3>
                    </div>
                    <img src="https://www.letsbuild.com/wp-content/uploads/2019/10/shutterstock_1247187910-1280x720.png"
                         alt="">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('app', 'Military education') ?></h3>
                    </div>
                    <img src="https://static.ukrinform.com/photos/2019_10/thumb_files/630_360_1569913119-496.jpg"
                         alt="">
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
    </div>
    <hr>
    <div class="cardsHolder">
        <h1><?= \Yii::t('app', 'We render services at rent and upkeep for mobile sanitary systems') ?></h1>
        <div class="flex-center">
            <div class="card">
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'rent']) ?>"
                   class="fas fa-person-dolly card-icon"></a>
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'rent']) ?>"><?= \Yii::t('app', 'Rent') ?></a>
            </div>
            <div class="card">
                <a href="<?= Url::toRoute('site/service') ?>" class="fas fa-recycle card-icon"></a>
                <a href="<?= Url::toRoute('site/service') ?>"><?= \Yii::t('app', 'Service') ?></a>
            </div>
            <div class="card">
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'sale']) ?>"
                   class="fas fa-shopping-cart card-icon" style="padding-left: 30px;"></a>
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'sale']) ?>"><?= \Yii::t('app', 'Sale') ?></a>
            </div>
        </div>
    </div>
</div>
