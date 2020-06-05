<?php
/* @var $this PermisosController */
/* @var $model Permisos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE'); ?>
		<?php echo $form->textField($model,'NOMBRE',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTROLLER'); ?>
		<?php echo $form->textField($model,'CONTROLLER',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ACTION'); ?>
		<?php echo $form->textField($model,'ACTION',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'URL'); ?>
		<?php echo $form->textField($model,'URL',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESMENU'); ?>
		<?php echo $form->textField($model,'ESMENU'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GRUPO'); ?>
		<?php echo $form->textField($model,'GRUPO',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ICON'); ?>
		<?php echo $form->textField($model,'ICON',array('size'=>60,'maxlength'=>800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COLOR'); ?>
		<?php echo $form->textField($model,'COLOR',array('size'=>60,'maxlength'=>4000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ACTIVO'); ?>
		<?php echo $form->textField($model,'ACTIVO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ORDEN'); ?>
		<?php echo $form->textField($model,'ORDEN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->