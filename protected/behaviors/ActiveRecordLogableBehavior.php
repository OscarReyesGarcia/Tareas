<?php

class ActiveRecordLogableBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();
 
    public function afterSave($event)
    {
        if (!$this->Owner->isNewRecord) {
 
            // new attributes
            $newattributes = $this->Owner->getAttributes();
            $oldattributes = $this->getOldAttributes();
 
            // compare old and new

            $changesFields = array();
            foreach ($newattributes as $name => $value) {
                if (!empty($oldattributes)) {
                    $old = $oldattributes[$name];
                } else {
                    $old = '';
                }
 
                if ($value != $old) {
                    
                    $changesFields[] = $name;
                    //$changes = $name . ' ('.$old.') => ('.$value.'), ';
 
                    
                }
            }

            if(count($changesFields) > 0){
                $log=new ActiveRecordLog;
                    $log->description=  'User ' . Yii::app()->user->name 
                                            . ' changed ' . $name . ' for ' 
                                            . get_class($this->Owner) 
                                            . '[' . $this->Owner->getPrimaryKey() .'].';
                    $log->action=       'CHANGE';
                    $log->model=        get_class($this->Owner);
                    $log->idModel=      $this->Owner->getPrimaryKey();
                    $log->field=        json_encode($changesFields);
                    $log->creationdate= new CDbExpression('NOW()');
                    $log->userid=       Yii::app()->user->id_usuario;
                    $log->save();
            }
        } else {
            $log=new ActiveRecordLog;
            $log->description=  'User ' . Yii::app()->user->name 
                                    . ' created ' . get_class($this->Owner) 
                                    . '[' . $this->Owner->getPrimaryKey() .'].';
            $log->action=       'CREATE';
            $log->model=        get_class($this->Owner);
            $log->idModel=      $this->Owner->getPrimaryKey();
            $log->field=        '';
            $log->creationdate= new CDbExpression('NOW()');
            $log->userid=       Yii::app()->user->id_usuario;
            $log->save();
        }
    }
 
    public function afterDelete($event)
    {
        $log=new ActiveRecordLog;
        $log->description=  'User ' . Yii::app()->user->name . ' deleted ' 
                                . get_class($this->Owner) 
                                . '[' . $this->Owner->getPrimaryKey() .'].';
        $log->action=       'DELETE';
        $log->model=        get_class($this->Owner);
        $log->idModel=      $this->Owner->getPrimaryKey();
        $log->field=        '';
        $log->creationdate= new CDbExpression('NOW()');
        $log->userid=       Yii::app()->user->id_usuario;
        $log->save();
    }
 
    public function afterFind($event)
    {
        // Save old values
        $this->setOldAttributes($this->Owner->getAttributes());
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }
}
