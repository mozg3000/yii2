
<?php
/**
* @var Activity[] $model
 */

use app\models\Activity;

$activities = [];
foreach($model as $el){

    $activities[date('j', strtotime($el->startday))] = ['startday' =>$el->startday, 'title' => $el->title];
}
//print_r($activities[13]['startday']);exit;
// Вычисляем число дней в текущем месяце

$dayofmonth = date('t');

// Счётчик для дней месяца

$day_count = 1;



// 1. Первая неделя

$num = 0;

for($i = 0; $i < 7; $i++)

{

    // Вычисляем номер дня недели для числа

    $dayofweek = date('w',

        mktime(0, 0, 0, date('m'), $day_count, date('Y')));

    // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота

    $dayofweek = $dayofweek - 1;

    if($dayofweek == -1) $dayofweek = 6;



    if($dayofweek == $i)

    {

        // Если дни недели совпадают,

        // заполняем массив $week

        // числами месяца

        $week[$num][$i] = $day_count;

        $day_count++;

    }

    else

    {

        $week[$num][$i] = "";

    }

}



// 2. Последующие недели месяца

while(true)

{

    $num++;

    for($i = 0; $i < 7; $i++)

    {

        $week[$num][$i] = $day_count;

        $day_count++;

        // Если достигли конца месяца - выходим

        // из цикла

        if($day_count > $dayofmonth) break;

    }

    // Если достигли конца месяца - выходим

    // из цикла

    if($day_count > $dayofmonth) break;

}



// 3. Выводим содержимое массива $week

// в виде календаря

// Выводим таблицу


echo "<table border=1>";

for($i = 0; $i < count($week); $i++)

{

    echo "<tr>";

    for($j = 0; $j < 7; $j++)

    {

        if(!empty($week[$i][$j]))

        {
            // Если имеем дело с субботой и воскресенья

            // подсвечиваем их
//            print_r((array_key_exists($week[$i][$j], $activities)));
            if($j == 5 || $j == 6)

                echo "<td><font color=red>".$week[$i][$j]."</font></td>";

            else {
//                print_r($activities[$i]);

                if(array_key_exists($week[$i][$j], $activities)){
                    echo "<td>".$week[$i][$j] . "<br> <a href='/single/day?startday=".  $activities[$week[$i][$j]]['startday'] ."'>". $activities[$week[$i][$j]]['title'] ." </a>></td>";
                }else{
                    echo "<td>".$week[$i][$j] ."</td>";
                }
            }

        }

        else echo "<td>&nbsp;</td>";

    }

    echo "</tr>";

}

echo "</table>";

?>
<br>
<!--<a class="btn btn-primary"-->
<!--href="/single/day?startday=2019-07-30">-->
<!--    Посмотреть какое-то из событий-->
<!--</a>-->

<?php //var_dump(count($model))?>
<?php //if (count($model)===0):?>
<!---->
<!--    <h2>У вас пока нет активностей</h2>-->
<!---->
<!---->
<?php //else:?>
<!--    --><?php //foreach ($model as $activity) :?>
<!--       --><?php ////var_dump($activity[0]['title'])?>
<!--        <a class="btn btn-default"-->
<!--           href="/single/day?startday=--><?//=$activity->startday?><!--">-->
<!--            --><?//=$activity->startday?><!-- нажать, чтобы увидеть активности в этот день.-->
<!--              --><?php ////var_dump($activity->startday)?>
<!--        </a></br>-->
<!--    --><?php //endforeach;?>
<!---->
<?php //endif;?>
<a class="btn btn-default"
                 href="/activity/create">
    Добавить
</a></br>