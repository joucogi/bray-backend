<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Domain;

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
                sprintf('Empty message is not valid')
            );
        }

        if (255 < strlen($value)) {
            throw new RuntimeException(
                sprintf('The message "%s" is longer than 255 characters', $value)
            );
        }
    }

    public function value(): string {
        return $this->value;
    }
}