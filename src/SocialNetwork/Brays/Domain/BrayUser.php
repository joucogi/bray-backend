<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Domain;

use \RuntimeException;

final class BrayUser
{
    private string $value;

    public function __construct(string $value) {
        $this->ensureIsAValidUser($value);
        $this->value = $value;
    }

    private function ensureIsAValidUser(string $value) {
        if ('' === $value) {
            throw new RuntimeException(
                sprintf('%s is not a valid user', $value)
            );
        }
    }

    public function value(): string {
        return $this->value;
    }
}