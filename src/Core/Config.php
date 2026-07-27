<?php

declare(strict_types=1);

namespace SpaceWeatherBot\Core;

final class Config
{
    public static function get(string $key): string
    {
        return $_ENV[$key]
            ?? getenv($key)
            ?: throw new \RuntimeException(
                "Environment variable {$key} not found."
            );
    }
}
