<?php

namespace app\controllers;

use app\models\Tiktok;

class TiktokController extends \yii\web\Controller
{
    public function actionWebhook()
    {
        $auth_token = \Yii::$app->request->get("token");
        $tiktok_obj = new Tiktok();
        $tiktok_obj->auth_token = $auth_token;
        $tiktok_obj->create_at = time();
        $result = $tiktok_obj->save();
        if (!$result) {
            exit(json_encode([
                'status' => false,
                'auth_token' => '',
                'msg' => $tiktok_obj->getErrors(),
            ]));
        }
        exit(json_encode([
            'status' => true,
            'auth_token' => $auth_token,
            'msg' => 'success',
        ]));

    }

}
