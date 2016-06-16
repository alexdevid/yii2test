<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-sm-4">
                <?php
                $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
                echo $form->field($model, 'tableName')->dropDownList(array_combine($model->tables, $model->tables));
                echo $form->field($model, 'file')->fileInput();
                echo Html::button('Parse', ['class' => 'btn btn-default', 'type' => 'submit']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
