<?php
$this->widget('application.widgets.adminGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'ajaxUrl' => '/appeal/schedule',
    'id' => 'schedule-grid',
    'enableSorting' => true,
    'enablePagination' => true,
    'summaryText' => '',
    'ajaxUpdate' => true,
    'template' => "{items}{pager}",
    'columns' => array(
        array(
            'class' => 'StyledCheckBoxColumn',
            'selectableRows' => 2,
            'checkBoxHtmlOptions' => array('class' => 'checkbox-id', 'name' => 'ids[]'),
        ),
        array(
            'header' => 'Должность', // @todo Реализовать поиск
            'value' => '@$data->people->job',
            'filter' => false,
            'sortable' => false,
        ),
        array(
            'header' => 'Фамилия Имя Отчество',
            'value' => '@$data->people->full_name',
            'filter' => false,
            'sortable' => false,
        ),
        array(
            'name' => 'date',
            'value' => 'date("Y-m-d", strtotime($data->date))',
            'filter' => false,
            'sortable' => false,
        ),
        array(
            'header' => '',
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("/appeal/schedule/delete", array("id" => $data->id))',
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("/appeal/schedule/save", array("id" => $data->id))',
                    'options'=>array(
                        'class' => 'update',
                        'onclick' => 'return false;',
                    )
                ),
            ),
        ),
    ),
));