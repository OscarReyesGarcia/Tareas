<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->title = 'Visualizando: ' . $model->login;
$this->breadcrumbs = array(
  'Usuarios' => array('index'),
  $model->login,
);

Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>
<section class="content">
    <?php if (Yii::app()->user->hasFlash('success')): ?>
      <div class="alert alert-block alert-success fade in" id="success">
          <h6 class="lead icon-thumbs-up" style="margin-left: 15px;margin-top:8px;">
              <?php echo Yii::app()->user->getFlash('success'); ?>
          </h6>
      </div>
    <?php endif; ?>
    

    <div class="row">
        <div class="col-md-6">
            <!-- BEGIN profile-side-box -->
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del usuario</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <a href="<?php echo CController::createUrl("update", array("id" => $model->id)) ?>" class="btn btn-box-tool"><i class="fa fa-edit"></i></a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <h4><strong><?php echo $model->getAttributeLabel('login'); ?></strong></h4><?php echo $model->login; ?>
                    </div>
                    <div class="col-md-6">
                        <h4><strong><?php echo $model->getAttributeLabel('rol'); ?></strong></h4>
                        <?php echo Rol::model()->findByPk($model->id_rol)->nombre; ?>
                    </div>
                </div>


            </div>
        </div> <!-- span -->




        <div class="col-md-6">
            <!-- BEGIN profile-side-box -->
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <a href="<?php echo CController::createUrl("permisos", array("id" => $model->id)) ?>" class="btn btn-box-tool"><i class="fa fa-edit"></i></a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <?php $controller = "" ?>
                    <?php foreach ($permisos as $permiso) { ?>
                      <?php
                      echo '<div class="col-md-12">';
                      if ($controller != $permiso->controller) {

                        echo "<hr><h4>$permiso->controller</h4>";
                        $controller = $permiso->controller;
                      }
                      ?>
                      <?php echo "<p>" . $permiso->nombre . "<p/>"; ?>
                      <?php echo '</div>'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>