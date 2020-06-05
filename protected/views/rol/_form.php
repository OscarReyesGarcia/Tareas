<?php
/* @var $this RolController */
/* @var $model Rol */
/* @var $form CActiveForm */
?>
<section class="content">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
      'id' => 'rol-form',
      // Please note: When you enable ajax validation, make sure the corresponding
      // controller action is handling ajax validation correctly.
      // There is a call to performAjaxValidation() commented in generated controller code.
      // See class documentation of CActiveForm for details on this.
      'enableAjaxValidation' => false,
    ));
    ?>
    <?php
    Yii::app()->clientScript->registerScript(
        'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
    );
    ?>

    <?php if (Yii::app()->user->hasFlash('success')): ?>
      <div class="alert alert-block alert-success fade in" id="success">
          <h6 class="text-white  icon-thumbs-up" style="margin-left: 15px;margin-top:8px;">
              <?php echo Yii::app()->user->getFlash('success'); ?>
          </h6>
      </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Rol</h3>

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
                      <div class="alert alert-block alert-error fade in">
                          <button data-dismiss="alert" class="close" type="button">×</button>
                          <h4>Verifica los campos marcados en rojo.</h4>
                          <?php echo $form->errorSummary($model); ?>
                      </div>
                    <?php } ?>
                    <div class=" control-group">
                        <div class="col-xs-6">
                            <?php echo $form->labelEx($model, 'nombre'); ?>
                            <?php echo $form->textField($model, 'nombre', array("class" => "form-control", 'maxlength' => 50)); ?>
                            <?php echo $form->error($model, 'nombre', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                        <div class="col-xs-6">
                            <?php echo $form->labelEx($model, 'nombre_corto'); ?>
                            <?php echo $form->textField($model, 'nombre_corto', array("class" => "form-control", 'maxlength' => 20)); ?>
                            <?php echo $form->error($model, 'nombre_corto', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                    </div>
                    <div class=" control-group">
                        <div class="col-xs-12">
                            <?php echo $form->labelEx($model, 'descripcion'); ?>
                            <?php echo $form->textArea($model, 'descripcion', array("class" => "form-control", 'maxlength' => 200, 'row' => '3')); ?>
                            <?php echo $form->error($model, 'descripcion', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                        </div>
                    </div>

                    <div class=" control-group">
                        <div class="col-md-9">
                            &nbsp;
                        </div>
                        <div class="col-md-3" >
                            <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                            ?>
                            <?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("rol/"), array("class" => "bg-red color-palette btn btn-app")); ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



    <?php $this->endWidget(); ?>
</section>