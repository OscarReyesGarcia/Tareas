<?php

class PermisosController extends Controller {
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  //public $layout='//layouts/column2';

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
      array('deny', // deny all users
        'users' => array('*'),
      ),
    );
  }

  /**
   * Displays a particular model.
   * @param integer $id the id of the model to be displayed
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
    $model = new Permisos;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Permisos'])) {
      $model->attributes = $_POST['Permisos'];
      $permisosUsuario = Usuario::model()->findByPk(1);
      
      
      
      if ($model->save()) {
        Yii::app()->user->setFlash('success', "Sus datos han sido guardados.");
        $this->redirect(array('index'));
      }
    }

    $this->render('create', array(
      'model' => $model,
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the id of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Permisos'])) {
      $model->attributes = $_POST['Permisos'];
      if ($model->save()) {
        Yii::app()->user->setFlash('success', "Sus datos han sido guardados.");
        $this->redirect(array('index'));
      }
    }

    $this->render('update', array(
      'model' => $model,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the id of the model to be deleted
   */
  public function actionDelete() {
    $this->loadModel($id)->delete();

    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }

  public function actionBorrar($id) {
    if ($this->loadModel($id)->delete()) {
      Yii::app()->user->setFlash('success', "Su dato han sido borrado.");
      $this->redirect(array('index'));
    }
  }

  /**
   * Lists all models.
   */
  public function actionIndex() {
    $model = Permisos::model()->findAll();
    $usuario_permiso = PermisosController::actionGetPermisos('permisos');
    $subMenu = PermisosController::actionGetSubMenu('Permiso');

    $this->render('index', array(
      'model' => $model,
      'usuario_permiso' => $usuario_permiso,
      'subMenu' => $subMenu,
    ));
  }

  public function actionIconos() {
    $this->render('iconos');
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Permisos('search');
    $model->unsetAttributes();  // clear any default values
    if (isset($_GET['Permisos']))
      $model->attributes = $_GET['Permisos'];

    $this->render('admin', array(
      'model' => $model,
    ));
  }

  public static function actionGetSubMenu($grupo, $id_usuario = null) {
    if (isset($id_usuario) && !is_null($id_usuario)) {
      $id_usuario = $id_usuario;
      $modelUsuario = Usuario::model()->findByPk($id_usuario);
      $criteria = new CDbCriteria();
      $criteria->order = "ORDEN";
      $criteria->addInCondition("id", CJSON::decode($modelUsuario->permisos));
      $criteria->addCondition("GRUPO LIKE '%" . $grupo . "%'");
      $criteria->addCondition("essubmenu=1");
      $criteria->addCondition("activo=1");

      $subMenu = Permisos::model()->findAll($criteria);
    } elseif (isset(Yii::app()->user->id_usuario)) {
      $modelUsuario = Usuario::model()->findByPk(Yii::app()->user->id_usuario);
      $criteria = new CDbCriteria();
      $criteria->order = "ORDEN";
      $criteria->addInCondition("id", CJSON::decode($modelUsuario->permisos));
      $criteria->addCondition("GRUPO LIKE '%" . $grupo . "%'");
      $criteria->addCondition("essubmenu=1");
      $criteria->addCondition("activo=1");

      $subMenu = Permisos::model()->findAll($criteria);
    } else {
      $subMenu = array();
    }
    return $subMenu;
  }

  public static function actionGetPermisos($controller, $id_usuario = null) {
    if (isset($id_usuario) && !is_null($id_usuario)) {
      $id_usuario = $id_usuario;
      $permisos_usuario = Usuario::model()->findByPk($id_usuario)->permisos;


      $criteria = new CDbCriteria();
      $criteria->order = "controller";
      $criteria->addCondition("controller='$controller'");
      $criteria->addInCondition("id", CJSON::decode($permisos_usuario));
      //$criteria->addInCondition("action", array('update', 'borrar'));
      $permisos = Permisos::model()->findAll($criteria);

      $list_permisos = CHtml::listData($permisos, 'id', 'action');
    } elseif (isset(Yii::app()->user->id_usuario)) {
      $permisos_usuario = Usuario::model()->findByPk(Yii::app()->user->id_usuario)->permisos;

      $criteria = new CDbCriteria();
      $criteria->order = "controller";
      $criteria->addCondition("controller='$controller'");
      $criteria->addInCondition("id", CJSON::decode($permisos_usuario));
      //$criteria->addInCondition("action", array('update', 'borrar'));
      $permisos = Permisos::model()->findAll($criteria);
      $list_permisos = CHtml::listData($permisos, 'id', 'action');
    } else {
      $list_permisos = array();
    }


    return $list_permisos;
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the id of the model to be loaded
   * @return Permisos the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Permisos::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param Permisos $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'permisos-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
