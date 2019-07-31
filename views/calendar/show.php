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

<?php //var_dump($model[0][0])?>
<?php foreach ($model as $activity) :?>
    <!--    --><?php //var_dump($activity[0]['title'])?>
    <a class="btn btn-default"
    href="/single/day?startday=<?=$activity->startday?>">
    <?=$activity->startday?> нажать, чтобы увидеть данную активность.
<!--    --><?php //var_dump($activity->startday)?>
    </a></br>
<?php endforeach;?>