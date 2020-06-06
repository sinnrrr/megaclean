<?php

/* @var $this \yii\web\View */

/* @var $id */

use app\models\Product;
use yii\helpers\Url;

$productInfo = Product::getProductById($id);

$this->title = $productInfo['model'] . ' | ' . Yii::$app->name;
$this->registerCssFile('@web/css/product.css');
$this->registerCssFile('@web/css/all.min.css');

if (!empty($productInfo['photos'])) {
    $productInfo['photos'] = json_decode($productInfo['photos'], true);

    foreach ($productInfo['photos'] as $key => $value) {
        $galleryItems[$key]['url'] = '@web/uploads/' . $value;
        $galleryItems[$key]['src'] = '@web/uploads/' . $value;
    }
}

?>

<div class="product-holder">
    <?php if (isset($galleryItems)) {
        echo dosamigos\gallery\Gallery::widget(['items' => $galleryItems]);
    } else {
        $noPhoto = "<div class='no-photo'><i class='fas fa-image'></i><span>" . Yii::t('view', 'No photo') . "</span></div>";
        echo $noPhoto;
    }
    ?>
    <div class="about">
        <h1><?= $productInfo['model'] ?></h1>
        <small>Страна производителя: <?= Yii::t('view', $productInfo['manufacture']) ?></small>
        <div><?= $productInfo['description'] ?></div>
        <a class="order-button"
           href="<?= Url::to([
               'cart/add',
               'id' => $productInfo['id'],
               'redirect' => Url::current()
           ]) ?>">
            <?= \Yii::t('app', 'Order') ?>
        </a>
    </div>
</div>

<div class="panel-group" id="accordion" style="margin-top: 30px; text-align: center">
    <?php if (isset($productInfo['standard_equipment']) && !empty($productInfo['standard_equipment'])): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne"><?= \Yii::t('view', 'Standard equipment') ?></a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <?= $productInfo['standard_equipment'] ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($productInfo['additional_equipment']) && !empty($productInfo['additional_equipment'])): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseFour"><?= \Yii::t('view', 'Additional equipment') ?></a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <?= $productInfo['additional_equipment'] ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($productInfo['technical_data']) && !empty($productInfo['technical_data'])): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseFive"><?= \Yii::t('view', 'Technical data') ?></a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <?= $productInfo['technical_data'] ?>
            </div>
        </div>
    <?php endif; ?>
</div>
</div>
<script>
    if (document.body.contains(document.getElementsByClassName('no-photo')[0])) {
        document.getElementsByClassName('product-holder')[0].style.flexDirection = 'column';
        document.getElementsByClassName('about')[0].style.margin = '30px 0 0 30px';
        document.getElementsByClassName('no-photo')[0].style.margin = '0 auto'
    }

    let panels = document.getElementsByClassName('panel-collapse')

    if (typeof panels[0] != 'undefined') {
        panels[0].classList.add('in')
    }
</script>