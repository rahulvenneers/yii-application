<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Stores */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'address_line_1',
            'address_line_2',
            'city',
            //'emirates_id',
        ],
    ]) ?>
    <style>
        .brands{
            text-align: center;
        }
        .brands a{
            color:#FFF;
        }
        .Smart.Baby{
            background-color:#0D7CA3;    
        }
        .x-pression{
            background-color:#6D377E;
        }
        .SHOES4US{
            background-color:#7B7B7B;
        }
        
    </style>
 <div class="row brands">   
    <?php foreach($shops as $shop){?>
        <div class="col-md-2 <?=$shop->brand->name?>"> 
                 <?=Html::img($shop->brand->logo)?><br>
                 <?= Html::a($shop->brand->name, ['shops/view', 'id' => $shop->id])."<br>"?>
        </div>
<?php }?>
    </div>
</div>
