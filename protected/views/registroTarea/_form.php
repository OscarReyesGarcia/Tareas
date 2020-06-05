<?php
/* @var $this RegistroTareaController */
/* @var $model RegistroTarea */
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
                    <h3 class="box-title">Estado</h3>

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
            <div class="col-xs-6 col-sm-6 col-md-6">
		<?php echo $form->labelEx($model,'id_estado'); ?>
		<?php echo $form->dropdownList($model, 'id_estado', $estado, array("class" => "form-control", "empty" => "---", "id" => "id_estado")); ?>
		<?php echo $form->error($model,'id_estado'); ?>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                    <?php echo $form->labelEx($model,'nombre'); ?>
                    <?php echo $form->textField($model,'nombre', array("class" => "form-control", 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model,'nombre'); ?>
            </div>
        </div>
        <div class=" control-group">
            <div class="col-xs-6 col-sm-6 col-md-6">
		<?php echo $form->labelEx($model,'descripcion'); ?>
                <?php echo $form->textArea($model, 'descripcion', array("class" => "form-control", 'rows' => 3, 'cols' => 50, 'maxlength' => 250)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
            </div>
        </div>
	
	<div class=" control-group">
                        <div class="col-md-9">
                            &nbsp;
                        </div>
                        <div class="col-md-3" >
                            <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                            ?>
                            <?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("registroTarea/"), array("class" => "bg-red color-palette btn btn-app")); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <?php $this->endWidget(); ?>
</section>