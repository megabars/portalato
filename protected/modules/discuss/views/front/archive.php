<?php
/**
 * @var $this Controller
 * @var $model Discuss
 * @var $executive Contact
 */
$this->pageTitle = 'Обсуждение законопроектов';

$this->breadcrumbs = array(
    'Открытый Регион',
    'Обсуждение законопроектов' => $this->createUrl('/discuss/front'),
    'Архив'
);

$dataProv = $model->search(array('condition' => 'date_finish < '.time()));

?>

<div class="wrap">
    <h2>Обсуждение законопроектов</h2>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl('/discuss/front/index'),
            'id' => 'search-form',
            'method' => 'get',
        )); ?>
        <div class="grid-search">
            <div class="search-min clearfix">

                <button type="submit" class="btn-default">Искать</button>
                <div>
                    <?php echo $form->textField($model, 'title'); ?>
                </div>

            </div>
        </div>
        <?php $this->endWidget(); ?>

    <h4><?php echo $dataProv->itemCount . ' ' . PluralEndings::getEnding($dataProv->itemCount, 'документ', 'документа', 'документов'); ?></h4>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'docs-form',
        'dataProvider' => $dataProv,
        'cssFile' => FALSE,
        'ajaxUpdate' => TRUE,
        'itemsCssClass' => 'table',
        'template' => '{items}{pager}',
        'columns' => array(
            array(
                'header' => 'Исполнительный орган государственной власти<br/>структурное подразделение Администрации, контакты',
                'name' => 'portal_id',
                'type' => 'raw',
                'value' => function($model) {
                    $executive_name = ($model->executive_id > 0) ? $model->executive->name : "Администрация Томской области";
                    $executive = Contact::model()->findByAttributes(array('executive_id'=>$model->executive_id));

                    echo '<h5><b>'.$executive_name.'</b></h5>';

                    if (isset($executive->address)) {
                        echo '<p>'.$executive->address.'</p>';
                    }

                    if (isset($executive->phone) && is_array($executive->phone)) {
                        echo '<p>Тел: ';
                        foreach($executive->phone as $phone)
                            echo '<a href="tel:'. $phone->value.'">'.$phone->value.'</a>, ';
                        echo '</p>';
                    }

                    if (isset($executive->fax) && is_array($executive->fax)) {
                        echo '<p>Факс: ';
                        foreach($executive->fax as $fax)
                            echo '<a href="tel:'. $fax->value.'">'.$fax->value.'</a>, ';
                        echo '</p>';
                    }

                    if (isset($executive->email) && is_array($executive->email)) {
                        echo '<p>E-mail: ';
                        foreach($executive->email as $email)
                            echo '<a href="mailto:'. $email->value.'">'.$email->value.'</a>, ';
                        echo '</p>';
                    }
                },
            ),
            array(
                'header' => 'Проект нормативного правового акта',
                'name' => 'title',
                'type' => 'raw',
                'value' => 'CHtml::link($data->title, Yii::app()->createUrl("/discuss/front/view", array("id" => $data->id)))',
            ),
            array(
                'header' => 'Срок проведения общественных обсуждений',
                'name' => 'date_start',
                'type' => 'raw',
                'value' =>
                'CHtml::tag("p", array(), "<b>Начало: </b>". date("d-m-Y H:i", $data->date_start)) .
                 CHtml::tag("p", array(), "<b>Окончание: </b>" . date("d-m-Y H:i", $data->date_finish)) .
                 CHtml::tag("p", array(), "<b>Размещено: </b>" . date("d-m-Y H:i", $data->date_publish))',
            ),
        ),
        'pager' => array(
            'header' => '',
            'cssFile' => FALSE,
            'firstPageLabel' => FALSE,
            'prevPageLabel' => '&larr;&nbsp;&nbsp;Предыдущая',
            'nextPageLabel' => 'Следующая&nbsp;&nbsp;&rarr;',
            'lastPageLabel' => FALSE,
        ),
    )); ?>
</div>

