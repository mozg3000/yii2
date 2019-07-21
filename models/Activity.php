<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 21.07.2019
 * Time: 15:45
 */

namespace app\models;


use app\base\BaseModel;

class Activity extends BaseModel
{
    public $title;
    public $description;
    public $dataStart;
    public $dataEnd;
    public $isBlocked;
    public $isRepeatable;
}