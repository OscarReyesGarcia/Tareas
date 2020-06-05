<?php
/* @var $this PermisosController */
/* @var $model Permisos */
$this->title = 'Actualizar Permiso';
$this->breadcrumbs=array(
	'Permisoses'=>array('index'),
	'Actualizar',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>