<?php
/**
 * Created by PhpStorm.
 * User: yinguohai
 * Date: 2019/12/5
 * Time: 12:26 AM
 */

namespace app\models;

//use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
//        return parent::rules(); // TODO: Change the autogenerated stub
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}