<?php
/* @var $this DatosGeneralesController */
/* @var $model DatosGenerales */

$this->breadcrumbs=array(
	'Datos Generales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DatosGenerales', 'url'=>array('index')),
	array('label'=>'Create DatosGenerales', 'url'=>array('create')),
	array('label'=>'View DatosGenerales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DatosGenerales', 'url'=>array('admin')),
);
?>

<h1>Update DatosGenerales <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>