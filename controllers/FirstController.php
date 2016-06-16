<?php
namespace app\controllers;

use app\model\DataForm;
use Yii;
use yii\web\Controller;

class FirstController extends Controller {

    public function actionIndex() {
        $model = new DataForm();
        if (Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if($model->validate()) {
                var_dump($model->getResult());
            }
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

}
