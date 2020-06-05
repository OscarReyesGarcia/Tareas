<script>
    $( document ).ready(function() {
        $('#Administración').addClass("in");
    });
</script>
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>
<div class="row">
    <div class="col-md-12 columns">
        <h4>Visualizando: <?php echo $model->login; ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-6 columns">
        <div class="panel panel-default">
            <div class="col-md-6 columns">
            <h4><i class="fa fa-edit fa-fw"></i> Datos Usuario</h4>
            </div>
            <div class="col-md-6 columns">
                <a href="<?php echo CController::createUrl("update", array("id" => $model->id_usuario)) ?>" class="tiny radius button bg-yellow" style="float:right">Editar usuario <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 columns">
                        <strong><?php echo $model->getAttributeLabel('login'); ?>: </strong><?php echo $model->login; ?>
                        <br />
                        <strong><?php echo $model->getAttributeLabel('rol'); ?>: </strong><?php echo Rol::model()->findByPk($model->id_rol)->nombre; ?>
                    </div>
                </div>
                </div>
                </div>
                </div>
                
                <div class="col-md-6 columns">
        <div class="panel panel-default">
            <div class="col-md-6 columns">
            <h3 class="text-red">Permisos</h3>
            
            </div>
            
            <div class="col-md-6 columns">
                <a href="<?php echo CController::createUrl("permisos", array("id" => $model->id_usuario)) ?>" class="btn bg-yellow btn-xs pull-right">Editar permisos <i class="fa fa-angle-right"></i></a>
            </div>
            
            <div class="panel-body">
                <div class="row">
                   <div class="col-md-12 columns">
                        <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php $controller = "" ?>
                <div class="row">
                    <div class="col-md-12 columns">
                        <?php foreach ($permisos as $permiso) { ?>
                            <?php
                            if ($controller != $permiso->controller) {
                                echo "<hr /><h4>$permiso->controller</h4>";
                                $controller = $permiso->controller;
                            }
                            ?>
                            <?php echo $permiso->nombre . "<br />" ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                </div>

</div>

