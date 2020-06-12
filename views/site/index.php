<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::$app->name . " - " . Yii::t('app', 'Mobile portable sanitary and more!');
$this->registerCssFile('@web/css/index.css');

global $imgUrl;
$imgUrl = Yii::getAlias('@web') . '/img';

function renderBrands()
{
    global $imgUrl;

    $imagesArray = scandir('img/brands');

    unset($imagesArray[0]);
    unset($imagesArray[1]);

    foreach ($imagesArray as $image) {
        echo "<img src='{$imgUrl}/brands/{$image}' alt='Brand photo'>";
    }
}

?>

<div class="site-index">
    <div class="flex-center">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('index', 'Festivals and events') ?></h3>
                    </div>
                    <img src="<?= $imgUrl ?>/carousel/festivals.jpg" alt="Festival photo">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('index', 'Constructions') ?></h3>
                    </div>
                    <img src="<?= $imgUrl ?>/carousel/construction.png" alt="Construction process photo">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('index', 'Beaches') ?></h3>
                    </div>
                    <img src="<?= $imgUrl ?>/carousel/beaches.png" alt="Beach photo">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('index', 'Military educations') ?></h3>
                    </div>
                    <img src="<?= $imgUrl ?>/carousel/military.jpg" alt="Military educations photo">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('index', 'Parking') ?></h3>
                    </div>
                    <img src="<?= $imgUrl ?>/carousel/parking.png" alt="Parking photo">
                </div>

                <div class="item">
                    <div class="carousel-caption">
                        <h3><?= \Yii::t('index', 'Competitions') ?></h3>
                    </div>
                    <img src="<?= $imgUrl ?>/carousel/competitions.jpg" alt="Competitions photo">
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

            <img class="brand-watermark" src="<?= $imgUrl ?>/logo_rounded.png" alt="Watermark image">
        </div>
    </div>
    <hr>
    <section class="cards-holder">
        <h1><?= \Yii::t('index', 'We provide a full range of services related to mobile sanitation systems') ?></h1>
        <div class="flex-center" style="flex-wrap: wrap">
            <div class="card">
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'rent']) ?>">
                    <img src="<?= $imgUrl ?>/index/rent.png" alt="Rent process icon">
                </a>
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'rent']) ?>"><?= \Yii::t('index', 'Rent') ?></a>
            </div>
            <div class="card">
                <a href="<?= Url::toRoute('site/service') ?>">
                    <img src="<?= $imgUrl ?>/index/service.png" alt="Service process icon">
                </a>
                <a href="<?= Url::toRoute('site/service') ?>"><?= \Yii::t('app', 'Service') ?></a>
            </div>
            <div class="card">
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'sale']) ?>">
                    <img src="<?= $imgUrl ?>/index/sale.png" alt="Sale process icon">
                </a>
                <a href="<?= Url::toRoute(['products/select', 'mode' => 'sale']) ?>"><?= \Yii::t('index', 'Sale') ?></a>
            </div>
        </div>
    </section>
    <section class="working-process">
        <h1 class="text-center"><?= \Yii::t('index', 'Algorithm of work') ?></h1>
        <div class="block-holder">
            <div class="block">
                <span class="block-number">1</span>
                <div class="block-text">
                    <i class="fas fa-phone-alt"></i>
                    <span><?= \Yii::t('index', 'Call') ?></span>
                </div>
            </div>
            <div class="block-wrap">
                <div class="arrow">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="block">
                    <span class="block-number">2</span>
                    <div class="block-text">
                        <i class="fas fa-file-alt"></i>
                        <span><?= \Yii::t('index', 'Contract') ?></span>
                    </div>
                </div>
            </div>
            <div class="block-wrap">
                <div class="arrow">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="block">
                    <span class="block-number">3</span>
                    <div class="block-text">
                        <i class="fas fa-forklift"></i>
                        <span><?= \Yii::t('index', 'Delivery') ?></span>
                        <span><?= \Yii::t('index', 'Assembling') ?></span>
                    </div>
                </div>
            </div>
            <div class="block-wrap">
                <div class="arrow">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="block">
                    <span class="block-number">4</span>
                    <div class="block-text">
                        <i class="fas fa-broom"></i>
                        <span><?= \Yii::t('app', 'Service') ?></span>
                    </div>
                </div>
            </div>
            <div class="block-wrap">
                <div class="arrow">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="block">
                    <span class="block-number">5</span>
                    <div class="block-text">
                        <i class="fas fa-wrench"></i>
                        <span><?= \Yii::t('index', 'Dismantling') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="working-process-mobile">
        <h1 class="text-center"><?= \Yii::t('index', 'Algorithm of work') ?></h1>
        <div class="block-holder">
            <div class="block">
                <span class="block-number">1</span>
                <div class="block-text">
                    <i class="fas fa-phone-alt"></i>
                    <span><?= \Yii::t('index', 'Call') ?></span>
                </div>
            </div>
            <div class="arrow">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="block">
                <span class="block-number">2</span>
                <div class="block-text">
                    <i class="fas fa-file-alt"></i>
                    <span><?= \Yii::t('index', 'Contract') ?></span>
                </div>
            </div>
            <div class="arrow">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="block">
                <span class="block-number">3</span>
                <div class="block-text">
                    <i class="fas fa-forklift"></i>
                    <span><?= \Yii::t('index', 'Delivery') ?></span>

                    <span><?= \Yii::t('index', 'Assembling') ?></span>
                </div>
            </div>
            <div class="arrow">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="block">
                <span class="block-number">4</span>
                <div class="block-text">
                    <i class="fas fa-broom"></i>
                    <span><?= \Yii::t('index', 'Service') ?></span>
                </div>
            </div>
            <div class="arrow">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="block">
                <span class="block-number">5</span>
                <div class="block-text">
                    <i class="fas fa-wrench"></i>
                    <span><?= \Yii::t('index', 'Dismantling') ?></span>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <h1><?= \Yii::t('app', 'About Us') ?></h1>

        <img src="<?= $imgUrl ?>/index/about.jpg" alt="Biotoilets photo">
        <p><?= \Yii::t('about', "With more than 9 years of experience in the field of portable sanitation, Megaclean has built an impeccable reputation in the field of rental and maintenance of mobile sanitary systems, which meets and exceeds the needs of our customers.") ?></p>

        <p><?= \Yii::t('about', "The use of portable toilets (bio toilets), washbasins and other sanitary equipment of well-known world brands for rent is a major step forward, made thanks to all the useful advice of many customers. During operation, our equipment can withstand constant loads and even abuse, but it is easy to clean and maintain, which creates a comfortable environment for both users and operators.") ?></p>

        <p><?= \Yii::t('about', "Do you need extremely high-quality service of dry closets? We have this standard thanks to extensive experience and practice in combination with the use of modern revolutionary reagents and special equipment.") ?></p>

        <p><?= \Yii::t('about', "As a result - you get quality rental services for mobile sanitation systems, and we in turn - a satisfied user and confidence that our work is useful for you and for the environment in which we spend our lives.") ?></p>

        <p><?= \Yii::t('about', "So, we are waiting for your orders and will be happy to advise in the field of portable sanitation.") ?></p>
    </section>
    <section class="brands">
        <h1><?= Yii::t('index', 'We cooperate with leading global companies') ?></h1>
        <div class="brand-logos">
            <?= renderBrands() ?>
        </div>
    </section>
</div>