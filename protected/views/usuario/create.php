<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->title = 'Crear usuario';
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Nuevo usuario',
);
?>
<?php 
    echo $this->renderPartial('_form',
            array(
                'model'=>$model,
                'roles'=>$roles,
                'listaTipoUsuario' =>$listaTipoUsuario,
            )
        ); 
?>