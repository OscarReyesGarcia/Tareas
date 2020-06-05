<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <?php if(isset($this->title) and !is_null($this->title)):?>
      <h1><?php echo $this->title ?></h1>
    <?php endif; ?>

      <?php if ( isset( $this->breadcrumbs ) ): ?>
        
        <?php
          $home = CController::createUrl("site/index");
          $this->widget('zii.widgets.CBreadcrumbs',
          array(
            'links' =>$this->breadcrumbs,
            'tagName' =>'ol', // container tag
            'htmlOptions' =>array('class'=>'breadcrumb'), // no attributes on container
            'separator' =>' ', // no separator
            'homeLink' =>'<li>'.CHtml::link('<i class="fa fa-home"></i>', Yii::app()->homeUrl).'</li>', // home link template
            'activeLinkTemplate' =>'<li><a href="{url}">{label}</a></li>', // active link template
            'inactiveLinkTemplate' =>'<li class="active"><a href="javascript:void(0);">{label}</a></li>', // in-active link template
          ));
        ?><!-- breadcrumbs -->
        
        <?php endif ?>
        
    </section>
    
    
    <?php echo $content; ?>
    <!-- /.content -->
    <div style="clear: both"></div>
</div>
<!-- content -->
<?php $this->endContent(); ?>