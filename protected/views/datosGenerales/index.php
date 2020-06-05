<?php
/* @var $this DatosGeneralesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Datos Generales',
);

$this->menu=array(
	array('label'=>'Create DatosGenerales', 'url'=>array('create')),
	array('label'=>'Manage DatosGenerales', 'url'=>array('admin')),
);
?>

<h1>Datos Generales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
