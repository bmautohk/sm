<?php
$this->breadcrumbs=array(
	'Authorizes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'加新帳號', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('authorize-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page_header">帳號搜尋</div>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'authorize-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'username',
		'password',
		'role_code',
		'last_login',
		array(
			'class'=>'CButtonColumn',
		),
	),
	'summaryText'=>'',
	//'htmlOptions' => array('class' => 'product-excel-style'),
)); ?>
