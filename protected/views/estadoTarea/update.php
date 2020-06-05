<?php
/* @var $this RolController */
/* @var $model Rol */
$this->title = 'Actualizar Estado';
$this->breadcrumbs=array(
	'Estado'=>array('index'),
	'Actualizar',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>