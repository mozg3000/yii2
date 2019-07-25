<?php
/**
 * @var \app\models\Activity $model
 */
?>
    <p><strong><?=$model->title?></strong></p>
    <p><strong><?=$model->description?></strong></p>
    <p>Начало:     <strong><?=$model->startday?></strong></p>
    <p>Окончание:   <strong><?=$model->deadline?></strong></p>
    <p>Ответственный:   <strong><?=$model->responsible?></strong></p>

<a class="btn btn-primary"
   href="/activity/edit">
    Редактировать событие
</a>
