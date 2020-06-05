<?php
/* @var $this DatosGeneralesController */
/* @var $model DatosGenerales */
/* @var $form CActiveForm */
?>
<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>

<div class="col-md-12 columns">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Generales</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <div class="box-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
              'id' => 'datos-generales-form',
              'enableAjaxValidation' => false,
              'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            echo CHtml::passwordField('passwordD', '', array('style' => 'display:none'));
            ?>
            <div class="row">
                <div class="col-md-12">
                    <?php if (Yii::app()->user->hasFlash('success')): ?>

                      <div class="alert alert-success alert-dismissible" id="success">

                          <h4 class="lead icon-thumbs-up">
                              <i class="icon fa fa-check"></i>  <?php echo Yii::app()->user->getFlash('success'); ?>
                          </h4>
                      </div>
                    <?php endif; ?>
                </div>
            </div>

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
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->labelEx($model, 'nombre'); ?>
                    <?php echo $form->textField($model, 'nombre', array("class" => "form-control", 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'nombre', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>

                <div class="col-md-6">
                    <?php echo $form->labelEx($model, 'apellido_paterno'); ?>
                    <?php echo $form->textField($model, 'apellido_paterno', array("class" => "form-control", 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'apellido_paterno', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->labelEx($model, 'apellido_materno'); ?>
                    <?php echo $form->textField($model, 'apellido_materno', array("class" => "form-control", 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'apellido_materno', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>

                <div class="col-md-6">
                    <?php echo $form->labelEx($model, 'sexo'); ?>
                    <?php echo $form->dropDownList($model, 'sexo', Yii::app()->DataSelects->getSexo(), array("class" => "form-control", 'empty' => "---")); ?>
                    <?php echo $form->error($model, 'sexo', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->labelEx($model, 'fecha_nacimiento'); ?>
                    <?php echo $form->textField($model, 'fecha_nacimiento', array("id" => "id_fecha_nacimiento", "class" => "form-control")); ?>
                    <?php echo $form->error($model, 'fecha_nacimiento', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>
                <div class="col-md-4">
                    <?php echo $form->labelEx($model, 'edad'); ?>
                    <?php echo $form->textField($model, 'edad', array("id"=> "id_edad", "class" => "form-control", "readonly" => "true")); ?>
                    <?php echo $form->error($model, 'edad', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->labelEx($model, 'foto_perfil'); ?>
                    <?php echo $form->fileField($model, 'foto_perfil', array("class" => "form-control")); ?>
                    <?php echo $form->error($model, 'foto_perfil', array("class" => "box bg-red", "style" => "padding:5px;")); ?>
                    <?php echo (!empty($model_old["foto_perfil"])) ? "Archivo: " . $model_old["foto_perfil"] : ""; ?>

                    <?php
                    if (!empty($model_old["foto_perfil"])) {
                      ?>


                      <div class="row">
                          <div class="col-md-4">
                              <?php
                              if (in_array("Descarga", $arrDescarga)) {
                                $filecontent = Yii::app()->request->baseUrl . '/uploads/fotoPerfil/' . $model_old["foto_perfil"];
                                echo "<p>" . CHtml::link("<i class='fa fa-search'></i>Visualizar", "javascript:;", array("class" => "bg-green-active color-palette btn btn-app", "title" => "Visualizar", "onclick" => "myFunction('{$filecontent}')")) . "</p>";
                                ?>
                                <?php
                              }
                              ?>
                          </div>
                          <div class="col-md-4">
                              <?php $filecontent = Yii::app()->request->baseUrl . '/uploads/fotoPerfil/' . $model_old["foto_perfil"]; ?>
                              <?php
                              if (in_array("Descarga", $arrDescarga)) {
                                echo "<p>" . CHtml::link("<i class='fa fa-download'></i>Descargar", CController::createUrl("Descargar", array(
                                      "id" => $_GET['id'],
                                      "nombre_archivo" => $model_old["foto_perfil"],
                                      "tipo" => "fotoPerfil"
                                    )), array("class" => "bg-aqua-active color-palette btn btn-app", "title" => "Descargar")) . "</p>";
                              } else {
                                echo "Archivo: " . $model_old["foto_perfil"];
                              }
                              ?>
                          </div>
                          <div class="col-md-4">
                              <?php
                              if (in_array("Borrar", $arrDescarga)) {
                                echo "<p>" . CHtml::link("<i class='fa fa-trash'></i>Borrar", CController::createUrl("borrarDocumento", array(
                                      "id" => $_GET['id'],
                                      "nombre_archivo" => $model_old["foto_perfil"],
                                      "tipo" => "fotoPerfil"
                                    )), array("class" => "bg-red-active color-palette btn btn-app")) . "</p>";
                              }
                              ?>
                          </div>
                      </div>
                      <?php
                    }
                    ?>




                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <?php echo CHtml::htmlButton('<i class="fa fa-save"></i> Guardar', array('type' => 'submit', 'class' => 'bg-green color-palette btn btn-app'));
                    ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
  $(document).ready(function () {
      $("#<?php echo Yii::app()->controller->id ?>").addClass("menuActivo");

      $('#id_fecha_nacimiento').on('blur', function () {
          var _fecha = $('#id_fecha_nacimiento').val();
          var _edad = calcularEdad(_fecha);
          $("#id_edad").val(_edad);

      });

  });

</script>
<script>
  function myFunction(filenPDF) {
      var myWindow = window.open("", "MsgWindow", "width=800, height=700");
      myWindow.document.write('<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" width="800" height="700"><param name="src" value="' + filenPDF + '" ><!--[if gte IE 7]> <!--><object type="application/img" data="'+filenPDF+'" width="800" height="700">alt : <a href="'+filenPDF+'">'+filenPDF+'</a></object><!--<![endif]--><!--[if lt IE 7]>alt : <a href="'+filenPDF+'">'+filenPDF+'</a><![endif]--></object>');
      return false;
  }
</script>