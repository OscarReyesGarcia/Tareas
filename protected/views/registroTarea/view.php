<?php
/* @var $this RegistroTareaController */
/* @var $model RegistroTarea */

$this->breadcrumbs=array(
	'Registro Tareas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RegistroTarea', 'url'=>array('index')),
	array('label'=>'Create RegistroTarea', 'url'=>array('create')),
	array('label'=>'Update RegistroTarea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RegistroTarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RegistroTarea', 'url'=>array('admin')),
);
?>

<h1>View RegistroTarea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_usuario',
		'id_estado',
		'nombre',
		'descripcion',
		'fecha_registro',
		'fecha_actualiza',
	),
)); ?>
