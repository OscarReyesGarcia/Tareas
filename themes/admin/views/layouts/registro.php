<?php
if (isset(Yii::app()->user->id_usuario)) {
  $model = Usuario::model()->findByPk(Yii::app()->user->id_usuario);
  $criteria = new CDbCriteria();
  //echo Yii::app()->user->id_tipo;
  switch ((Yii::app()->user->id_tipo)) {

    case 1:
      $criteria->addInCondition("id", CJSON::decode($model->permisos));
      $criteria->addCondition("grupo in ('Pacientes')");
      break;
    case 2:
      $criteria->addCondition("grupo='Nuevo Ingreso'");
      break;
    case 3:
      $criteria->addCondition("grupo in ('Paciente')");
      break;
    case 4:
      $criteria->addCondition("grupo in ('Egresado','Estudiante', 'Nuevo Ingreso')");
      break;
    case 5:
      $criteria->addInCondition("id", CJSON::decode($model->permisos));
      $criteria->addCondition("grupo in ('Egresado','Estudiante', 'Nuevo Ingreso')");
      break;
  }

  $criteria->order = "orden";
  //$criteria->addInCondition("id", CJSON::decode($model->permisos));
  //$criteria->addCondition("grupo='Estudiantes'");
  $criteria->addCondition("esMenu=0");
  //var_dump($criteria);
  $permisos = Permisos::model()->findAll($criteria);
} else {
  $permisos = array();
}
?>

<?php $this->beginContent('//layouts/main'); ?>
<!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/template/css/mail.css"> -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->title) and ! is_null($this->title)): ?>
          <h1><?php echo $this->title ?></h1>
        <?php endif; ?>

        <?php if (isset($this->breadcrumbs)): ?>

          <?php
          $home = CController::createUrl("site/index");
          $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'tagName' => 'ol', // container tag
            'htmlOptions' => array('class' => 'breadcrumb'), // no attributes on container
            'separator' => ' ', // no separator
            'homeLink' => '<li>' . CHtml::link('<i class="fa fa-home"></i>', Yii::app()->homeUrl) . '</li>', // home link template
            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>', // active link template
            'inactiveLinkTemplate' => '<li class="active"><a href="javascript:void(0);">{label}</a></li>', // in-active link template
          ));
          ?><!-- breadcrumbs -->

        <?php endif ?>

    </section>

<?php if (isset($_GET['id']) && !empty($_GET['id'])) { ?>
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Submenú</h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <?php if (isset($_GET['id']) && !empty($_GET['id'])) { ?>
                  <ul class="nav nav-pills nav-stacked">
                      <?php
                      $grupo = "";
                      foreach ($permisos as $permiso) {
                        //  echo $permiso->url;
                        echo "<li id='" . $permiso->controller . "' >" . CHtml::link("<i class='" . $permiso->icon . "'></i>" . $permiso->nombre, CController::createUrl($permiso->url, array("id" => $_GET['id']))) . "</li>";
                      }
                      ?>
                      <?php echo (!empty($permisos)) ? '</ul>' : ''; ?>
                    <?php } ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
<?php } else{ ?>
    <div class="col-md-3"></div>
<?php } ?>
    <div class="col-md-9">
        <?php echo $content; ?>
    </div>
    <!-- /.content -->
    <div style="clear: both"></div>
</div>
<!-- content -->

<?php $this->endContent(); ?>

<script>
  (function ($) {

      $("#menu-showhide").children().eq(1).addClass("menu-select");
  })(jQuery);
</script>