<?php

class DataSelects extends CApplicationComponent {

  public function getEstadoAlerta() {
    $estadoAlerta = array(
      'Reportado' => 'Reportado',
      'Enviado_a_tecnicos' => 'Enviado a tecnicos',
      'Atendiendo' => 'Atendiendo',
      'Reparado' => 'Reparado'
    );

    return $estadoAlerta;
  }

  public function getColor() {
    $color = array(
      'nav-block-orange' => 'Naranja',
      'nav-block-yellow' => 'Amarillo',
      'nav-block-blue' => 'Azul',
      'nav-block-green' => 'Verde',
      'nav-block-red' => 'Rojo',
      'nav-block-purple' => 'Púrpura',
      'nav-block-grey' => 'Gris',
      'nav-light-blue' => 'Azul claro',
      'nav-light-green' => 'Verde claro',
      'nav-light-purple' => 'Púrpura claro',
      'nav-light-yellow' => 'Amarillo claro',
      'nav-light-brown' => 'Cafe claro',
      'nav-deep-terques' => 'Turquesa oscuro',
      'nav-deep-gray' => 'Gris oscuro',
      'nav-deep-red' => 'Rojo oscuro',
      'nav-olive' => 'Aceituna',
      'nav-deep-thistle' => 'Cardo'
    );

    return $color;
  }

  public function getDividirMenu() {
    $seccion = array(
      4,
      7,
      14,
      17,
      24,
      27,
      34,
      37,
      44,
      47,
      54,
      57,
      64,
      67,
      74,
      77,
      84,
      87,
      94,
      97,
      104,
      107,
      114,
      117,
      124,
      127,
      134,
      137,
      144,
      147,
      154,
      157,
      164,
      167,
      174,
      177,
      184,
      187,
      194,
      197
    );

    return $seccion;
  }

  public function getTipoDispositivo() {
    $tipoDispositivo = array(
      '1' => 'Farola',
      '2' => 'Dispositivo'
    );

    return $tipoDispositivo;
  }

  public function getHusoHorario() {
    $utc = array(
      'UTC−12:00' => 'UTC−12:00',
      'UTC−11:00' => 'UTC−11:00',
      'UTC−10:00' => 'UTC−10:00',
      'UTC−09:30' => 'UTC−09:30',
      'UTC−09:00' => 'UTC−09:00',
      'UTC−08:00' => 'UTC−08:00',
      'UTC−07:00' => 'UTC−07:00',
      'UTC−06:00' => 'UTC−06:00',
      'UTC−05:00' => 'UTC−05:00',
      'UTC−04:00' => 'UTC−04:00',
      'UTC−03:30' => 'UTC−03:30',
      'UTC−03:00' => 'UTC−03:00',
      'UTC−02:00' => 'UTC−02:00',
      'UTC−01:00' => 'UTC−01:00',
      'UTC±00:00' => 'UTC±00:00',
      'UTC+01:00' => 'UTC+01:00',
      'UTC+02:00' => 'UTC+02:00',
      'UTC+03:00' => 'UTC+03:00',
      'UTC+03:30' => 'UTC+03:30',
      'UTC+04:00' => 'UTC+04:00',
      'UTC+04:30' => 'UTC+04:30',
      'UTC+05:00' => 'UTC+05:00',
      'UTC+05:30' => 'UTC+05:30',
      'UTC+05:45' => 'UTC+05:45',
      'UTC+06:00' => 'UTC+06:00',
      'UTC+06:30' => 'UTC+06:30',
      'UTC+07:00' => 'UTC+07:00',
      'UTC+08:00' => 'UTC+08:00',
      'UTC+08:30' => 'UTC+08:30',
      'UTC+08:45' => 'UTC+08:45',
      'UTC+09:00' => 'UTC+09:00',
      'UTC+09:30' => 'UTC+09:30',
      'UTC+10:00' => 'UTC+10:00',
      'UTC+10:30' => 'UTC+10:30',
      'UTC+11:00' => 'UTC+11:00',
      'UTC+12:00' => 'UTC+12:00',
      'UTC+12:45' => 'UTC+12:45',
      'UTC+13:00' => 'UTC+13:00',
      'UTC+14:00' => 'UTC+14:00');
    return $utc;
  }

  public function getTipoDocumento() {
    return array(
      1 => 'Excel',
      2 => 'PDF'
    );
  }

  public function getSexo() {

    $sexo = array();
    $sexo['H'] = 'Hombre';
    $sexo['M'] = 'Mujer';

    return $sexo;
  }
  
  public function getRespuesta() {

    $respuesta = array();
    $respuesta[0] = 'No';
    $respuesta[1] = 'Sí';

    return $respuesta;
  }

  public function getEstadoCivil() {
    $estado_civil = array();
    $estado_civil['casado'] = 'Casado';
    $estado_civil['divorciado'] = 'Divorciado';
    $estado_civil['soltero'] = 'Soltero';
    $estado_civil['libre'] = 'Unión Libre';
    $estado_civil['viudo'] = 'Viudo';
    $estado_civil['otro'] = 'Otro';
    return $estado_civil;
  }
  
  public function getFamiliar(){
    $familiar = array();
    $familiar['Padre'] = 'Padre';
    $familiar['Madre'] = 'Madre';
    $familiar['Hermano'] = 'Hermano';
    $familiar['Hermana'] = 'Hermana';
    $familiar['tip paterno'] = 'Tio Paterno';
    $familiar['tia paterno'] = 'Tia Paterno';
    $familiar['tio materno'] = 'Tio materno';
    $familiar['tia materna'] = 'Tia materno';
    $familiar['abuelo paterno'] = 'Abuelo Paterno';
    $familiar['abuela paterno'] = 'Abuela Materna';
    $familiar['abuelo materna'] = 'Abuelo Paterno';
    $familiar['abuela materna'] = 'Abuela Materna';
    $familiar['no definido'] = 'No definido';
    
    return $familiar;
  }
  
  public function getDocumento(){
    $tipoTocumento = array();
    $tipoDocumento['dieta'] = 'Dieta';
    $tipoDocumento['rutina'] = 'Rutina';
    
    return $tipoDocumento;
  }

}

?>