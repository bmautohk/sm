<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	'創建',
);
?>

<div class="page_header">客戶約會</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>