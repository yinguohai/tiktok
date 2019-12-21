<?php

return [
    'class' => 'yii\db\Connection',
    # host=mysql 因为我用的是docker 环境，mysql就是mysql的容器
    'dsn' => 'mysql:host=mysql;dbname=tiktok',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
