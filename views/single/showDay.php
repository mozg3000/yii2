<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 25.07.2019
 * Time: 14:02
 */
?>
<?php if (count($model->activities[0])===0):?>

    <h2>У вас нет активностей в этот день</h2>

    <a class="btn btn-default"
       href="/activity/create">
        Добавить
    </a></br>
<?php else:?>
<h2>Список дел на <?=$model->activities[0][0]->startday?></h2>

<?php foreach ($model->activities[0] as $activity) :?>
<!--    --><?php //var_dump($activity[0]['title'])?>
    <a class="btn btn-default""
        href="/activity/show?id=<?=$activity['id']?>">
        <?=$activity['title']?> нажать, чтобы увидеть активность активности в этот день.
    </a></br>
<?php endforeach;?>
<?php endif;?>
<!--public $date;-->
<!--public $isWeekend;-->
<!--public $hollyday;-->
<!--public $activities = [];-->
