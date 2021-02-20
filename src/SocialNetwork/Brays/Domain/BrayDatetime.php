<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Domain;

use \RuntimeException;

final class BrayDatetime
{
    private string $value;

    public function __construct(string $value) {
        $this->ensureIsAValidDatetime($value);
        $this->value = $value;
    }

    private function ensureIsAValidDatetime(string $value) {
        if ('' === $value) {
            throw new RuntimeException(
                sprintf('%s is not a valid datetime', $value)
            );
        }
    }

    public function value(): string {
        return $this->value;
    }
}