<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= //$form->field($model, 'aid');

     //$form->field($model, 'acctype');

     //$form->field($model, 'country');

     //$form->field($model, 'infos');

     $form->field($model, 'notes');

     //$form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'sold') ?>

    <?php // echo $form->field($model, 'sto') ?>

    <?php // echo $form->field($model, 'dateofsold') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'uid') ?>

    <?php // echo $form->field($model, 'reported') ?>

    <?php // echo $form->field($model, 'sitename') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'a_username') ?>

    <?php // echo $form->field($model, 'a_password') ?>

    <?php // echo $form->field($model, 'proof_url') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
