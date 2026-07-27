<?php

declare(strict_types=1);

namespace SpaceWeatherBot\Telegram;

final readonly class Update
{
    public function __construct(
        private array $data
    ) {
    }

    public static function fromGlobals(): self
    {
        $json = file_get_contents('php://input');

        if ($json === false || $json === '') {
            return new self([]);
        }

        return new self(
            json_decode($json, true, flags: JSON_THROW_ON_ERROR)
        );
    }

    public function raw(): array
    {
        return $this->data;
    }

    public function chatId(): ?int
    {
        return $this->data['message']['chat']['id']
            ?? $this->data['callback_query']['message']['chat']['id']
            ?? null;
    }

    public function text(): ?string
    {
        return $this->data['message']['text'] ?? null;
    }

    public function callbackData(): ?string
    {
        return $this->data['callback_query']['data'] ?? null;
    }

    public function isCommand(string $command): bool
    {
        return $this->text() === $command;
    }
}
