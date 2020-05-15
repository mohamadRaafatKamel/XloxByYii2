<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


<div class="accounts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Accounts', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('All', array('index','stat0000' =>''), ['class' => 'btn btn-success']) ?>
        <?= Html::a('unsold', array('index','stat0000' =>'unsold'), ['class' => 'btn btn-success']) ?>
        <?= Html::a('sold', array('index','stat0000' =>'sold'), ['class' => 'btn btn-success']) ?>
        <?= Html::a('Order', array('index','stat0000' =>'Order'), ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', array('index','stat0000' =>'Delete'), ['class' => 'btn btn-success']) ?>
        <?= Html::a('report', array('index','stat0000' =>'report'), ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aid',
            'sitename',
            'a_username',
            'a_password',
            'infos',
            'notes',
            'price',
            'acctype',
            'proof_url:url',
            'country',
            'stat',
            //'sold',
            //'sto',
            //'dateofsold',
            //'date',
            //'uid',
            //'reported',
            //'source',
            //'proof_url:url',



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
