<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->title = 'Actualizar Usuario Paciente';

$this->breadcrumbs = array(
  'Usuario Paciente' => array('index'),
  $model->login => array('view', 'id' => $model->id_usuario),
  'Actualizar',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'roles'=>$roles, 'tipos'=>$tipos)); ?>