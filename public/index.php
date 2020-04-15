<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
require __DIR__ . '/../src/config/bootstrap.php';

$config = require \hiqdev\composer\config\Builder::path('hisite');

(new \yii\web\Application($config))->run();
