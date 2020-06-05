<?php
$this->title = 'Actualizar permisos';
$this->breadcrumbs = array(
  'Usuarios' => array('index'),
  $model->id => array('view', 'id' => $model->id),
  'Actualizar',
);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <p class="muted">
                Por favor marca los permisos a asignar.<br>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h4><i class="icon-th-list"></i> Permisos de usuario: <?php echo $model->nombre; ?></h4>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                
                            <?php
                            if (empty($model->permisos)) {
                              $model->permisos = "[none]";
                            }
                            ?>

                            <?php echo CHtml::beginForm() ?>
                            <!--<div class="row-fluid" id="permisos">
                        
                            <?php //echo CHtml::checkBoxList("permisos", CJSON::decode($model->permisos), $permisos, array("separator" => ' ', "template" => "<div class='span4'>{input} {label} </div>", 'labelOptions' => array('style' => 'display:inline'), 'encode' => true)) ?>
                        </div>-->
                            <?php $controller = "";
                            $line = "";
                            ?>

<?php if (!empty($model->errors)) { ?>
                              <div class="alert alert-block alert-error fade in">
                                  <button data-dismiss="alert" class="close" type="button">×</button>
                                  <h4>Verifica los campos marcados en rojo.</h4>
                              <?php var_dump($model->errors); ?>
                              </div>
<?php } ?>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">

                                    <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                                    ?>
<?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("rol/view", array("id" => $model->id)), array("class" => "bg-red color-palette btn btn-app")); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Seleccionar todos</h4>
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" id='select_all' />
                                </div>
                            </div>
                            <?php foreach ($permisos as $permiso) { ?>

                              <?php
                              if ($controller != $permiso->controller) {
                                echo $line . "<h2>$permiso->controller</h2>";
                                $controller = $permiso->controller;
                              }
                              $line = "<hr />";
                              ?>
                              <div class="row">
                                  <div class="col-md-3">
  <?php echo $permiso->nombre ?>
                                  </div>
                                  <div class="col-md-1">
  <?php echo CHtml::checkBox("permisos[seleccionados][{$permiso->id}]", in_array($permiso->id, CJSON::decode($model->permisos)), array('style' => 'display:inline')) . "<br />"; ?>
                                  </div>
                              </div>
<?php } ?>
                            <br />
                            <div class="row">
                                <div class="col-md-9">
                                </div>
                                <div class="col-md-3">
                                    <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                                    ?>
<?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("rol/view", array("id" => $model->id)), array("class" => "bg-red color-palette btn btn-app")); ?>
                                </div>
                            </div>
<?php echo CHtml::endForm() ?>
                        
                </div>
            </div>
        </div>
    </div>
</section>
<script language="JavaScript">
  window.onload = function () {
      $('#select_all').change(function () {
          var checkboxes = $(this).closest('form').find(':checkbox');
          if ($(this).is(':checked')) {
              checkboxes.prop('checked', true);
          } else {
              checkboxes.prop('checked', false);
          }
      });
  };
</script>