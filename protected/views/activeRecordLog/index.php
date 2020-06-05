<script>
  $(document).ready(function () {
      $('#Administración').addClass("in");
  });
</script>
<?php
/* @var $this ActiveRecordLogController */
/* @var $dataProvider CActiveDataProvider */
$this->title = 'Logs';
$this->breadcrumbs = array(
  'Log',
);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Logs</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <div class="table-responsive tooltip-demo">
                        <table class="datatable table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <!--<th>Id</th>-->
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Modelo</th>
                                    <th>Usuario</th>
                                    <th>Campos Modificados</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($model as $log) { ?>
                                  <tr>
                                      <td>
                                          <?php echo $log->id; ?>
                                      </td>
                                      <td>
                                          <?php echo $log->action; ?>
                                      </td>
                                      <td>
                                          <?php echo $log->model; ?>
                                      </td>
                                      <td>
                                          <?php echo $usuarios[$log->userid]; ?>
                                      </td>
                                      <td>
                                          <?php echo $log->field; ?>
                                      </td>
                                      <td>
                                          <?php echo $log->creationdate; ?>
                                      </td>
                                      <td>
                                          <?php echo $log->description; ?>
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