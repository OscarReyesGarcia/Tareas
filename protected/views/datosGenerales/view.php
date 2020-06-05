<?php
/* @var $this DatosGeneralesController */
/* @var $model DatosGenerales */

$this->breadcrumbs=array(
	'Datos Generales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DatosGenerales', 'url'=>array('index')),
	array('label'=>'Create DatosGenerales', 'url'=>array('create')),
	array('label'=>'Update DatosGenerales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DatosGenerales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DatosGenerales', 'url'=>array('admin')),
);
?>

<h1>View DatosGenerales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_usuario',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'sexo',
		'fecha_nacimiento',
		'foto_perfil',
	),
)); ?>
