<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 24.07.2019
 * Time: 12:41
 */
?>
<!--<a class="btn btn-primary"-->
<!--href="/single/day?startday=2019-07-30">-->
<!--    Посмотреть какое-то из событий-->
<!--</a>-->

<?php //var_dump(count($model))?>
<?php if (count($model)===0):?>

    <h2>У вас пока нет активностей</h2>

    <a class="btn btn-default"
       href="/activity/create">
        Добавить
    </a></br>
<?php else:?>
<!---->
    <?php foreach ($model as $activity) :?>
        <!--    --><?php //var_dump($activity[0]['title'])?>
        <a class="btn btn-default"
           href="/single/day?startday=<?=$activity->startday?>">
            <?=$activity->startday?> нажать, чтобы увидеть активности в этот день.
            <!--    --><?php //var_dump($activity->startday)?>
        </a></br>
    <?php endforeach;?>

<?php endif;?>