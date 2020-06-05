<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $registro = Usuario::model()->findByAttributes(array('login' => $this->username));

        if ($registro === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($registro->password === crypt($this->password, $registro->salt)) {//
            $this->setState('id_usuario', $registro->id);
            $this->setState('id_rol', $registro->id_rol);
            $this->setState('id_tipo', $registro->id_tipo);
            $this->errorCode = self::ERROR_NONE;
        } else {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        return !$this->errorCode;
    }

}