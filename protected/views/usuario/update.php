<?php

/* @var $this UsuarioController */
/* @var $model Usuario */

$this->title = 'Actualizar Usuario';

$this->breadcrumbs = array(
  'Usuarios' => array('index'),
  $model->login => array('view', 'id' => $model->id),
  'Actualizar',
);
?>

<?php
?>
<?php

echo $this->renderPartial('_form', array(
  'model' => $model,
  'roles' => $roles,
  'listaTipoUsuario' => $listaTipoUsuario,
));
?>