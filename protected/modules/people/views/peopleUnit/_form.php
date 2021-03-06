<?php
/* @var $this PeopleUnitController */
/* @var $model PeopleUnit */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'people-unit-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

             <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

            <div class="row">
            <?php echo $form->labelEx($model,'url'); ?>
            <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'url'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'content'); ?>
            <?php $this->widget('application.extensions.eckeditor.ECKEditor', array('model' => $model, 'attribute' => 'content')); ?>
            <?php echo $form->error($model,'content'); ?>
        </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-blue')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->