<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 05.08.2019
 * Time: 11:36
 */
$activities = $model->getActivities()->all()
?>
<h2>
    Активности пользователя <?= $model->email?>
</h2>
<?php if(!count($activities) ):?>
<p>
    У это пользователя пока нет активностей
</p>
<?php else:?>
<?php foreach ($activities as $activity):?>
    <p>
        <a href="" class="btn btn-light">
            <?= $activity->title?>
        </a>
    </p>
<?php endforeach;?>
<?php endif;?>