<?php

namespace frontend\models;

use yii\base\Model;

class RegisterForm extends Model {
    public $login;
    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'required']
        ];
    }
}