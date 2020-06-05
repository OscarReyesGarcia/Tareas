<?php
/* @var $this PermisosController */
/* @var $model Permisos */
$this->title = 'Nuevo Permiso';
$this->breadcrumbs=array(
	'Permisoses'=>array('index'),
	'Nuevo',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>