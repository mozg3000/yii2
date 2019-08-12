<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 05.08.2019
 * Time: 11:04
 */
/**
* @var Activity $model
    */

?>
<h2>
    Список пользователей.
</h2>
<?php foreach ($model as $user):?>
    <p>
        <a href="../activity/showall?id=<?=$user->id?>" class="btn btn-light" role="button">
            <?php echo $user->email?> >>Нажать, чтобы увидеть активности<<
        </a>
    </p>
<?php endforeach;?>
