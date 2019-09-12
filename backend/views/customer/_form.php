<?php

use common\models\Address;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $address common\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList($model->getSexInfo()) ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>
    <div class="address-form">

    <?= $form->field($address, 'post_index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'appartament')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
