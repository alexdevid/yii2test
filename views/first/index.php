<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php if (empty($model->data) && !$model->hasErrors()): ?>
                <?php $form = ActiveForm::begin() ?>
                <div class="col-sm-4 col-md-offset-2">
                    <?php if (!empty($model->data)) {
                        foreach ($model->data as $key => $input) {
                            echo $form->field($model, 'data[' . $key . ']')->textInput(['type' => 'number', 'min' => '-1000', 'max' => '1000', 'data-id' => $key])->label(false);
                        }
                    } else {
                        foreach ([0, 1, 2] as $key) {
                            echo $form->field($model, 'data[' . $key . ']')->textInput(['type' => 'number', 'min' => '-1000', 'max' => '1000', 'data-id' => $key])->label(false);
                        }
                    }
                    ?>
                    <a class="btn btn-default add-more">Добавить еще </a>
                    <button type="submit" class="btn btn-success pull-right">Сохранить</button>
                </div>
                <div class="col-sm-4">
                    <?= $form->errorSummary($model); ?>
                </div>
                <?php ActiveForm::end() ?>
            <?php else: ?>
                <p class="alert alert-success">
                    Result: <?= $model->getResult(); ?>
                </p>
            <?php endif ?>
        </div>
    </div>
</div>
