<?php
/* @var $this RegistroTareaController */
/* @var $model RegistroTarea */

$this->title = 'Actualizar Tarea';
$this->breadcrumbs=array(
	'Tarea'=>array('index'),
	'Actualizar',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'estado' => $estado)); ?>