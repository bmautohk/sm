<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'刪除約會', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<div class="page_header">客戶約會 (<?php echo $model->appointment_date; ?>)</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'customer_cd',
		//'authorize_username',
		'appointment_date',
		'subject',
		'content',
		'remark',
		'creation_date',
		'modify_date',
	),
)); ?>
