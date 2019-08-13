<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 29.07.2019
 * Time: 11:05
 */

?>

<div class="row">

    <?php if($this->beginCache('user_list', ['duration' => 30])):?>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($users);
            ?>
        </pre>
    </div>
    <?php $this->endCache(); endif;?>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($activities);
            ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($firstActivity);
            ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($count);
            ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($auth);
            ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($email);
            ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php
                print_r($userActivities);
            ?>
        </pre>
    </div>
</div>
