<?php
/**
 * @var \app\models\Activity $model
 */
use yii\bootstrap\ActiveForm;
?>
    <h2>Create activity</h2>

<?php $form = ActiveForm::begin([]) ?>
<? //= Yii::getAlias('@app'); ?><!--<br>-->
<? //= Yii::getAlias('@webroot'); ?><!--<br>-->
<?= $form->field($model, 'title'); ?>
<?= $form->field($model, 'description')->textarea(); ?>
<?//= $form->field($model, 'startday')->input('text'); ?>

    <!--/ В формате HTML5 нежелательно, т.к. отправка в разных форматах м.б., лучше любой виджет js-->
<?= $form->field($model, 'deadline')->input('text'); ?>
<?= $form->field($model, 'responsible')->textarea(); ?>

    <div class="form-group">
        <button class="btn btn-default" type="submit">Сохранить</button>
    </div>
<?php ActiveForm::end(); ?>