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
$webUrl = Yii::getAlias('@web');

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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168946176-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-168946176-1');
    </script>
    <meta name="robots" content="all">
    <meta name="googlebot" content="all">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="author" content="Dmytro Soltusyuk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Megaclean - компания с многолетним опытом работы в среде портативной санитарии. Мы надаем услугу оренды, чистки и продажи биотуалетов, мобильных умывальников, душевых кабин и много чего еще!">
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
        'brandLabel' => "<img src='{$webUrl}/img/logo.png' class='logo' alt='Logo image'>",
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
            ['label' => \Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
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
        <div class="footer-copyright text-center py-3">
            <span class="footer-text">&copy; <?= Yii::$app->name ?> 2010-<?= date('Y') ?></span>
            |
            <a target="_blank"
               href="https://www.instagram.com/sinnrrr/"
               class="footer-logo">Developed by sinnrrr</a>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
