<h1>Авторизация</h1>
<?php use \yii\widgets\ActiveForm; ?>

<?php $form = ActiveForm::begin(['class' => 'form-horizontal']) ?>

<?= $form->field($login_model, 'email')->textInput() ?>
<?= $form->field($login_model, 'password')->passwordInput() ?>

<div><button type="submit" class="btn btn-primary">Авторизация</button></div>

<?php ActiveForm::end() ?>
