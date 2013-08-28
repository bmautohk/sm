<?php
$this->breadcrumbs=array(
	'Authorizes'=>array('index'),
	'創建',
);
?>

<div class="page_header">帳號</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>