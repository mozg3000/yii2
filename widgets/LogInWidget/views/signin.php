<?php

/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 30.07.2019
 * Time: 15:02
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>

<div class="row">
    <div class="col-md-6">
        <h4>
            Создать нового
        </h4>
        <?php
        $form = \yii\bootstrap\ActiveForm::begin();
        ?>
        <?=
        $form->field($model, 'email')
        ?>
        <?=
        $form->field($model, 'password')->passwordInput()
        ?>
        <div class="form-group">
            <button class="btn btn-defaul" type="submit">
                Создать
            </button>
        </div>
        <?php
        $form = \yii\bootstrap\ActiveForm::end();
        ?>
    </div>

</div>
<hr>