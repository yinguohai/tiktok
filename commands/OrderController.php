<?php
/**
 * Created by PhpStorm.
 * User: yinguohai
 * Date: 2019/12/8
 * Time: 6:25 PM
 */

namespace app\commands;


use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Exception;

class OrderController extends Controller
{
    /**
     * @param $url
     * @param $params
     * @return mixed  object {"code":"000","message":"成功","pageCount":2044,"dataCount":204305,"data":[]}
     * @throws Exception
     */
    private function actionGetOrder($url, $params)
    {
        $http_query = http_build_query($params);
        $href = sprintf("%s?%s", $url, $http_query);

        $handle = curl_init();
        curl_setopt_array($handle, [
            CURLOPT_URL => $href,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json;',
            ]
        ]);


        $response = curl_exec($handle);

        if (curl_errno($handle)) {
            throw new Exception("there is some error !");
        }

        return $response;
    }

    public function actionOrderList()
    {
        $mbConfig = \Yii::$app->params['mb'];
        $url = $mbConfig['mbOrderUrl'];
        $params = [
            'developerId' => $mbConfig['developerId'],
            'authToken' => $mbConfig['authToken'],
            'version' => $mbConfig['version'],
            'companyId' => $mbConfig['companyId'],
            'timestamp' => time(),
            'status' => $mbConfig['status'],
            'page' => 1,
            'action' => $mbConfig['action']
        ];

        $result = json_decode($this->actionGetOrder($url, $params));
        var_dump($result);
        die;

        if (!isset($result['code']) or !$result['code'] == '000') {
            echo 'get order in error';
            return !ExitCode::OK;
        }

        print_r($result['data'][0]);

        return ExitCode::OK;
    }
}