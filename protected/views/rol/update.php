<?php
/* @var $this RolController */
/* @var $model Rol */
$this->title = 'Actualizar Rol';
$this->breadcrumbs=array(
	'Rol'=>array('index'),
	'Actualizar',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>