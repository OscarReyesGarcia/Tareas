<?php
/* @var $this PermisosController */
/* @var $model Permisos */

$this->breadcrumbs=array(
	'Permisoses'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Permisos', 'url'=>array('index')),
	array('label'=>'Create Permisos', 'url'=>array('create')),
	array('label'=>'Update Permisos', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Permisos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Permisos', 'url'=>array('admin')),
);
?>

<h1>View Permisos #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NOMBRE',
		'CONTROLLER',
		'ACTION',
		'URL',
		'ESMENU',
		'GRUPO',
		'ICON',
		'COLOR',
		'ACTIVO',
		'ORDEN',
	),
)); ?>
