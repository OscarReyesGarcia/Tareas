<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */
$this->title = 'Pacientes';

$this->breadcrumbs = array(
    'Usuario Paciente' => array('index'),
    'Paciente',
);
?>
<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Lista de usuarios</h3>

                    <div class="box-tools">

                        <a href="<?php echo CController::createUrl('create') ?>" title="Nuevo usuario" class="btn btn-primary pull-right" ><i class="fa fa-user-plus"></i> </a>


                    </div>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo Usario</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($model as $estudiante) {
                                    ?>
                                    <tr>
                                        <?php if (isset($estudiante->datos_generales[0])) { ?>
                                            <td>
                                                <?php //var_dump($estudiante->datos_generales); ?>
                                                <?php echo $estudiante->datos_generales[0]->nombre . " " . $estudiante->datos_generales[0]->apellido_paterno; ?>
                                            </td>
                                        <?php } else { ?>
                                            <td>Sin Datos Generales</td>
                                        <?php } ?>
                                        <td>
                                            <?php echo $estudiante->login; ?>
                                        </td>
                                        <td>
                                            <?php echo $tipos[$estudiante->id_tipo]; ?>
                                        </td>
                                        <td>
                                            <?php echo CHtml::link('<i class="fa fa-search"></i> ', CController::createUrl("informacionGeneral", array("id" => $estudiante->id)), array("class" => "btn btn-block btn-success", 'title' => 'Ver')); ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    $(function () {
        $("#menu-showhide").children().eq(2).addClass("menu-select");
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });
    });
</script>