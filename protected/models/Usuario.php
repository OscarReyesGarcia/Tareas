<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $fecha_registro
 * @property string $login
 * @property string $password
 * @property string $salt
 * @property integer $id_rol
 * @property integer $id_tipo
 * @property string $permisos
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Antecedente[] $antecedentes
 * @property ApoyoSocial[] $apoyoSocials
 * @property Cre[] $cres
 * @property DatosGenerales[] $datosGenerales
 * @property DatosLocalizacion[] $datosLocalizacions
 * @property FotosAvance[] $fotosAvances
 * @property Gmb[] $gmbs
 * @property HabitosAlimentarios[] $habitosAlimentarioses
 * @property HistoriaMedica[] $historiaMedicas
 * @property IntoleranciaAlimentos[] $intoleranciaAlimentoses
 * @property MedidasAntropometricas[] $medidasAntropometricases
 * @property PorcentajeGrasa[] $porcentajeGrasas
 * @property Rol $idRol
 * @property TipoUsuario $idTipo
 */
class Usuario extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'usuario';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('password', 'length', 'min'=>6, 'max'=>40, "message" => "{attribute} minimo 6 y máximo 40 caracteres."),
      array('login, password, salt, id_rol, id_tipo', 'required', "message" => "El campo {attribute} no puede estar vacio."),
      array('id_rol, id_tipo, activo', 'numerical', 'integerOnly' => true),
      array('login, salt', 'length', 'max' => 200),
      
      array('permisos', 'length', 'max' => 500),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id, fecha_registro, login, password, salt, id_rol, id_tipo, permisos, activo', 'safe', 'on' => 'search'),
    );
  }

  public function beforeSave() {
    if ($this->isNewRecord) {
      $this->fecha_registro = new CDbExpression('NOW()');
    }
    return parent::beforeSave();
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'antecedentes' => array(self::HAS_MANY, 'Antecedente', 'id'),
      'apoyoSocials' => array(self::HAS_MANY, 'ApoyoSocial', 'id'),
      'cres' => array(self::HAS_MANY, 'Cre', 'id'),
      'datos_generales' => array(self::HAS_MANY, 'DatosGenerales', 'id'),
      'datos_localizacions' => array(self::HAS_MANY, 'DatosLocalizacion', 'id'),
      'fotosAvances' => array(self::HAS_MANY, 'FotosAvance', 'id'),
      'gmbs' => array(self::HAS_MANY, 'Gmb', 'id'),
      'habitosAlimentarioses' => array(self::HAS_MANY, 'HabitosAlimentarios', 'id_usuaio'),
      'historiaMedicas' => array(self::HAS_MANY, 'HistoriaMedica', 'id'),
      'intoleranciaAlimentoses' => array(self::HAS_MANY, 'IntoleranciaAlimentos', 'id'),
      'medidasAntropometricases' => array(self::HAS_MANY, 'MedidasAntropometricas', 'id'),
      'porcentajeGrasas' => array(self::HAS_MANY, 'PorcentajeGrasa', 'id'),
      'idRol' => array(self::BELONGS_TO, 'Rol', 'id_rol'),
      'idTipo' => array(self::BELONGS_TO, 'TipoUsuario', 'id_tipo'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id' => 'Id Usuario',
      'fecha_registro' => 'Fecha Registro',
      'login' => 'Correo',
      'password' => 'Contraseña',
      'salt' => 'Salt',
      'id_rol' => 'Rol',
      'id_tipo' => 'Tipo de usuario',
      'permisos' => 'Permisos',
      'activo' => 'Activo',
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
    $criteria->compare('fecha_registro', $this->fecha_registro, true);
    $criteria->compare('login', $this->login, true);
    $criteria->compare('password', $this->password, true);
    $criteria->compare('salt', $this->salt, true);
    $criteria->compare('id_rol', $this->id_rol);
    $criteria->compare('id_tipo', $this->id_tipo);
    $criteria->compare('permisos', $this->permisos, true);
    $criteria->compare('activo', $this->activo);

    return new CActiveDataProvider($this, array(
      'criteria' => $criteria,
    ));
  }

  public function purify($value) {
    $p = new CHtmlPurifier();
    $value = str_replace('&amp;', '&', $p->purify($value));
    return strip_tags($value);
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Usuario the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

}
