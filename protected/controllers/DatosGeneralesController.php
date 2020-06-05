<?php

class DatosGeneralesController extends Controller {

  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout = '//layouts/registro';

  /**
   * @return array action filters
   */
  public function filters() {
    return array(
      'accessControl', // perform access control for CRUD operations
      'postOnly + delete', // we only allow deletion via POST request
    );
  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules() {
    $actions = array("none");
    $grupo = array("none");
    if (isset(Yii::app()->user->id_usuario)) {
      $permisosUsuario = Usuario::model()->findByPk(Yii::app()->user->id_usuario)->permisos;

      if (!empty($permisosUsuario)) {
        $permisosUsuario = CJSON::decode($permisosUsuario);
        $permisosController = Permisos::model()->findAll("controller=:controller", array(":controller" => Yii::app()->controller->id));
        foreach ($permisosController as $permiso) {
          if (in_array($permiso->id, $permisosUsuario)) {
            array_push($actions, $permiso->action);
            array_push($grupo, $permiso->grupo);
          }
        }
      }
    }

    return array(
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions' => $actions,),
      array('allow',
        'actions' => array('informacionGeneral'),
        'users' => array('@'),
        'expression' => 'isset(Yii::app()->user->id_rol) && Yii::app()->user->id_usuario== Usuario::model()->findByPk($_GET["id"])->id_usuario',
      ),
      array('deny', // deny all users
        'users' => array('*'),),
    );
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $this->render('view', array(
      'model' => $this->loadModel($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new DatosGenerales;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['DatosGenerales'])) {
      $model->attributes = $_POST['DatosGenerales'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('create', array(
      'model' => $model,
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['DatosGenerales'])) {
      $model->attributes = $_POST['DatosGenerales'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('update', array(
      'model' => $model,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id) {
    $this->loadModel($id)->delete();

    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }

  /**
   * Lists all models.
   */
  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('DatosGenerales');
    $this->render('index', array(
      'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new DatosGenerales('search');
    $model->unsetAttributes();  // clear any default values
    if (isset($_GET['DatosGenerales']))
      $model->attributes = $_GET['DatosGenerales'];

    $this->render('admin', array(
      'model' => $model,
    ));
  }

  function actionDescargar($id, $nombre_archivo, $tipo) {
    //echo Yii::app()->basePath.'/../uploads/'.$tipo.'/'.$nombre_archivo; die;
    $filecontent = file_get_contents(Yii::app()->basePath . '/../uploads/' . $tipo . '/' . $nombre_archivo);
    header("Content-Type: text/plain");
    header("Content-disposition: attachment; filename=$nombre_archivo");
    header("Pragma: no-cache");
    echo $filecontent;
    exit;
  }

  public function actionInformacionGeneral($id) {
    $id_tipo = Usuario::model()->findByPk(Yii::app()->user->id_usuario)->id_tipo;
    $permisUsuario = Usuario::model()->findByPk(Yii::app()->user->id_usuario)->permisos;
    $arrDescarga = array("Mensaje" => "SP");


    //if (strpos($permisUsuario, "50")) {
    array_push($arrDescarga, "Borrar");
    //}
    //if (strpos($permisUsuario, "54")) {
    array_push($arrDescarga, "Descarga");
    //}

    $model = DatosGenerales::model()->find("id_usuario=:id_usuario", array(":id_usuario" => $id));
    $model_old = $model;
    $model = DatosGenerales::model()->find("id_usuario=:id_usuario", array(":id_usuario" => $id));
    
    $paises = array(1=>'México');
    
    if (empty($model)) {
      $model = new DatosGenerales;
      $model_old = new DatosGenerales;
    } else {
      $foto_perfil_old = $model->foto_perfil;
    }

    if (isset($_POST['DatosGenerales'])) {

      $model->attributes = $_POST['DatosGenerales'];
      $model->id_usuario = $id;


      $model->foto_perfil = CUploadedFile::getInstance($model, 'foto_perfil');

      if ($model->validate()) {

        if (!empty($model->foto_perfil)) {
          $model->foto_perfil = CUploadedFile::getInstance($model, 'foto_perfil');
          $posicion = strrpos($model->foto_perfil, '.');
          $nombre_arc = substr($model->foto_perfil, 0, $posicion) . '_' . time() . substr($model->foto_perfil, $posicion);
          $tituloArchivo = $model->foto_perfil;
          $model->foto_perfil = $nombre_arc;
        } elseif (isset($foto_perfil_old)) {
          $model->foto_perfil = $foto_perfil_old;
        }

        if ($model->save(false)) {
          if (isset($tituloArchivo)) {
            //echo $model->titulo_profesional;die;
            $tituloArchivo->saveAs(Yii::app()->basePath . '/../uploads/fotoPerfil/' . $model->foto_perfil);
            @unlink(Yii::app()->basePath . '/../uploads/fotoPerfil/' . $foto_perfil_old);
          }
          Yii::app()->user->setFlash('success', "Sus datos se guardaron con éxito!");
          $this->redirect(array('InformacionGeneral', 'id' => $model->id_usuario));
        }
      }
    }


    $this->render('_form', array(
      'model' => $model,
      'paises' => $paises,
      'id_tipo' => $id_tipo,
      'model_old' => $model_old,
      'arrDescarga' => $arrDescarga,
    ));
  }

  public function actionborrarDocumento($id) {
    $tipo = $_GET['tipo'];
    $nombre_archivo = $_GET['nombre_archivo'];
    //echo $id . ",  ". $nombre_archivo . " -- " . $tipo;

    $model = DatosGenerales::model()->find("id_usuario=:id_usuario", array(":id_usuario" => $id));
    $model->foto_perfil = "";

    //var_dump($model);die;
    if ($model->update()) {
      //$tituloArchivo->saveAs(Yii::app()->basePath . '/../uploads/'.$tipo.'/' . $model->titulo_profesional);
      @unlink(Yii::app()->basePath . '/../uploads/' . $tipo . '/' . $nombre_archivo);
      Yii::app()->user->setFlash('success', "Su documento se borro con éxito!");
      $this->redirect(array('InformacionGeneral', 'id' => $model->id_usuario));
    }
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return DatosGenerales the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = DatosGenerales::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param DatosGenerales $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'datos-generales-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
