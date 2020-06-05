<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<section class="content">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
      'id' => 'usuario-form',
      'enableAjaxValidation' => false,
    ));
    ?>

    <div class="row">


        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuario</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <?php if (!empty($model->errors)) { ?>
                      <div class="alert alert-block alert-error fade in">
                          <button data-dismiss="alert" class="close" type="button">×</button>
                          <h4>Verifica los campos marcados en rojo.</h4>
                          <?php echo $form->errorSummary($model); ?>
                      </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="muted">Por favor ingresa los datos solicitados.<br>
                                <span class="text-red">Los datos marcados con <span class="required">*</span> son obligatorios</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="control-group">
                                <?php echo $form->labelEx($model, 'login', array("class" => "control-label")); ?>
                                <div class="controls form-group">
                                    <?php echo $form->textField($model, 'login', array("class" => "form-control", 'size' => 60, 'maxlength' => 150)); ?>
                                    <?php echo $form->error($model, 'login', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="control-group">
                                <?php echo $form->labelEx($model, 'password', array("class" => "control-label")); ?>
                                <div class="controls form-group">
                                    <?php echo $form->passwordField($model, 'password', array("class" => "form-control", "value" => "", "autocomplete" => "off")); ?>
                                    <?php echo $form->error($model, 'password', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" >
                            <div class="control-group">
                                <?php echo $form->labelEx($model, 'id_rol', array("class" => "control-label")); ?>
                                <div class="controls form-group">
                                    <?php echo $form->dropDownList($model, 'id_rol', $roles, array("class" => "form-control", "empty" => "---")); //  ?>
                                    <?php echo $form->error($model, 'id_rol', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-4" >
                            <div class="control-group">
                                <?php echo $form->labelEx($model, 'id_tipo', array("class" => "control-label")); ?>
                                <div class="controls form-group">
                                    <?php echo $form->dropDownList($model, 'id_tipo', $listaTipoUsuario, array("class" => "form-control", "empty" => "---")); //  ?>
                                    <?php echo $form->error($model, 'id_tipo', array("class" => "alert alert-error", "style" => "padding:5px;")); ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-9">
                            &nbsp;
                        </div>
                        <div class="col-md-3">
                            <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                            ?>
                        
                            <?php echo CHtml::link('<i class="fa fa-reply"></i> Cancelar', CController::createUrl("usuario/view", array("id" => $model->id)), array("class" => "bg-red color-palette btn btn-app")); ?>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</section>