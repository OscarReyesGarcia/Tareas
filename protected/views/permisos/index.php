<?php
/* @var $this PermisosController */
/* @var $dataProvider CActiveDataProvider */
$this->title = 'Permisos';
$this->breadcrumbs = array(
  'Usuario' => array('usuario/index'),
  'Permisos',
);
?>
<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect', '$("#success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>
<section class="content">

    <?php if (Yii::app()->user->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissible" id="success">

          <h4 class="lead icon-thumbs-up">
              <i class="icon fa fa-check"></i>  <?php echo Yii::app()->user->getFlash('success'); ?>
          </h4>
      </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Lista de permisos</h3>

                    <div class="box-tools">

                        <a href="<?php echo CController::createUrl('create') ?>" title="Nuevo permiso" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> </a>


                    </div>
                </div>

                <div class="box-body ">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <!--<th>Id</th>-->
                                    <th width="18%">Nombre</th>
                                    <th width="10%">Grupo</th>
                                    <th width="10%">Controllador</th>
                                    <th width="10%">Acción</th>
                                    <th width="10%">Url</th>
                                    <th width="10%">Menú</th>
                                    <th width="10%">Submenú</th>
                                    <th width="10%">Activo</th>
                                    <th width="10%">Orden</th>
                                    <?php if (in_array('update', $usuario_permiso)): ?>
                                      <th width="1%">Editar</th>
                                    <?php endif; ?>
                                    <?php if (in_array('borrar', $usuario_permiso)): ?>
                                      <th width="1%">Borrar</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($model as $permiso) { ?>
                                  <tr>
                                      <!--<td>
                                      <?php //echo $permiso->id; ?>
                                      </td>-->
                                      <td>
                                          <?php echo $permiso->nombre; ?>
                                      </td>
                                      <td>
                                          <?php echo $permiso->grupo; ?>
                                      </td>
                                      <td>
                                          <?php echo $permiso->controller; ?>
                                      </td>
                                      <td>
                                          <?php echo $permiso->action; ?>
                                      </td>
                                      <td>
                                          <?php echo $permiso->url; ?>
                                      </td>
                                      <td>
                                          <?php
                                          echo ($permiso->esmenu) ? 'Sí' : 'No';
                                          //echo ($permiso->ESMENU) ? '<i class="icon-ok"></i>' : '<i class="icon-remove"></i>'; 
                                          ?>
                                      </td>
                                      <td>
                                          <?php
                                          echo ($permiso->essubmenu) ? 'Sí' : 'No';
                                          //echo ($permiso->ESSUBMENU) ? '<i class="icon-ok"></i>' : '<i class="icon-remove"></i>'; 
                                          ?>
                                      </td>
                                      <td>
                                          <?php echo ($permiso->activo) == 1 ? '<i class="icon-ok"></i>' : '<i class="icon-remove"></i>'; ?>
                                      </td>
                                      <td>
                                          <?php echo $permiso->orden; ?>
                                      </td>
                                      <?php if (in_array('update', $usuario_permiso)): ?>
                                        <td>
                                            <?php echo CHtml::link('<i class="fa fa-pencil"></i> ', CController::createUrl("update", array("id" => $permiso->id)), array("class" => "btn btn-block btn-success", 'title' => 'Editar')); ?>
                                        </td>
                                      <?php endif; ?>
                                      <?php if (in_array('borrar', $usuario_permiso)): ?>
                                        <td>
                                            <?php
                                            echo CHtml::link('<i class="fa fa-fw  fa-trash-o"></i> ', CController::createUrl("borrar", array("id" => $permiso->id)), array("class" => "btn btn-block btn-danger", 'confirm' => '¿Estás seguro de borrar este elemento?'));
                                            ?>
                                        </td>
                                      <?php endif; ?>
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
      $('#example1').DataTable()
      $('#example2').DataTable({
          'paging': true,
          'lengthChange': true,
          'searching': true,
          'ordering': true,
          'info': true,
          'autoWidth': true
      })
  })
</script>
