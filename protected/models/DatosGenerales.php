<?php

/**
 * This is the model class for table "datos_generales".
 *
 * The followings are the available columns in table 'datos_generales':
 * @property integer $id
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $sexo
 * @property string $fecha_nacimiento
 * @property integer $edad
 * @property string $foto_perfil
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 */
class DatosGenerales extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'datos_generales';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('id_usuario, nombre, apellido_paterno, sexo, edad', 'required'),
      array('id_usuario, edad', 'numerical', 'integerOnly' => true),
      array('nombre, apellido_paterno, apellido_materno', 'length', 'max' => 255),
      array('sexo', 'length', 'max' => 1),
      array('foto_perfil', 'file', 'types' => 'jpg, gif, png',
        'safe' => false,
        'allowEmpty' => true,
        'maxSize' => 1024 * 1024 * 10, // 10MB                
        'tooLarge' => 'Solo se permiten archivos JPG y PNG menores a 10 MB. Por favor, revisa tu archivo.'),
      array('fecha_nacimiento', 'date', 'format' => 'yyyy-M-d', 'allowEmpty' => true),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id, id_usuario, nombre, apellido_paterno, apellido_materno, sexo, fecha_nacimiento', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id' => 'ID',
      'id_usuario' => 'Id Usuario',
      'nombre' => 'Nombre',
      'apellido_paterno' => 'Apellido Paterno',
      'apellido_materno' => 'Apellido Materno',
      'sexo' => 'Sexo',
      'fecha_nacimiento' => 'Fecha Nacimiento',
      'edad' => 'Edad',
      'foto_perfil' => 'Foto Perfil',
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
    $criteria->compare('id_usuario', $this->id_usuario);
    $criteria->compare('nombre', $this->nombre, true);
    $criteria->compare('apellido_paterno', $this->apellido_paterno, true);
    $criteria->compare('apellido_materno', $this->apellido_materno, true);
    $criteria->compare('sexo', $this->sexo, true);
    $criteria->compare('fecha_nacimiento', $this->fecha_nacimiento, true);
    $criteria->compare('edad', $this->edad);
    $criteria->compare('foto_perfil', $this->foto_perfil, true);

    return new CActiveDataProvider($this, array(
      'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return DatosGenerales the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

}
