<?php
/* @var $this RegistroTareaController */
/* @var $model RegistroTarea */

$this->title = 'Nueva Tarea';
$this->breadcrumbs=array(
	'Tarea'=>array('index'),
	'Nueva',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'estado' => $estado)); ?>