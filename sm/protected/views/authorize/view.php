<?php
$this->breadcrumbs=array(
	'Authorizes'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'刪除帳號', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<div class="page_header">帳號 <?php echo $model->username; ?></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
		'role_code',
		'last_login',
	),
)); ?>
