<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 13.08.2019
 * Time: 10:39
 */
/**
 * @var \app\models\Activity[] $model
 */
?>

<h2>
    У вас запланированны на сегодня следующие события
</h2>
<?php foreach ($model as $activity):?>
    <h3>
        <?= $activity->title;?>
    </h3>
    <p>
        <?= $activity->description;?>
    </p>
<?php endforeach;?>
