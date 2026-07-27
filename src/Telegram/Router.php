<?php

declare(strict_types=1);

namespace SpaceWeatherBot\Telegram;

final class Router
{
    public function dispatch(
        Update $update,
        TelegramClient $telegram
    ): void {

        if ($update->isCommand('/start')) {
            $telegram->sendMessage(
                $update->chatId(),
                "🌌 Добро пожаловать в SpaceWeatherBot"
            );

            return;
        }

        $telegram->sendMessage(
            $update->chatId(),
            "Неизвестная команда."
        );
    }
}
