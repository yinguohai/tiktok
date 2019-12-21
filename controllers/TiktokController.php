<?php

namespace app\controllers;

use app\models\Tiktok;

class TiktokController extends \yii\web\Controller
{
    public function actionWebhook()
    {
        $auth_token = \Yii::$app->request->get("auth_code");
        $tiktok_obj = new Tiktok();
        $tiktok_obj->auth_code = $auth_token;
        $tiktok_obj->create_at = time();
        $result = $tiktok_obj->save();
        if (!$result) {
            exit(json_encode([
                'status' => false,
                'auth_code' => '',
                'msg' => $tiktok_obj->getErrors(),
            ]));
        }
        exit(json_encode([
            'status' => true,
            'auth_code' => $auth_token,
            'msg' => 'success',
        ]));
    }

}
