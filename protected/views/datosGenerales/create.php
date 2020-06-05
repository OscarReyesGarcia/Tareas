<?php
/* @var $this DatosGeneralesController */
/* @var $model DatosGenerales */
$this->title = 'Agregar datos generales';
$this->breadcrumbs=array(
	'Datos Generales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DatosGenerales', 'url'=>array('index')),
	array('label'=>'Manage DatosGenerales', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>