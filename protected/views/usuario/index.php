    <?php
    /* @var $this UsuarioController */
    /* @var $dataProvider CActiveDataProvider */
//$this->pageTitle=Yii::app()->name . ' - Usuario';
    $this->title = 'Usuarios';
    $this->breadcrumbs = array(
      'Usuarios',
    );
//$sub = Yii::$app->runAction('permisos/getSubMenu', ['grupo' => 'Usuario']);
//var_dump($sub);
    ?>


<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>
<section class="content">
    
    <?php //if (count($subMenu) > 0): ?>
      <!--BEGIN RESPONSIVE NAV-->
<!--      <div class="bs-docs-example" id="subMenu">
          <div class="navbar">
              <div class="navbar-inner">
                  <div class="container">
                      <a data-target=".navbar-responsive-collapser" data-toggle="collapse" class="btn btn-navbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </a>
                      <div class="nav-collapse collapse navbar-responsive-collapser">
                          <ul class="nav pull-right">
                              <?php //foreach ($subMenu as $item): ?>
                                <li>
                                    <?php //echo CHtml::link($item->nombre, CController::createUrl($item->url), array("class" => "btn btn-large btn-primary")); ?>
                                </li>
                              <?php //endforeach; ?>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>-->
      <!--END RESPONSIVE NAV-->
    <?php //endif; ?>

    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Lista de usuarios</h3>

                    <div class="box-tools">
                        
                        <a href="<?php echo CController::createUrl('create')?>" title="Nuevo usuario" class="btn btn-primary pull-right" ><i class="fa fa-user-plus"></i> </a>
                            
                        
                    </div>
                </div>
                
                <div class="box-body table-responsive no-padding">
                    <?php if (Yii::app()->user->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissible" id="success">
      
      <h4 class="lead icon-thumbs-up">
        <i class="icon fa fa-check"></i>  <?php echo Yii::app()->user->getFlash('success'); ?>
      </h4>
  </div>
<?php endif; ?>
                    
                    <table id="sample_1" class="table table-hover" id="tabla-usuarios">
                        <thead>
                            <tr role="row">
                                <th width="49%">Nombre</th>
                                <th width="49%">Rol</th>
                                <?php if (in_array('update', $permiso)): ?>
                                  <th width="1%">Editar</th>
                                <?php endif; ?>
                                <?php if (in_array('borrar', $permiso)): ?>
                                  <th width="1%">Borrar</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <?php
                            $i = 1;
                            foreach ($model as $usuario) {
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $usuario->login; ?>
                                  </td>
                                  <td>
                                      <?php echo $roles[$usuario->id_rol]; ?>
                                  </td>
                                  <?php if (in_array('update', $permiso)): ?>
                                    <td>

                                        <?php echo CHtml::link('<i class="fa fa-pencil"></i> ', CController::createUrl("view", array("id" => $usuario->id)), array("class" => "btn btn-block btn-success", 'title' => 'Editar')); ?>
                                    </td>
                                  <?php endif; ?>
                                  <?php if (in_array('borrar', $permiso)): ?>
                                    <td>
                                        <?php
                                        echo CHtml::link('<i class="fa fa-fw  fa-trash-o"></i> ', CController::createUrl("borrar", array("id" => $usuario->id)), array("class" => "btn btn-block btn-danger", 'confirm' => '¿Estás seguro de borrar este elemento?'));
                                        ?>
                                    </td>
                                  <?php endif; ?>
                              </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>