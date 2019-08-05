<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 05.08.2019
 * Time: 10:20
 */?>

<div>
    <h2>
        Страница администратора
    </h2>
    <a href="/admin/users" class="btn btn-light" role="button">
        >>Посмотреть пользователей<< (Нажать)
    </a>
    <?=\app\widgets\LogInWidget\LogInWidget::widget()?>
</div>
