<?php

declare(strict_types=1);

use SpaceWeatherBot\Core\Application;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new Application();

$app->run();
