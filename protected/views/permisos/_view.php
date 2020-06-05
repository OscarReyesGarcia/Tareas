<?php
/* @var $this PermisosController */
/* @var $data Permisos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTROLLER')); ?>:</b>
	<?php echo CHtml::encode($data->CONTROLLER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACTION')); ?>:</b>
	<?php echo CHtml::encode($data->ACTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('URL')); ?>:</b>
	<?php echo CHtml::encode($data->URL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESMENU')); ?>:</b>
	<?php echo CHtml::encode($data->ESMENU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRUPO')); ?>:</b>
	<?php echo CHtml::encode($data->GRUPO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ICON')); ?>:</b>
	<?php echo CHtml::encode($data->ICON); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COLOR')); ?>:</b>
	<?php echo CHtml::encode($data->COLOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACTIVO')); ?>:</b>
	<?php echo CHtml::encode($data->ACTIVO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ORDEN')); ?>:</b>
	<?php echo CHtml::encode($data->ORDEN); ?>
	<br />

	*/ ?>

</div>