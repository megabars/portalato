<?php

class PlaceController extends AdminController
{
    public function actionIndex()
    {

        Yii::app()->clientScript->registerCoreScript('yiiactiveform');
        Yii::app()->getClientScript()->registerCoreScript('maskedinput');

        $model = new AppealPlace('search');

        $model->unsetAttributes();

        if (isset($_GET['AppealPlace'])) {
            $model->attributes = $_GET['AppealPlace'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionSave($id=null)
    {
        if($id == null) {
            $model = new AppealPlace;

            if (isset($_POST['AppealPlace'])) {
                $model->setAttributes($_POST['AppealPlace'], false);

                if (!$model->save())
                    throw new CHttpException(500, 'Проект не создан');
            } else {
                $this->getForm($model);
            }
        } else {
            $model = $this->loadModel($id);

            if (isset($_POST['AppealPlace'])){
                $model->setAttributes($_POST['AppealPlace'], false);

                if (!$model->save())
                    throw new CHttpException(500, 'Проект не отредактирован');
            } else { // отдаем заполненную форму
                $this->getForm($model);
            }
        }
    }

    public function actionDelete($id)
    {
        $model = $this->loadModel($id);

        $model->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/appeal/place'));
    }

    public function actionDeleteAll()
    {
        if (isset($_POST['ids']) && is_array($_POST['ids'])) {
            foreach ($_POST['ids'] as $id) {
                $model = $this->loadModel($id);
                $model->delete();
            }
        }
        echo json_encode(true);
    }

    public function loadModel($id)
    {
        $model = AppealPlace::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, 'Данной страницы не существует.');

        return $model;
    }

    protected  function getForm($model) {
        $cs = Yii::app()->getClientScript();

        $cs->scriptMap = array(
            '*.js' => false,
            '*.css' => false
        );

        $this->renderPartial('_form', array('model' => $model), false, true);
    }
}