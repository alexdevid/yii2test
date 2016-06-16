<?php
namespace app\controllers;

use Yii;
use app\model\UploadForm;
use yii\web\Controller;
use yii\web\UploadedFile;

class ThirdController extends Controller {

    public function actionIndex() {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

}
