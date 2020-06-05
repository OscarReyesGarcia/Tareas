<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->title = 'Nuevo Usuario Paciente';

$this->breadcrumbs = array(
  'Usuario Paciente' => array('index'),
  'Nuevo paciente',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'roles'=>$roles, 'tipos'=>$tipos)); ?>