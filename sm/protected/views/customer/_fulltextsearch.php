<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<?php echo CHtml::textField('keyword', '', array('size'=>100,'maxlength'=>255,'placeholder'=>'Enter Keyword')); ?>
	<?php echo CHtml::submitButton('搜尋'); ?>
	
	<?php echo $form->hiddenField($model,'name'); ?>
	<?php echo $form->hiddenField($model,'cd'); ?>
	<?php echo $form->hiddenField($model,'contact_no'); ?>
	<?php echo $form->hiddenField($model,'address'); ?>
	<?php echo $form->hiddenField($model,'email'); ?>
<?php $this->endWidget(); ?>
<!-- fulltext-search-form -->