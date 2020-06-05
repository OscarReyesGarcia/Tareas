<?php
/* @var $this RolController */
/* @var $model Rol */
$this->title = 'Nuevo Estado';
$this->breadcrumbs=array(
	'Estado'=>array('index'),
	'Nuevo',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>