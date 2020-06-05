<?php

/**
 * This is the model class for table "permisos".
 *
 * The followings are the available columns in table 'permisos':
 * @property integer $id
 * @property string $nombre
 * @property string $controller
 * @property string $action
 * @property string $url
 * @property integer $esmenu
 * @property string $grupo
 * @property string $icon
 * @property string $color
 * @property integer $activo
 * @property integer $orden
 * @property integer $essubmenu
 * @property string $titulo
 * @property string $subtitulo
 */
class Permisos extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'permisos';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('nombre, controller, action, url', 'required'),
      array('esmenu, activo, orden, essubmenu', 'numerical', 'integerOnly' => true),
      array('nombre, controller, action, url, icon', 'length', 'max' => 100),
      array('grupo', 'length', 'max' => 50),
      array('color', 'length', 'max' => 200),
      array('titulo', 'length', 'max' => 11),
      array('subtitulo', 'length', 'max' => 25),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id, nombre, controller, action, url, esmenu, grupo, icon, color, activo, orden, essubmenu, titulo, subtitulo', 'safe', 'on' => 'search'),
    );
  }

  protected function afterSave() {
    parent::afterSave();
    $id_Permiso = $this->id;
    
    $Usuario = Usuario::model()->findByPk(1);
      
      if (!empty($Usuario)) {
        $permisosUsuario = CJSON::decode($Usuario->permisos);
        array_push($permisosUsuario, $id_Permiso);
        $Usuario->permisos = CJSON::encode($permisosUsuario);
        if($Usuario->save()){
          
        }
      }
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id' => 'ID',
      'nombre' => 'Nombre',
      'controller' => 'Controller',
      'action' => 'Action',
      'url' => 'Url',
      'esmenu' => 'Esmenu',
      'grupo' => 'Grupo',
      'icon' => 'Icon',
      'color' => 'Color',
      'activo' => 'Activo',
      'orden' => 'Orden',
      'essubmenu' => 'Essubmenu',
      'titulo' => 'Titulo',
      'subtitulo' => 'Subtitulo',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   *
   * Typical usecase:
   * - Initialize the model fields with values from filter form.
   * - Execute this method to get CActiveDataProvider instance which will filter
   * models according to data in model fields.
   * - Pass data provider to CGridView, CListView or any similar widget.
   *
   * @return CActiveDataProvider the data provider that can return the models
   * based on the search/filter conditions.
   */
  public function search() {
    // @todo Please modify the following code to remove attributes that should not be searched.

    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('nombre', $this->nombre, true);
    $criteria->compare('controller', $this->controller, true);
    $criteria->compare('action', $this->action, true);
    $criteria->compare('url', $this->url, true);
    $criteria->compare('esmenu', $this->esmenu);
    $criteria->compare('grupo', $this->grupo, true);
    $criteria->compare('icon', $this->icon, true);
    $criteria->compare('color', $this->color, true);
    $criteria->compare('activo', $this->activo);
    $criteria->compare('orden', $this->orden);
    $criteria->compare('essubmenu', $this->essubmenu);
    $criteria->compare('titulo', $this->titulo, true);
    $criteria->compare('subtitulo', $this->subtitulo, true);

    return new CActiveDataProvider($this, array(
      'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Permisos the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

}
