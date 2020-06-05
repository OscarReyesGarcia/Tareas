<?php
/* @var $this PermisosController */
/* @var $model Permisos */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => 'permisos-form',
  'enableAjaxValidation' => false,
    ));
?>

<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>

<?php if (Yii::app()->user->hasFlash('success')): ?>
  <div class="box-header bg-light-green" id="success">
      <h6 class="text-white  icon-thumbs-up" style="margin-left: 15px;margin-top:8px;">
          <?php echo Yii::app()->user->getFlash('success'); ?>
      </h6>
  </div>
<?php endif; ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="muted">Por favor ingresa los datos solicitados.<br>
                                <span class="text-red">Los datos marcados con <span class="required">*</span> son obligatorios</span></p>
                        </div>
                    </div><!-- /.row -->
                    <?php if (!empty($model->errors)) { ?>
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-ban"></i> Verifica los campos marcados en rojo.</h4>
                          <?php //echo $form->errorSummary($model);  ?>
                      </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'nombre'); ?>
                            <?php echo $form->textField($model, 'nombre', array("class" => "form-control", 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'nombre', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>

                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'controller'); ?>
                            <?php echo $form->textField($model, 'controller', array("class" => "form-control", 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'controller', array("class" => "alert alert-danger", "style" => "padding:5px;")); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'titulo'); ?>
                            <?php echo $form->textField($model, 'titulo', array("class" => "form-control", 'size' => 60, 'maxlength' => 11)); ?>
                            <?php echo $form->error($model, 'titulo', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>

                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'subtitulo'); ?>
                            <?php echo $form->textField($model, 'subtitulo', array("class" => "form-control", 'size' => 60, 'maxlength' => 20)); ?>
                            <?php echo $form->error($model, 'subtitulo', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">                        
                            <?php echo $form->labelEx($model, 'action'); ?>
                            <?php echo $form->textField($model, 'action', array("class" => "form-control", 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'action', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>

                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'url'); ?>
                            <?php echo $form->textField($model, 'url', array("class" => "form-control", 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'url', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'grupo'); ?>
                            <?php echo $form->textField($model, 'grupo', array("class" => "form-control", 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($model, 'grupo', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>

                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'icon'); ?>
                            <?php echo $form->textField($model, 'icon', array("class" => "form-control", 'size' => 60, 'maxlength' => 200)); ?>
                            <?php echo $form->error($model, 'icon', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'color'); ?>
                            <?php echo $form->dropDownList($model, 'color', Yii::app()->DataSelects->getColor(), array("class" => "form-control")); ?>
                            <?php echo $form->error($model, 'color', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'orden'); ?>
                            <?php echo $form->numberField($model, 'orden', array("class" => "form-control")); ?>
                            <?php echo $form->error($model, 'orden', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-4  checkbox">
                            <label>
                                <?php echo $form->checkBox($model, 'activo', array('checked' => 'checked')); ?>Activo
                                <?php echo $form->error($model, 'activo', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                            </label>
                        </div>
                        <div class="col-md-4  checkbox">
                            <label>
                                <?php echo $form->checkBox($model, 'esmenu', array()); ?> Es Menú
                                <?php echo $form->error($model, 'esmenu', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                            </label>
                        </div>
                        <div class="col-md-4  checkbox">
                            <label>
                                <?php echo $form->checkBox($model, 'essubmenu', array()); ?>Es Sub Menú
                                <?php echo $form->error($model, 'essubmenu', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                            </label>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-md-3" style="float: right">
                            <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app')); ?>
                            <?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("permisos/"), array("class" => "bg-red color-palette btn btn-app")); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<?php $this->endWidget(); ?>