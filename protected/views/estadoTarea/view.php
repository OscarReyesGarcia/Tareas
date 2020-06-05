<?php
/* @var $this EstadoTareaController */
/* @var $model EstadoTarea */

$this->breadcrumbs=array(
	'Estado Tareas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EstadoTarea', 'url'=>array('index')),
	array('label'=>'Create EstadoTarea', 'url'=>array('create')),
	array('label'=>'Update EstadoTarea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EstadoTarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstadoTarea', 'url'=>array('admin')),
);
?>

<h1>View EstadoTarea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
