<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="icon" type="image/x-icon" href="<?= Yii::$app->request->baseUrl; ?>/favicon.ico" />
    </head>
    <body>
        <?php $this->beginBody() ?>

           <div class="wrap">
  <!-- <div class="core-index"> -->
            <?php
            NavBar::begin([
                'brandLabel' => Html::img('img/logo121.png', ['alt' => Yii::$app->name]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
           echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Home',
                        'url' => ['sbr/index'],
                        'linkOptions' => [],
                    ],
                    [
                        'label' => 'Dashboard',
                        'url' => ['dbrd/test'],
                        'linkOptions' => [],
                        'visible'=> Yii::$app->user->can('dbrd'),
                    ],
                    [
                        'label' => 'SBR',
                        'items' => [
                            ['label' => 'Add', 'url' => Yii::$app->homeUrl . '?r=core/create'],
                            //'<li class="divider"></li>',
                            ['label' => 'Edit', 'url' => Yii::$app->homeUrl . '?r=core/edit'],
                            ['label' => 'Verify', 'url' => Yii::$app->homeUrl . '?r=core/vfy'],
                        ],
                        'visible'=> Yii::$app->user->can('add')||Yii::$app->user->can('edit')||Yii::$app->user->can('verify'),
                    ],
                    [   
                        'label' => 'Report',
                        'items' => [
                            ['label' => 'Identification', 'url' => Yii::$app->homeUrl . '?r=rep/geo'],
                            //'<li class="divider"></li>',
                            ['label' => 'Location', 'url' => Yii::$app->homeUrl . '?r=rep/addr'],
                            //'<li class="divider"></li>',
                            ['label' => 'Information', 'url' => Yii::$app->homeUrl . '?r=rep/othe'],
                        ],
                        'visible'=> Yii::$app->user->can('report'),
                    ],
                    [
                        'label' => 'SRS',
                        'items' => [
                            ['label' => 'PE Stratum', 'url' => Yii::$app->homeUrl . '?r=samp/getpe'],
                            //'<li class="divider"></li>',
                            ['label' => 'Sample size', 'url' => Yii::$app->homeUrl . '?r=samp/getprobtb'],
                            //'<li class="divider"></li>',
                            ['label' => 'Draw Sample', 'url' => Yii::$app->homeUrl . '?r=samp/drwsamp'],
                        ],
						'visible'=> Yii::$app->user->can('admin') || Yii::$app->user->can('root') ,
                    ],
                    [
                        'label' => 'Settings',
                        'items' => [
                             ['label' => 'SBR Admin', 'url' => Yii::$app->homeUrl . '?r=core/del'],
                            //'<li class="divider"></li>',
                            ['label' => 'SLSIC Admin', 'url' => Yii::$app->homeUrl . '?r=slsic/index'],
                            ['label' => 'User', 'url' => Yii::$app->homeUrl . '?r=user/admin','visible'=> Yii::$app->user->can('root')],
                            
                           
                        ],
                        'visible'=> Yii::$app->user->can('admin') || Yii::$app->user->can('root') ,
                    ],
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/user/login']]
                    ) : (
                    '<li>'
                    . Html::beginForm(['/user/logout'], 'post')
                    . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                    )
            ],
                'options' => ['class' => 'navbar-nav'],
            ]);

            NavBar::end();
            ?>

            <div class="container-caro3">
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?></div>	
                <?= $content ?>
            
</div>        

        <footer class="footer bg-dark">
            <div class="container">
                <p class="pull-left">&copy; Department Of Census & Statistics <?= date('Y') ?></p>

                <p class="pull-right"><?= 'Powered by: ICT Division' ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
