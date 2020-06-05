<?php

class UsuarioController extends Controller {
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
      $model->permisos = CJSON::encode(array_keys($_POST['permisos']['seleccionados']));
      if ($model->save()) {
        Yii::app()->user->setFlash('success', "Sus datos se guardaron con éxito!");
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
    $criteria = new CDbCriteria();
    $criteria->addCondition("id <> :id");
    //$criteria->params = array(':id' => 8);
    $criteria->order = 'id ASC';

    $roles = Rol::model()->findAll(); // Rol::model()->findAll($criteria);


    $roles = CHtml::listData($roles, 'id', 'nombre');

    $tipo = TipoUsuario::model()->findAll();
    $listaTipoUsuario = CHtml::listData($tipo, 'id', 'nombre');

    if (isset($_POST['Usuario'])) {
      $model->attributes = $_POST['Usuario'];


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
          $this->redirect(array('index'));
        }
      }
    }

    $this->render('create', array(
    'model' => $model,
    'roles' => $roles,
    'listaTipoUsuario' => $listaTipoUsuario
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);
    $password_old = $model->password;
    

    $criteria = new CDbCriteria();
    $criteria->addCondition("id <> :id");
    $criteria->params = array(':id' => 8);
    $criteria->order = 'id ASC';
    $roles = Rol::model()->findAll($criteria);


    $roles = CHtml::listData($roles, 'id', 'nombre');

    $tipo = TipoUsuario::model()->findAll();
    $listaTipoUsuario = CHtml::listData ( $tipo, 'id', 'nombre' );

    if (isset($_POST['Usuario'])) {
      $model->attributes = $_POST['Usuario'];
      if (!empty($model->password)) {
        $model->salt = md5(time());
        $model->password = crypt($model->password, $model->salt);
      } else {
        $model->password = $password_old;
      }

      if ($model->save()) {
        Yii::app()->user->setFlash('success', "Sus datos se guardaron con éxito!");
        $this->redirect(array('view', 'id' => $model->id));
      }
    }

    $this->render('update', array(
      'model' => $model,
      'roles' => $roles,
      'listaTipoUsuario' => $listaTipoUsuario,
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
    
    if (Yii::app()->user->id_usuario == 1) {
      $model = Usuario::model()->findAll();
    } else {
      $criteria = new CDbCriteria();
      $criteria->addCondition("id <> :id");
      $criteria->params = array(':id' => 1);
      $model = Usuario::model()->findAll($criteria);
    }
    
    $subMenu = PermisosController::actionGetSubMenu('Usuario');

    $permiso = PermisosController::actionGetPermisos('usuario', Yii::app()->user->id_usuario);

    $roles = Rol::model()->findAll();
    $roles = CHtml::listData($roles, 'id', 'nombre');

    $this->render('index', array(
      'model' => $model,
      'roles' => $roles,
      'subMenu' => $subMenu,
      'permiso' => $permiso,
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
