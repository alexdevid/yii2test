<?php
namespace app\controllers;

use app\model\AgencyNetwork;
use Yii;
use app\model\SqlForm;
use yii\base\Model;
use yii\web\Controller;
use yii\web\UploadedFile;

class SecondController extends Controller {

    public function actionIndex() {
        $form = new SqlForm();
        if (Yii::$app->request->isPost) {
            $form->load(Yii::$app->request->post());
            $form->file = UploadedFile::getInstance($form, 'file');
            if ($form->validate()) {
                $form->dump();
                $modelName = 'app\model\\' . $form->tableName;
                $model = new $modelName;
                Yii::$app->db->createCommand()->batchInsert($model->tableName(), $model->attributes(), $form->data)->execute();
            }
        }
        return $this->render('index', [
            'model' => $form
        ]);
    }

}
