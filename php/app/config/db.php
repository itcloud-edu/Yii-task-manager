<?php

// return [
//     'class' => 'yii\db\Connection',
//     'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//     'username' => 'root',
//     'password' => '',
//     'charset' => 'utf8',

//     // Schema cache options (for production environment)
//     //'enableSchemaCache' => true,
//     //'schemaCacheDuration' => 60,
//     //'schemaCache' => 'cache',
// ];


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=postgres;port=5432;dbname=app',
    'username' => 'app', // или ваш пользователь БД
    'password' => 'app', // укажите пароль
    'charset' => 'utf8',
];
