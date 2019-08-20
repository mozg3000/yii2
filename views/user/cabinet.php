<?php
/**
 * @var \app\models\Activity $model
 */
use yii\bootstrap\ActiveForm;
/**
* @var Activities[] $activities
 * @var \app\models\User $user
 */
use app\models\Users;
use app\models\Activity;

?>
<h2>Ваши данные</h2>

<p>
    Логин: <?php echo $user->email?>
</p>
<h3>
    У вас запланированы активности:
</h3>
<?php foreach ($activities as $activity):?>
<!--<pre>-->
<!--    --><?php //print_r($activity)?>
</pre>
        <p>
            <a href="/activity/show?id=<?=$activity->id?>">
                <?= $activity->startday?>: <?= $activity->title?>
            </a>
        </p>
<?php endforeach;?>
