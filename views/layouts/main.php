<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Головна', 'url' => ['/site/index']],
                    Yii::$app->getUser()->getIdentity()->username === 'admin' ?
                        [ 'label' => 'Admin', 'url' => [ '/admin' ] ] : '',
                    ['label' => 'Про нас', 'url' => ['/site/about']],
                    ['label' => 'Контакти', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        [ 'label' => 'Реєстрація', 'url' => [ '/user/registration/register' ] ] : '',
                    Yii::$app->user->isGuest ?
                        [ 'label' => 'Вхід на сайт', 'url' => [ '/user/security/login' ] ] :
                        [
                            'label' => 'Вийти (' . Yii::$app->user->identity->username . ')',
                            'url' => [ '/user/security/logout' ],
                            'linkOptions' => [ 'data-method' => 'post' ]
                        ],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
