<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Customer
 * @var $address common\models\Address
 */

$this->title = Yii::t('app', 'Create Customer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'address' => $address
    ]) ?>
</div>
