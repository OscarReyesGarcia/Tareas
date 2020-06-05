<?php

class UsuarioPacienteController extends Controller {
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout='//layouts/registro';

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
    if (isset(Yii::app()->user->id_usuario)) {
      $permisosUsuario = Usuario::model()->findByPk(Yii::app()->user->id_usuario)->permisos;
      if (!empty($permisosUsuario)) {
        $permisosUsuario = CJSON::decode($permisosUsuario);
        $permisosController = Permisos::model()->findAll("controller=:controller", array(":controller" => Yii::app()->controller->id));
        foreach ($permisosController as $permiso) {
          if (in_array($permiso->id, $permisosUsuario)) {
            array_push($actions, $permiso->action);
          }
        }
      }
    }
    return array(
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions' => $actions,
      ),
      array('allow',
        'actions' => array('informacionGeneral'),
        'users' => array('@'),
        'expression' => 'isset(Yii::app()->user->id_rol) && Yii::app()->user->id_usuario== Usuario::model()->findByPk($_GET["id"])->id_usuario',
      ),
      array('deny', // deny all users
        'users' => array('*'),
      ),
    );

    /* return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
      'actions'=>array('index','view'),
      'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions'=>array('create','update'),
      'users'=>array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions'=>array('admin','delete'),
      'users'=>array('admin'),
      ),
      array('deny',  // deny all users
      'users'=>array('*'),
      ),
      ); */
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $model = $this->loadModel($id);
    $criteria = new CDbCriteria();
    $criteria->order = "controller";
    $criteria->addInCondition("id", CJSON::decode($model->permisos));
    $permisos = Permisos::model()->findAll($criteria);
    $this->render('view', array(
      'model' => $model,
      'permisos' => $permisos,
    ));
  }

  public function actionPermisos($id) {
    $model = $this->loadModel($id);
    if (isset($_POST['permisos']['seleccionados'])) {
      /* var_dump($_POST['permisos']['seleccionados']);
        die; */
      $model->permisos = CJSON::encode(array_keys($_POST['permisos']['seleccionados']));
      if ($model->save()) {
        $this->redirect(array('view', 'id' => $model->id));
      }
    }
    $criteria = new CDbCriteria();
    $criteria->order = "controller";
    $permisos = Permisos::model()->findAll($criteria);
    //$permisos= CHtml::listData($permisos, 'id', 'nombre');
    $this->render('permisos', array(
      'model' => $model,
      'permisos' => $permisos,
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new Usuario;
    $resultado = Rol::model()->findAll(array('condition' => 'id>1'));
    $roles = CHtml::listData($resultado, 'id', 'nombre');
    $tipos = TipoUsuario::model()->findAll(array('condition' => 'id>2'));
    $tipos = CHtml::listData($tipos, 'id', 'nombre');

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Usuario'])) {
      $model->attributes = $_POST['Usuario'];
      $model->id_rol = 2;

      if (!empty($model->password)) {
        $model->salt = md5(time());
        $model->password = crypt($model->password, $model->salt);
      }

      if ($model->id_rol == "") {
        $model->validate();
      } else {
        $rolPermiso = Rol::model()->findByPk($model->id_rol);
        $model->permisos = $rolPermiso->permisos;

        if ($model->save()) {
          Yii::app()->user->setFlash('success', "Sus datos se guardaron con éxito!");
          $this->redirect(array('datosGenerales/informacionGeneral', "id" => $model->id));
        }
      }
    }

    $this->render('create', array(
      'model' => $model,
      'roles' => $roles,
      'tipos' => $tipos,
    ));
  }

  public function actionInformacionGeneral($id) {

    $resultado = Rol::model()->findAll(array('condition' => 'id>1'));
    $roles = CHtml::listData($resultado, 'id', 'nombre');
    $tipos = TipoUsuario::model()->findAll(array('condition' => 'id>1 and id<>5'));
    $tipos = CHtml::listData($tipos, 'id', 'nombre');
    $model = Usuario::model()->find("id_usuario=:id_usuario", array(":id_usuario" => $id));

    if (isset($id) && !empty($model)) {
      $password_old = $model->password;
      if (isset($_POST['Usuario'])) {
        $model->attributes = $_POST['Usuario'];
        $model->id_rol = 3;
        if (!empty($model->password)) {
          $model->salt = md5(time());
          $model->password = crypt($model->password, $model->salt);
        } else {
          $model->password = $password_old;
        }
        if (!empty($model->id_rol) && $model->id_rol == 2) {
          $model->permisos = "[12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]";
          $model->id_tipo = 5;
        }
        if (!empty($model->id_rol) && $model->id_rol == 3) {
          if (!empty($model->id_tipo) && $model->id_tipo == 4)
            $model->permisos = "[12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]";
        }
        if ($model->save()) {
          Yii::app()->user->setFlash('success', "Los datos han sido guardados.");
          $this->redirect(array('datosGenerales/informacionGeneral', "id" => $model->id));
        }
      }
    } else {
      $model = new Usuario;
      if (isset($_POST['Usuario'])) {
        $model->attributes = $_POST['Usuario'];
        $model->id_rol = 3;

        if (!empty($model->password)) {
          $model->salt = md5(time());
          $model->password = crypt($model->password, $model->salt);
        }
        if (!empty($model->id_rol) && $model->id_rol == 2) {
          $model->permisos = "[12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]";
          $model->id_tipo = 5;
        }

        if (!empty($model->id_rol) && $model->id_rol == 3) {
          if (!empty($model->id_tipo) && $model->id_tipo == 4)
            $model->permisos = "[12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]";
        }
        if ($model->save()) {
          Yii::app()->user->setFlash('success', "Los datos han sido guardados.");
          $this->redirect(array('datosGenerales/informacionGeneral', "id" => $model->id));
        }
      }
    }
    $this->render('_form', array(
      'model' => $model,
      'roles' => $roles,
      'tipos' => $tipos,
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);
    //Yii::app()->user->registro_estudiante = $id;
    $password_old = $model->password;
    $resultado = Rol::model()->findAll(array('condition' => 'id>1'));
    $roles = CHtml::listData($resultado, 'id', 'nombre');
    $tipos = TipoUsuario::model()->findAll(array('condition' => 'id_tipo>1'));
    $tipos = CHtml::listData($tipos, 'id_tipo', 'nombre');

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Usuario'])) {
      $model->attributes = $_POST['Usuario'];
      if (!empty($model->password)) {
        $model->salt = md5(time());
        $model->password = crypt($model->password, $model->salt);
      } else {
        $model->password = $password_old;
      }
      if (!empty($model->id_rol) && $model->id_rol == 2) {
        $model->permisos = "[40,14,15,16,17,18,18,20,21,22,23,24,25,26,27,28,29,30,31,32]";
        $model->id_tipo = 5;
      }
      if (!empty($model->id_rol) && $model->id_rol == 3) {
        if (!empty($model->id_tipo) && $model->id_tipo == 4)
          $model->permisos = "[40,14,15,16,17,18,18,20,21,22,23,24,25,26,27,28,29,30,31]";
      }

      if ($model->save()) {
        //$this->redirect(array('index'));
        //Yii::app()->user->registro_estudiante = $id;
      }
    }

    $this->render('update', array(
      'model' => $model,
      'roles' => $roles,
      'tipos' => $tipos,
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

    $model = Usuario::model()->with("datos_generales")->findAll(array('condition' => 'id_rol=3'));
    
    $roles = Rol::model()->findAll();
    $tipos = TipoUsuario::model()->findAll();
    
    $roles = CHtml::listData($roles, 'id', 'nombre');
    $tipos = CHtml::listData($tipos, 'id', 'nombre');

    $this->layout="//layouts/column1";
    $this->render('index', array(
      'model' => $model,
      'roles' => $roles,
      'tipos' => $tipos,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Usuario('search');
    $model->unsetAttributes();  // clear any default values
    if (isset($_GET['Usuario']))
      $model->attributes = $_GET['Usuario'];

    $this->render('admin', array(
      'model' => $model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return Usuario the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Usuario::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param Usuario $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
