<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\Pjax;
use yii\widgets\MaskedInput;


$java = <<<JS


$(document).ajaxStart(function() {
  $("#floatingCirclesG").show();
}).ajaxStop(function() {
  $("#floatingCirclesG").hide();
});

JS;
$this->registerJs($java);

Pjax::begin(['id' => 'pjax-modal-form']);

if (isset($status)) {
    if ($status) {
        echo '<div class="alert alert-success status" role="alert" style="text-align: center">Ваше сообщение успешно отправлено</div>';
    } else {
        echo '<div class="alert alert-danger status" role="alert" style="text-align: center">При заполнении формы допущены ошибки</div>';
    }
}
$form = ActiveForm::begin([
    'options' => [
        'data-pjax' => true
    ]
]); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(MaskedInput::className(), [
    'mask' => '+375 (99) 999-99-99',]) ?>

<?= $form->field($model, 'body')->textInput(['maxlength' => true])->textarea(['rows' => 4, 'placeholder' => 'Введите текст...']) ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'id' => 'action']) ?>
    <!--        --><? //= Html::submitButton('Закрыть', ['class' => 'btn btn-close']) ?>
</div>


<?php ActiveForm::end();
Pjax::end() ?>

<!--<img src="images/Spinner-5.gif" id="img" style="display: none;">-->
<!--style="display: none; position:absolute; z-index:1000;-->
<div id="floatingCirclesG" style="display: none;">
    <div class="f_circleG" id="frotateG_01"></div>
    <div class="f_circleG" id="frotateG_02"></div>
    <div class="f_circleG" id="frotateG_03"></div>
    <div class="f_circleG" id="frotateG_04"></div>
    <div class="f_circleG" id="frotateG_05"></div>
    <div class="f_circleG" id="frotateG_06"></div>
    <div class="f_circleG" id="frotateG_07"></div>
    <div class="f_circleG" id="frotateG_08"></div>
</div>
