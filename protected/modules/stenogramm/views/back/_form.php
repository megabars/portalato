<?php
/* @var $this AdminController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form" ng-controller="FormCtrl">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'stenogramm-form',
    'enableAjaxValidation' => false,
)); ?>
<div class="form-left">
<!--    <a href="" class="fr link">Показать страницу</a>-->
    <h1>Создание стенограммы</h1>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <!-- <?php echo $form->labelEx($model, 'title'); ?> -->
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'placeholder' => $model->getAttributeLabel('title'))); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>


    <div role="tabpanel" class="tabs">

        <ul class="nav-tabs" role="tablist">
            <li class="active"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab" class="active">Содержимое</a></li>
            <li><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">SEO</a></li>
        </ul>

        <div class="tab-content">
            <!-- Содержимое -->
            <div role="tabpanel" class="tab-pane active" id="tab-1">

<!--                <div class="row">-->
<!--                    --><?php //echo $form->labelEx($model, 'type'); ?>
<!--                    --><?php //echo $form->dropDownList($model, 'type',  CHtml::listData(NewsType::model()->findAll(),'id','title'),array('empty'=>array('Все новости'))); ?>
<!--                    --><?php //echo $form->error($model, 'type'); ?>
<!--                </div>-->

<!--                <div class="row">-->
<!--                    --><?php //echo $form->labelEx($model, 'photo_title'); ?>
<!--                    --><?php //echo $form->textField($model, 'photo_title', array('size' => 60, 'maxlength' => 255)); ?>
<!--                    --><?php //echo $form->error($model, 'photo_title'); ?>
<!--                </div>-->

                <div class="row">
                    <?php echo $form->labelEx($model, 'preview'); ?>
                    <?php echo $form->textArea($model, 'preview', array('rows' => 6, 'cols' => 50)); ?>
                    <?php echo $form->error($model, 'preview'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'description'); ?>
                    <?php $this->widget('application.extensions.eckeditor.ECKEditor', array('model' => $model, 'attribute' => 'description')); ?>
                    <?php echo $form->error($model, 'description'); ?>
                </div>
            </div>

            <!-- SEO -->
            <div role="tabpanel" class="tab-pane" id="tab-2">
                <div class="form">
                    <div class="row">
                        <?php echo $form->labelEx($model->url,'title'); ?>
                        <?php echo $form->textField($model->url,'title',array('size'=>60,'maxlength'=>255)); ?>
                        <?php echo $form->error($model->url,'title'); ?>
                    </div>

                    <div class="row">
                        <?php echo $form->labelEx($model->url,'url'); ?>
                        <?php echo $form->textField($model->url,'url',array('size'=>60,'maxlength'=>255)); ?>
                        <?php echo $form->error($model->url,'url'); ?>
                    </div>

                    <div class="row">
                        <?php echo $form->labelEx($model->url,'meta_description'); ?>
                        <?php echo $form->textArea($model->url,'meta_description',array('rows'=>6, 'cols'=>50)); ?>
                        <?php echo $form->error($model->url,'meta_description'); ?>
                    </div>

                    <div class="row">
                        <?php echo $form->labelEx($model->url,'meta_keywods'); ?>
                        <?php echo $form->textArea($model->url,'meta_keywods',array('rows'=>6, 'cols'=>50)); ?>
                        <?php echo $form->error($model->url,'meta_keywods'); ?>
                    </div>

                </div>

                <div class="seo-info">
                    <h3>Описание для полей</h3>
                    <p><b>Заголовок страницы</b> - отображается в названии окна или вкладки браузера. Также содержание title отображается в выдаче поисковых систем по запросам пользователей</p>
                    <p><b>Адрес</b> - это индивидуальный адрес страницы портала, по которому мы можем найти нужную страницу.</p>
                    <p><b>Описание страницы (Meta Description)</b> - используется поисковыми системами для индексации, а также при создании аннотации в выдаче по запросу. При отсутствии тега поисковые системы выдают в аннотации первую строку документа или отрывок, содержащий ключевые слова.</p>
                    <p><b>Ключевые слова (Meta Keywods)</b> - используется поисковыми системами чтобы определить релевантность ссылки. Необходимо использовать только те слова, которые содержатся в самом документе. Рекомендованное количество слов в данном теге — не более десяти.</p>
                    <p>Пример ввода: природа, животные, субботник</p>
                </div>

            </div>

        </div>

    </div>

    <!--        <div class="row">-->
    <!--            --><?php //echo $form->labelEx($model, 'author'); ?>
    <!--            --><?php //echo $form->textField($model, 'author', array('size' => 60, 'maxlength' => 255)); ?>
    <!--            --><?php //echo $form->error($model, 'author'); ?>
    <!--        </div>-->

</div>

<div class="form-right">
    <div class="form-buttons">
        <button type="submit" class="btn icon icon-ok">Сохранить</button>
        <a href="" class="btn btn-warning icon icon-remove">Удалить</a>
    </div>

    <h3>Свойства</h3>

    <div class="row">
        <label>Статус публикации:</label>
        <div class="radio-list">
            <?php echo $form->radioButtonList($model,'state',array(
                1 => 'Опубликовано',
                0 => 'Черновик',
                2 => 'Запланированно на',
            )); ?>

            <div class="timepicker">
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model,
                    'attribute' => 'date',
                    'options'=>array(
                        'dateFormat' => 'dd.mm.yy',
                        'timeFormat' => 'hh:mm',
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'date'); ?>
            </div>
        </div>
    </div>

    <!--             <div class="row">
                <?php echo $form->labelEx($model, 'state', array('style' => 'display: inline;')); ?>
                &nbsp;
                <?php echo $form->checkBox($model, 'state'); ?>
                <?php echo $form->error($model, 'state'); ?>
            </div> -->

<!--    <div class="row">-->
<!--        <label>Виджеты:</label>-->
<!--        <div class="checkbox-list">-->
<!--            --><?php //echo $form->checkBox($model, 'social'); ?>
<!--            --><?php //echo $form->labelEx($model, 'social', array('style' => 'display: inline;')); ?>
<!--            --><?php //echo $form->error($model, 'social'); ?>
<!--        </div>-->
<!--    </div>-->

<!--    <h3>Миниатюра</h3>-->
<!--    <div class="row">-->
<!--        <!-- --><?php //echo $form->labelEx($model, 'photo'); ?><!-- -->
<!--        --><?php //$this->widget('FileUpload', array('model' => $model, 'attribute' => 'photo')); ?>
<!--        --><?php //echo $form->error($model, 'photo'); ?>
<!--    </div>-->
</div>
<?php $this->endWidget(); ?>
</div>