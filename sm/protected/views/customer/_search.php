<div class="grid_s">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="grid_s-c1">
		<?php echo $form->label($model,'name', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>255)); ?>
		</span>
	</div>

	<div class="grid_s-c1">
		<?php echo $form->label($model,'cd', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'cd',array('size'=>50,'maxlength'=>20)); ?>
		</span>
	</div>

	<?php if (GlobalFunction::isAdmin()){ ?>
	<div class="grid_s-c1">
		<?php echo $form->label($model,'authorize_username', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'authorize_username',array('size'=>20,'maxlength'=>20)); ?>
		</span>
	</div>
	<?php } ?>
	
	<div class="grid_s-c1">
		<?php echo $form->label($model,'contact_no', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'contact_no'); ?>
		</span>
	</div>

	<div class="grid_s-c1">
		<?php echo $form->label($model,'address', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>255)); ?>
		</span>
	</div>

	<div class="grid_s-c1">
		<?php echo $form->label($model,'email', array('class'=>'input_label_s')); ?>
		<span class="input_field">
			<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>255)); ?>
		</span>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜尋'); ?>
	</div>

	<?php echo CHtml::hiddenField('keyword'); ?>
	
<?php $this->endWidget(); ?>

</div><!-- search-form -->