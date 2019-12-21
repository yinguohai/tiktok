<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\Student;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Connection;
use yii\web\Response;


class SiteController extends Controller
{
    public function actionSay()
    {
//        return $this->render("say", ['message' => "hello world"]);
        echo "hi , ";
        die;
    }

    public function actionError() {
        $msg = Yii::$app->errorHandler->exception->getMessage();
        echo $msg;
        die;
    }

    public function actionEntry()
    {
        $model = new EntryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionDb()
    {
        echo "<pre/>";
        $result = Student::find()->all();

        foreach($result as $obj) {
            echo $obj->getAttribute('id'),"****";
            echo $obj->getAttribute('name'),"***";
        }
    }
}
