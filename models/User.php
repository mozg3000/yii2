<?php

namespace app\models;

use app\base\BaseModel;

class User extends BaseModel
{
    public $id;
    public $email;
    public $password_hash;
    public $auth_key;
    public $token;
    public $createAt;

}
