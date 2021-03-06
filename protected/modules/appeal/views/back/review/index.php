<?php
/** @var $record Appeal */
/** @var $this Controller */


$this->pageTitle = 'График приема граждан';

$this->breadcrumbs = array(
    'Обращения граждан' => '/appeal/back',
    $this->pageTitle
);
?>

    <h3><?php echo $this->pageTitle; ?> <a class="btn btn-sm icons white add-new fr" href="<?php echo $this->createUrl('/appeal/back/create', array("subPage"=>"review")); ?>">
            Добавить
        </a></h3>
<?php
$this->widget('application.widgets.adminGridView', array(
    'dataProvider' => $model->search(),
    'enablePagination' => true,
    'enableSorting' => true,
    'template' => "{items}{pager}",
    'columns' => array(
        'year',
        array(
            'header' => 'Действия',
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'url' => 'Yii::app()->createUrl("/appeal/back/update", array("id" => $data->id, "subPage"=>"review"))',
                ),
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("/appeal/back/delete", array("id" => $data->id, "subPage"=>"review"))',
                ),
            ),
        ),
    ),
)); ?>