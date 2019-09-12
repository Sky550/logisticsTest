<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->login], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->login], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'login',
            'password',
            'name',
            'surname',
             'sexvalue',
            'dateiso',
            'email:email',
        ],
    ]) ?>

</div>

    <p>
        <?= Html::a(Yii::t('app', 'Create Address'), ['address/create?customer_login='.$model->login], ['class' => 'btn btn-success',['data-method' => 'POST']]) ?>
    </p>
<?= $this->render('../address/index', [
'searchModel' => $searchModel,
'dataProvider' => $dataProvider,
]);
