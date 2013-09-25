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
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'errorMsg')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_cd'); ?>
		<?php echo $form->textField($model,'customer_cd',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo CHtml::button('+新客戶', array('submit' => array('customer/create'))); ?>
		<?php //echo $form->error($model,'customer_cd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'appointment_date'); ?>
		<?php echo $form->textField($model,'appointment_date'); ?><button id="appointment_date_btn">...</button><br />
		<?php //echo $form->error($model,'appointment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php //echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->dropDownList($model, 'subject', 
				array(
				''=>'(請選擇)',
				'新客戶首次約會'=>'1. 新客戶首次約會',
				'新產品開發'=>'2. 新產品開發',
				'新產品推廣'=>'3. 新產品推廣',
				'會面'=>'4. 會面',
				'訂單問題'=>'5. 訂單問題',
				'產品問題'=>'6. 產品問題',
				'報價'=>'7. 報價',
				'其他'=>'8. 其他',
				));
		?>
		<?php //echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtopic'); ?>
		<?php echo $form->textField($model,'subtopic',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'subtopic'); ?>
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
	
	<div class="row">
		<?php echo $form->labelEx($model,'followup_date'); ?>
		<?php echo $form->textField($model,'followup_date'); ?><button id="followup_date_btn">...</button><br />
		<?php //echo $form->error($model,'followup_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'img1'); ?>
		<?php echo $form->fileField($model,'img1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img1'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'img2'); ?>
		<?php echo $form->fileField($model,'img2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img2'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'img3'); ?>
		<?php echo $form->fileField($model,'img3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img3'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'img4'); ?>
		<?php echo $form->fileField($model,'img4',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img4'); ?>
	</div>
	
	<div class="row">
		<?php if ($model->img1) {
			echo CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img1),'alt',array('width'=>'150')); 
		}?>
		<?php if ($model->img2) {
			echo CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img2),'alt',array('width'=>'150')); 
		}?>
		<?php if ($model->img3) {
			echo CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img3),'alt',array('width'=>'150')); 
		}?>
		<?php if ($model->img4) {
			echo CHtml::image(BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$model->img4),'alt',array('width'=>'150')); 
		}?>
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
	  Calendar.setup({
        inputField : "Appointment_followup_date",
        trigger    : "followup_date_btn",
        onSelect   : function() { this.hide() },
        showTime   : 12,
        dateFormat : "%Y-%m-%d %H:%M"
      });
    //]]></script>
</div><!-- form -->
