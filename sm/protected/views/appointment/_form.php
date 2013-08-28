<div class="form">
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/jscal2/jscal2.css" />
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/jscal2/border-radius.css" />
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/jscal2/gold/gold.css" />
	<script type="text/javascript" src="<?=Yii::app()->request->baseUrl; ?>/js/jscal2/jscal2.js"></script>
	<script type="text/javascript" src="<?=Yii::app()->request->baseUrl; ?>/js/jscal2/lang/en.js"></script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'appointment-form',
	'enableAjaxValidation'=>false,
	'errorMessageCssClass'=>'errorMsg',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'errorMsg')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_cd'); ?>
		<?php echo $form->textField($model,'customer_cd',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'customer_cd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'appointment_date'); ?>
		<?php echo $form->textField($model,'appointment_date'); ?><button id="appointment_date_btn">...</button><br />
		<?php //echo $form->error($model,'appointment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'remark'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "Appointment_appointment_date",
        trigger    : "appointment_date_btn",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d %H:%M"
      });
    //]]></script>
</div><!-- form -->