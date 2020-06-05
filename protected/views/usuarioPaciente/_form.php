<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>

<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<div class="col-md-12 columns">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Paciente</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <div class="box-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
              'id' => 'usuario-form',
              'enableAjaxValidation' => false,
            ));
            echo CHtml::passwordField('passwordD', '', array('style' => 'display:none'));
            ?>
            <div class="row">
                <div class="col-md-12 columns">
                    <p>Por favor ingresa los datos solicitados.<br>
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

            <div class="row col" >
                <div class="col-md-6 columns">
                    <?php echo $form->labelEx($model, 'login'); ?>
                    <?php echo $form->textField($model, 'login', array("class" => "form-control", 'size' => 60, 'maxlength' => 150)); ?>
                    <?php echo $form->error($model, 'login', array("class" => "box bg-red", "style" => "padding:5px;")); ?>

                </div>

                <div class="col-md-6 columns">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password', array("class" => "form-control", 'value' => "")); ?>
                    <?php echo $form->error($model, 'password', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>
            </div>

            <div class="row col" >
                <!--  <div class="col-md-6 columns" >
                <?php echo $form->labelEx($model, 'id_rol'); ?>
                <?php echo $form->dropDownList($model, 'id_rol', $roles, array("class" => "form-control", "empty" => "---")); //   ?>
                <?php echo $form->error($model, 'id_rol', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                  </div> -->
                <div class="col-md-6 columns" >
                    <?php echo $form->labelEx($model, 'id_tipo'); ?>
                    <?php echo $form->dropDownList($model, 'id_tipo', $tipos, array("class" => "form-control", "empty" => "---")); //   ?>
                    <?php echo $form->error($model, 'id_tipo', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>


            </div>
            <div class="row col" >
                <div class="col-md-4 columns" style="float: right">
                    <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                    ?>
                    <?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("usuarioPaciente/index", array("id" => $model->id)), array("class" => "bg-red color-palette btn btn-app")); ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
  $(document).ready(function () {
    $("#<?php echo Yii::app()->controller->id ?>").addClass("menuActivo");
  });

</script>

<script type="text/javascript">
          (function ($) {
              "use strict";
              $(".breadcrumbs").append('<li><a href="<?php echo CController::createUrl('usuarioAlumno/index') ?>"><span class="tab">Estudiantes</span></a></li>');
              $(".breadcrumbs").append('<li><a href="#"><span class="tab">Nuevo Estudiante</span></a></li>');
          })(jQuery);
</script>
