<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'加新約會', 'url'=>array('create')),
);

// script for fulltext search form
Yii::app()->clientScript->registerScript('fulltextSearch', "
$('.fulltext-search-form form').submit(function(){
	$.fn.yiiGridView.update('appointment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

// script for search form
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('appointment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="fulltext-search-form">
<?php $this->renderPartial('_fulltextsearch',array(
	'model'=>$model,
)); ?>
</div><!-- fulltext-search-form -->
<div class="page_header">約會搜尋</div>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
	if (GlobalFunction::isAdmin()){
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'appointment-grid',
			'dataProvider'=>$model->search(),
			//'filter'=>$model,
			'columns'=>array(
				//'id',
				array(
					'class'=>'CButtonColumn',
					'header'=>'客戶',
					'template'=>'{view}',
				),
				//array(
				//	'header'=>'客戶',
				//	'type'=>'raw',
				//	'value'=>'Customer::model()->find("cd=$data->customer_cd")',
				//),
				//array('name'=>'Customer.cd',  'value'=>'$data->customer->cd'),
				//array('name'=>'customer.name',  'value'=>'$data->customer->name'),
				'customer_cd',
				'authorize_username',
				'appointment_date',
				'subject',
				'content',
				/*
				'creation_date',
				'modify_date',
				'remark',
				*/
				array(
					'class'=>'CButtonColumn',
					'header'=>'修改',
					'template'=>'{update}{delete}',
				),
				
			),
			'summaryText'=>'',
			//'htmlOptions' => array('class'=>'product-excel-style',),
		)); 
	}else{
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'appointment-grid',
			'dataProvider'=>$model->search(),
			//'filter'=>$model,
			'columns'=>array(
				//'id',
				array(
					'class'=>'CButtonColumn',
					'header'=>'客戶',
					'template'=>'{view}',
				),
				'customer_cd',
				//'authorize_username',
				'appointment_date',
				'subject',
				'content',
				/*
				'creation_date',
				'modify_date',
				'remark',
				*/
				array(
					'class'=>'CButtonColumn',
					'header'=>'修改',
					'template'=>'{update}{delete}',
				),
				
			),
			'summaryText'=>'',
			//'htmlOptions' => array('class'=>'product-excel-style',),
		)); 
	}
?>
