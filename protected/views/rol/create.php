<?php
/* @var $this RolController */
/* @var $model Rol */
$this->title = 'Nuevo Rol';
$this->breadcrumbs=array(
	'Rol'=>array('index'),
	'Nuevo',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>