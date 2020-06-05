<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rol')); ?>:</b>
	<?php echo CHtml::encode($data->id_rol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('permisos')); ?>:</b>
	<?php echo CHtml::encode($data->permisos); ?>
	<br />

	*/ ?>

</div>