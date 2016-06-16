<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <?php if (empty($model->data)) {
                    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
                    echo $form->field($model, 'file')->fileInput();
                    echo Html::button('Parse', ['class' => 'btn btn-default', 'type' => 'submit']);
                    ActiveForm::end();
                } else {
                    echo Html::beginTag('pre');
                    print_r($model->data);
                    echo Html::endTag('pre');
                }
                ?>
            </div>
        </div>
    </div>
</div>
