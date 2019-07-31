<?php
/**
 * @var \app\models\Activity $model
 */
?>
    <p><strong><?=$model->user->email?></strong></p>
    <p><strong><?=$model->title?></strong></p>
    <p><strong><?=$model->description?></strong></p>
    <p>Начало:     <strong><?=$model->startday?></strong></p>
    <p>Окончание:   <strong><?=$model->deadline?></strong></p>
<input name="useNotificationBox" type="checkbox" <?php if($model->useNotification===1){echo 'checked';}?> disabled></input>
<label for="useNotificationBox">Напомнить по email</label></br>

<a class="btn btn-primary"
   href="/activity/edit?id=<?=$model->id?>">
    Редактировать событие
</a>
