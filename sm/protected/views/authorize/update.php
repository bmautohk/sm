<?php
$this->breadcrumbs=array(
	'Authorizes'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'修改',
);

$this->menu=array(
	array('label'=>'刪除帳號', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<div class="page_header">修改帳號 <?php echo $model->username; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>