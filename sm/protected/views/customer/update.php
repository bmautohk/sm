<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->name=>array('view','id'=>$model->cid),
	'修改',
);

$this->menu=array(
	array('label'=>'刪除客戶', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<div class="page_header">修改客戶 <?php echo $model->cd; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>