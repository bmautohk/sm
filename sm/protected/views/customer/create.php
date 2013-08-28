<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'創建',
);
?>

<div class="page_header">客戶</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>