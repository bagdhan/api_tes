<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\grid\GridView;

$this->title = 'API S2';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
	'filterModel' => true,
	'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
			'attribute' => 'NIM',
			'value' => 'NIM',
			'filter' => Html::textInput('NIM',null,['class'=>'form-control'])
			],
            [
			'attribute' => 'Nama',
			'value' => 'Nama',
			'filter' => Html::textInput('Nama',null,['class'=>'form-control'])
			],
			[
			'attribute' => 'StatusAkademik',
			'value' => 'StatusAkademik',
			'filter' => Html::textInput('StatusAkademik',null,['class'=>'form-control'])
			],
			[
			'attribute' => 'Semester',
			'value' => 'Semester',
			'filter' => Html::textInput('Semester',null,['class'=>'form-control'])
			],
			[
			'attribute' => 'TahunMasuk',
			'value' => 'TahunMasuk',
			'filter' => Html::textInput('TahunMasuk',null,['class'=>'form-control'])
			],
            //['class' => 'yii\grid\ActionColumn'],
        ],
]) ?>
