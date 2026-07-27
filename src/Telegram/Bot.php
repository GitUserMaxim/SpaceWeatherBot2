<?php

declare(strict_types=1);

namespace SpaceWeatherBot\Telegram;

use SpaceWeatherBot\Core\Config;

final class Bot
{
    public function handle(): void
    {
        $update = Update::fromGlobals();

        $telegram = new TelegramClient(
            Config::get('TELEGRAM_BOT_TOKEN')
        );

        $router = new Router();

        $router->dispatch(
            $update,
            $telegram
        );
    }
}
