<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Accounts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model)?>

    <?= $form->field($model, 'sitename')->textInput(['maxlength' => true])->input('sitename', ['placeholder' => "Site Name"])->label(false) ?>

    <?= $form->field($model, 'a_username')->textInput(['maxlength' => true])->input('a_username', ['placeholder' => "Login/Email/Username"])->label(false) ?>

    <?= $form->field($model, 'a_password')->textInput(['maxlength' => true])->input('a_password', ['placeholder' => "Password"])->label(false) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true ,'type' => 'number'])->input('price', ['placeholder' => "Price"])->label(false) ?>

    <?= $form->field($model, 'country')->dropDownList(
        $listCont,
        ['prompt'=>'Select country']
        )->label(false);;?>



    <?= $form->field($model, 'acctype')->dropDownList(
            [''=>'Select Category',
            'Marketing'=>'Marketing',
            'Hostinf'=>'Hostinf/Domain',
            'Games'=>'Games',
            'VPN'=>'VPN/Socks Proxy',
            'Shoping'=>'Shoping{Amazon,eBay...etc}',
            'Program'=>'Program{antivirus,adobe...etc}',
            'Stream'=>'Stream{music,Netflix,iptv,HBO,bein sport,WWE...etc}',
            'Dating'=>'Dating',
            'Learning'=>'Learning{udemy,lynda...etc}',
            'Torrent'=>'Torrent/File host',
            'VOIP'=>'VOIP/SIP',
            'Other'=>'Other']
        )->label(false); ?>

    <?= $form->field($model, 'source')->dropDownList(
            [''=>'Select Type',
            'Created'=>'Created',
            'Hacked/Cracked'=>'Hacked/Cracked']
        )->label(false); ?>


    <p>Proof (screenShot)<br/>
      you can use https://vgy.me/ or https://prnt.sc/ or https://gyazo.com/ Only </p>

    <?= $form->field($model, 'proof_url')->textInput(['maxlength' => true])->input('proof_url', ['placeholder' => "proof url"])->label(false) ?>

    <?= $form->field($model, 'infos')->textInput(['maxlength' => true])->input('infos', ['placeholder' => "Account Details"])->label(false) ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true])->input('notes', ['placeholder' => "Additional Notes"])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
