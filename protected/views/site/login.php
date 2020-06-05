<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<div class="form-group has-feedback">
    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder'=>'Correo')); ?>
    <?php echo $form->error($model, 'username'); ?>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>

<div class="form-group has-feedback">
    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder'=>'Contraseña')); ?>
    <?php echo $form->error($model, 'password'); ?>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>

<div class="row">
    <div class="col-xs-8">
        <div class="checkbox icheck">
            <label>
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'rememberMe'); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
            </label>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">

        <?php
        # echo CHtml::submitButton('Login'); 
        echo CHtml::submitButton('Iniciar', array('class' => 'btn btn-primary btn-block btn-flat'));
        ?>

    </div>
    <!-- /.col -->
</div>



<?php $this->endWidget(); ?>
