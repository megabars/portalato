<?php
/** @var $this AdminController */
/** @var $model Staff */

$this->breadcrumbs = array(
    'Кадровая политика' => $this->createUrl('/staff/back/index'),
    'Список статусов',
);
?>

<div class="page-header">
    <h2>Список статусов</h2>
</div>

<div class="list-group">
    <a class="btn btn-warning icon icon-trash remove-all" href="<?php echo $this->createUrl('/staff/state/deleteAll'); ?>">
        Удаление
    </a>
    <a class="btn btn-sm icons white add-new fr" href="<?php echo $this->createUrl('/staff/state/create'); ?>">
        Создать запись
    </a>
</div>

<?php
$this->widget('application.widgets.adminGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'enablePagination' => true,
    'enableSorting' => true,
    'summaryText' => '',
    'template' => "{summary}{items}{pager}",
    'columns' => array(
        array(
            'class' => 'StyledCheckBoxColumn',
            'selectableRows' => 2,
            'checkBoxHtmlOptions' => array('class' => 'checkbox-id', 'name' => 'ids[]'),
        ),
        array(
            'name' => 'title',
            'sortable' => true,
        ),
        array(
            'header' => '',
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));