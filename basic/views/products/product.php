<?php

/* @var $this \yii\web\View */
/* @var $id */

use app\models\Products;

$productInfo = Products::getProductById($id);

if (!empty($productInfo['photos'])){
    $productInfo['photos'] = json_decode($productInfo['photos'], true);

    foreach ($productInfo['photos'] as $key => $value){
        $galleryItems[$key]['url'] = $value;
        $galleryItems[$key]['src'] = $value;
    }
}

?>

