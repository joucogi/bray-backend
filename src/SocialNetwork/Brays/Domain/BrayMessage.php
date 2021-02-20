<?php

declare(strict_types=1);

namespace Brays\SocialNetwork\Domain;

use \RuntimeException;

final class BrayMessage
{
    private string $value;

    public function __construct(string $value) {
        $this->ensureIsAValidMessage($value);
        $this->value = $value;
    }

    private function ensureIsAValidMessage(string $value) {
        if ('' === $value) {
            throw new RuntimeException(
                sprintf('%s is not a valid message', $value)
            );
        }

        if (255 < strlen($value)) {
            throw new RuntimeException(
                sprintf('%s is longer than 255 characters', $value)
            );
        }
    }

    public function value(): string {
        return $this->value;
    }
}