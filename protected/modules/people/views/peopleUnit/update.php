<?php
$this->breadcrumbs['Подразделения'] = '/people/peopleUnit/index/people_id/'.@$this->people->id;
$this->breadcrumbs[] = 'Редактирование';
?>

<div class="page-header">
    <h2>Редактирование</h2>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model));