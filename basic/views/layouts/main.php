<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}

Yii::$app->name = 'Megaclean';

AppAsset::register($this);

//$language = Yii::$app->language;
$languageItem = new cetver\LanguageSelector\items\DropDownLanguageItem([
    'languages' => [
        'en' => \Yii::t('app', 'English'),
        'ru' => \Yii::t('app', 'Russian'),
        'ua' => \Yii::t('app', 'Ukrainian'),
    ],
    'options' => ['encode' => false],
]);

$currentUrl = Url::current();

$this->registerJs("
    const popup = document.getElementById('popup');
    let notify = document.getElementById('notify');

    function removePopup() {
        popup.className = 'remove';
    }

    function removeUrlRubbish() { 
        let sliceCount = -6; // default for add message
        let lastCharacters = window.location.href.substr(window.location.href.length -3)
    
        if (lastCharacters != 'add') {
            // change or delete message
            sliceCount = -9;
        }
    
        window.history.replaceState({}, document.title, window.location.href.slice(0, sliceCount));
    }

    function displayNotify(message) {
        removeUrlRubbish();
    
        notify.innerText = message;
        popup.className = 'show';
        setTimeout(removePopup, 3000);
    }
");

$m = Yii::$app->request->get('m');

if (!empty($m)) {
    switch ($m) {
        case 'add':
            $message = 'Item successfully added to cart';
            break;
        case 'change':
            $message = 'Quantity of this good has been changed';
            break;
        case 'delete':
            $message = 'This item has been successfully deleted from the cart';
            break;
    }

    $message = Yii::t('app', $message);

    $this->registerJs("displayNotify('{$message}')");
}

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div id="popup">
    <p id="notify"></p>
</div>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    ?>

    <?php

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => \Yii::t('app', 'Store'), 'url' => ['/products/store']],
            ['label' => \Yii::t('app', 'Order'), 'url' => ['/site/order']],
//            ['label' => \Yii::t('app', 'Contact'), 'url' => ['/site/order']],
            ['label' => \Yii::t('app', 'Cart'), 'url' => ['/site/cart']],
            $languageItem->toArray(),
        ],
    ]);
    NavBar::end();
    ?>

    <div class="wrapper">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
