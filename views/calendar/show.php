<?php
use app\models\Activity;
?>


<?php
/**
* @var Activity[] $model
 */

$activities = [];
foreach($model as $el){

    if(array_key_exists(date('j', strtotime($el->startday)), $activities)){

        array_push($activities[date('j', strtotime($el->startday))]['titles'], $el->title);
    }else{

        $activities[date('j', strtotime($el->startday))] = ['startday' =>$el->startday,'id' => $el->id, 'titles' => [$el->title]];
    }
}
//print_r($activities);exit;
// Вычисляем число дней в текущем месяце
$dayofmonth = date('t');

// Счётчик для дней месяца
$day_count = 1;
// 1. Первая неделя
$num = 0;
for($i = 0; $i < 7; $i++){
    // Вычисляем номер дня недели для числа
    $dayofweek = date('w',
        mktime(0, 0, 0, date('m'), $day_count, date('Y')));
    // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
    $dayofweek = $dayofweek - 1;
    if($dayofweek == -1) $dayofweek = 6;
    if($dayofweek == $i){
        // Если дни недели совпадают,
        // заполняем массив $week
        // числами месяца
        $week[$num][$i] = $day_count;
        $day_count++;
    }else{
        $week[$num][$i] = "";
    }
}
// 2. Последующие недели месяца
while(true){
    $num++;
    for($i = 0; $i < 7; $i++){
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
for($i = 0; $i < count($week); $i++) {
    echo "<tr>";
    for($j = 0; $j < 7; $j++){
        $day = '';
        if(!empty($week[$i][$j])) {
            // Если имеем дело с субботой и воскресенья
            // подсвечиваем их
//            print_r((array_key_exists($week[$i][$j], $activities)));
            if($j == 5 || $j == 6)
                echo "<td><font color=red>".$week[$i][$j]."</font></td>";
            else {
                if(array_key_exists($week[$i][$j], $activities)){
//                    print_r($activities[$week[$i][$j]]['titles']);
                    $day .= "<td> <a class='btn btn-info' href='/single/day?startday=" . $activities[$week[$i][$j]]['startday'] . "'>".$week[$i][$j] . "<br> ";
                    foreach($activities[$week[$i][$j]]['titles'] as $title){

//                        print_r($title);
                        $day = $day . "<a href='/activity/show?id=" . $activities[$week[$i][$j]]['id'] ."'>". $title ." </a>";
//                        $day = $day . $title;
                    }
                    $day .= "<br></td>";
                    echo $day;
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