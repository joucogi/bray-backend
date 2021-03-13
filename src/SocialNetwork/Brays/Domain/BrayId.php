<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Domain;

use \RuntimeException;

final class BrayId
{
    private string $value;

    public function __construct(string $value) {
        $this->ensureIsAValidId($value);
        $this->value = $value;
    }

    private function ensureIsAValidId(string $value) {
        if ('' === $value) {
            throw new RuntimeException(
                sprintf('%s is not a valid id', $value)
            );
        }
    }

    public function value(): string {
        return $this->value;
    }

    public function __toString(): string {
        return $this->value();
    }
}