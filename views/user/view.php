<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
$this->title = $model->username;

use \yii\widgets\ListView;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $this yii\web\View */

?>
<div class="row user-view">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-6">
                <h1><?= Html::encode($this->title) ?></h1>

                <?php if (Yii::$app->user->can('adminUsers')): ?>
                <p>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?php endif ?>
            </div>
            <?php if (Yii::$app->user->id == $model->id): ?>
            <div class="col-xs-6">
                <h2>Connect extra profiles:</h2>
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['site/auth'],
                    'popupMode' => false,
                ]) ?>
            </div>
            <?php endif ?>
        </div>
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}{pager}',
            'itemOptions' => [
                'class' => 'item',
            ],
            'itemView' => '/news/_view',
            'viewParams' => [
                'displayStatus' => true,
            ],
        ]) ?>
    </div>
</div>
