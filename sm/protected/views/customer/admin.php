<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'加新客戶', 'url'=>array('create')),
);

// script for fulltext search form
Yii::app()->clientScript->registerScript('fulltextSearch', "
$('.fulltext-search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

// script for search form
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-grid', {
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
<div class="page_header">客戶搜尋</div>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
	if (GlobalFunction::isAdmin()){
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'customer-grid',
			'dataProvider'=>$model->search(),
			'columns'=>array(
				array(
					'class'=>'CButtonColumn',
					'template'=>'{detail}',
					'buttons'=>array(
						'detail' => array(
							'label'=>'客戶聯繫資料',
							'url'=> 'Yii::app()->request->baseUrl."/appointment/catalog/".$data->cd',
							'options'=>array('class'=>'button'),
							),
					),
				),
				'name',
				'cd',
				'authorize_username',
				'contact_no',
				'address',
				'email',
				array(
					'class'=>'CButtonColumn',
					'header'=>'修改',
					'template'=>'{update}{delete}',
				),
			),
			'summaryText'=>'',
			//'htmlOptions' => array('class' => 'product-excel-style'),
		));
	}else{
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'customer-grid',
			'dataProvider'=>$model->search(),
			'columns'=>array(
				array(
					'class'=>'CButtonColumn',
					'template'=>'{detail}',
					'buttons'=>array(
						'detail' => array(
							'label'=>'客戶聯繫資料',
							'url'=> 'Yii::app()->request->baseUrl."/appointment/catalog/".$data->cd',
							'options'=>array('class'=>'button'),
							),
					),
				),
				'name',
				'cd',
				'contact_no',
				'address',
				'email',
				array(
					'class'=>'CButtonColumn',
					'header'=>'修改',
					'template'=>'{update}{delete}',
				),
			),
			'summaryText'=>'',
			//'htmlOptions' => array('class' => 'product-excel-style'),
		));
	}
?>
