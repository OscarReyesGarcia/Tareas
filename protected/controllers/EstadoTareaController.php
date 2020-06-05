<?php

class EstadoTareaController extends Controller {
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new EstadoTarea;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EstadoTarea'])) {
            $model->attributes = $_POST['EstadoTarea'];
            if ($model->save()){
                Yii::app()->user->setFlash('success', "Sus datos se guardaron con éxito!");
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
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EstadoTarea'])) {
            $model->attributes = $_POST['EstadoTarea'];
            if ($model->save()){
                Yii::app()->user->setFlash('success', "Sus datos se guardaron con éxito!");
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
      public function actionBorrar($id) {
        if ($this->loadModel($id)->delete()) {
          Yii::app()->user->setFlash('success', "Se ha borrado con éxito.");      
          $this->redirect(array('index'));
        }
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
        $model = EstadoTarea::model()->findAll();
        
        $subMenu = PermisosController::actionGetSubMenu('EstadoTarea');

        $permiso = PermisosController::actionGetPermisos('estadoTarea', Yii::app()->user->id_usuario);

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
        $model = new EstadoTarea('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EstadoTarea']))
            $model->attributes = $_GET['EstadoTarea'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EstadoTarea the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EstadoTarea::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param EstadoTarea $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'estado-tarea-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
