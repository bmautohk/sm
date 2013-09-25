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
		'subtopic',
		'content',
		'remark',
		'followup_date',
		array(
			'type'=>'raw',
			'value'=>$model->img1?html_entity_decode(CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img1),'alt',array('width'=>'150'))):null,
		),
		array(
			'type'=>'raw',
			'value'=>$model->img2?html_entity_decode(CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img2),'alt',array('width'=>'150'))):null,
		),
		array(
			'type'=>'raw',
			'value'=>$model->img3?html_entity_decode(CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img3),'alt',array('width'=>'150'))):null,
		),
		array(
			'type'=>'raw',
			'value'=>$model->img4?html_entity_decode(CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img4),'alt',array('width'=>'150'))):null,
		),
		'creation_date',
		'modify_date',
	),
)); ?>
