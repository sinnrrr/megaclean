<?php

/* @var $this \yii\web\View */

/* @var $id */

use app\models\Products;

$productInfo = Products::getProductById($id);

$this->title = $productInfo['model'];
$this->registerCssFile('@web/css/product.css');
$this->registerCssFile('@web/css/all.min.css');

if (!empty($productInfo['photos'])) {
    $productInfo['photos'] = json_decode($productInfo['photos'], true);

    foreach ($productInfo['photos'] as $key => $value) {
        $galleryItems[$key]['url'] = '/basic/web/uploads/' . $value;
        $galleryItems[$key]['src'] = '/basic/web/uploads/' . $value;
    }
}

?>

<div class="product-holder">
    <?php if (isset($galleryItems)) {
        echo dosamigos\gallery\Gallery::widget(['items' => $galleryItems]);
    } else {
        echo '<div class="no-photo"><i class="fas fa-image"></i><span>No photo</span></div>';
    }
    ?>
    <div class="about">
        <h1><?= $productInfo['model'] ?></h1>
        <span><?= $productInfo['description'] ?></span>
        <a class="order-button"><?= \Yii::t('app', 'Order') ?></a>   
    </div>
</div>

<div class="panel-group" id="accordion" style="margin-top: 30px; text-align: center">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?= \Yii::t('app', 'Standard equipment') ?></a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <?= $productInfo['standard_equipment'] ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><?= \Yii::t('app', 'Additional equipment') ?></a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <?= $productInfo['technical_data'] ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?= \Yii::t('app', 'Technical data') ?></a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
            <?= $productInfo['technical_data'] ?>
        </div>
    </div>
</div>
</div>
<script>
    if (document.body.contains(document.getElementsByClassName('no-photo')[0])){
        document.getElementsByClassName('product-holder')[0].style.flexDirection = 'column';
        document.getElementsByClassName('about')[0].style.margin = '30px 0 0 30px';
        document.getElementsByClassName('no-photo')[0].style.margin = '0 auto'
    }
</script>
