<?php

declare(strict_types=1);

namespace SpaceWeatherBot\Core;

use Dotenv\Dotenv;
use SpaceWeatherBot\Telegram\Bot;

final class Application
{
    public function run(): void
    {
        $this->loadEnvironment();

        (new Bot())->handle();
    }

    private function loadEnvironment(): void
    {
        $rootPath = dirname(__DIR__, 2);

        if (!file_exists($rootPath . '/.env')) {
            throw new \RuntimeException('.env file not found in: ' . $rootPath);
        }

        Dotenv::createImmutable($rootPath)->load();
    }
}
