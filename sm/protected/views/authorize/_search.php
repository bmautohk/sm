<div class="grid_s">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="grid_s-c1">
		<?php echo $form->label($model,'username', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		</span>
	</div>

	<div class="grid_s-c1">
		<?php echo $form->label($model,'role_code', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'role_code',array('size'=>2,'maxlength'=>2)); ?>
		</span>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜尋'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->