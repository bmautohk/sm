<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
	array('label'=>'刪除約會', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<div class="page_header">修改約會 (<?php echo $model->appointment_date; ?>)</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>