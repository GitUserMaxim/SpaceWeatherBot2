<?php

declare(strict_types=1);

namespace SpaceWeatherBot\Telegram;

use GuzzleHttp\Client;

final class TelegramClient
{
    private Client $http;

    public function __construct(
        private readonly string $token
    ) {
        $this->http = new Client([
            'base_uri' => "https://api.telegram.org/bot{$token}/",
            'timeout' => 10,
        ]);
    }

    public function sendMessage(
        int $chatId,
        string $text,
        ?array $replyMarkup = null
    ): void {
        $payload = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ];

        if ($replyMarkup !== null) {
            $payload['reply_markup'] = json_encode($replyMarkup);
        }

        $this->http->post('sendMessage', [
            'json' => $payload,
        ]);
    }
}
