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

$metaString = "";
$translationFiles = [];
$translationArray = [];

// getting list of translations for ru
$translationFiles['ru'] = scandir('../translations/ru/');
unset($translationFiles['ru'][0], $translationFiles['ru'][1]);

// getting list of translations for ua
$translationFiles['ua'] = scandir('../translations/ua/');
unset($translationFiles['ua'][0], $translationFiles['ua'][1]);

// getting translations from file for ru
foreach ($translationFiles['ru'] as $translationFile) {
    $translationArray['ru'][$translationFile] = include "../translations/ru/{$translationFile}";
}

// getting translations from file for ua
foreach ($translationFiles['ua'] as $translationFile) {
    $translationArray['ua'][$translationFile] = include "../translations/ua/{$translationFile}";
}

// setting translation values as meta tags for ru
foreach ($translationArray['ru'] as $translation) {
    foreach ($translation as $value) {
        $metaString .= $value . ',';
    }
}

// setting translation values as meta tags for ua
foreach ($translationArray['ua'] as $translation) {
    foreach ($translation as $key => $value) {
        $metaString .= $key . ',' . $value . ',';
    }
}

// adding custom keywords
$metaString = "оренда біотуалетів,оренда умивальників,оренда портативної санітарії,оренда душових кабін,покупка,продаж біотуалетів,сервіс біотуалетів,сервіс,мегаклин,клин,мегаклін,Мегаклін,Мегаклин,Megaclean,megaclean,clean,cleaning,покупка біотуалетів,дезінфікуючі стійки,оренда фестиваль,покупка умивальників,купити біотуалет,купити душову кабіну,купити портативну санітарію,прибирання біотуалетів,оренда дезінфікуючих стійок,оренда пісуарів,купити пісуар,оренда мусорних баків,купити мусорний бак,купить биотуалет, купить стойку, купить дезинфицурующую стойку,купить умывальник,портативная санитария,оренда биотуалета,оренда душевой кабины,оренда душевых кабин,оренда мусорных баков,оренда писуаров,купить писуар," . $metaString;
$metaString .= "прибирання,послуги,хімчистка,біотуаелети,оренда,Послуги прибирання,Професійне прибиральне обладнання,Спецзасоби побутової хімії,Автохімія,Миючі та дезінфікуючі засоби для промисловості та побуту,Професійні системи захисту приміщень від вуличного бруду,Луцьк,Волинь,Луцк,клеринг,уборка квартиры, уборка офису,продажа апараты высокого давления,пылесосы,полотеры,поломоечные машины,послуги миття вікон,хімчистка килимів, химчистка ковров,поломоечная машина, поломоечная техника, поломойки, промышленный пылесос, моющие пылесосы, профессиональные пылесосы, подметальные машины, подметальная техника, подметалки, уборочная техника, уборочное оборудование, автомоечное оборудование, парогенератор, пеногенератор, автомойка, аппарат высокого давления, мойки высокого давления, минимойки, lavor,водяні фільтри, водяные фильтры,прибирання в Луцьку,уборка Луцк,Уборка офисов,Уборка квартир,Уборка территории,Мытье рекламных вывесок,Уборка помещений,Луцк,Уборка коттеджей, особняков";


$this->registerMetaTag([
        'name' => 'keywords',
        'content' => $metaString
]);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168946176-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-168946176-1');
    </script>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="robots" content="all">
    <meta name="googlebot" content="all">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="author" content="Dmytro Soltusyuk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= Yii::t('app', 'Megaclean is a company with many years of experience in portable sanitation. We offer the service of renting, cleaning and selling biotoilets, mobile washbasins, showers and much more!') ?>">
    <?php $this->registerCsrfMetaTags() ?>
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
            'class' => 'navbar navbar-expand-xl navbar-inverse',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => \Yii::t('app', 'Production'), 'url' => ['/products/store']],
            ['label' => \Yii::t('app', 'Order'), 'url' => ['/site/order']],
            ['label' => \Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
            ['label' => \Yii::t('app', 'Cart'), 'url' => ['/site/cart']],
            ['label' => \Yii::t('app', 'Gallery'), 'url' => ['/site/gallery']],
            $languageItem->toArray(),
        ],
    ]);

    NavBar::end();

    ?>

    <section class="contact">
        <div>
            <span class="fas fa-phone"></span>
            <a href="tel:+380677872408">+380 67 7872 408</a>
        </div>
        <div>
            <span class="fas fa-envelope"></span>
            <a href="mailto:office@megaclean.com.ua">office@megaclean.com.ua</a>
        </div>
        <div>
            <span class="fas fa-phone"></span>
            <a href="tel:+380507191317">+380 50 7191 317</a>
        </div>
    </section>

    <div class="wrapper">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<section class="contact">
    <div>
        <span class="fas fa-phone"></span>
        <a href="tel:+380677872408">+380 67 7872 408</a>
    </div>
    <div>
        <span class="fas fa-envelope"></span>
        <a href="mailto:office@megaclean.com.ua">office@megaclean.com.ua</a>
    </div>
    <div>
        <span class="fas fa-phone"></span>
        <a href="tel:+380507191317">+380 50 7191 317</a>
    </div>
</section>
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
