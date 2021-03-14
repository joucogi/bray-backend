<?php

declare(strict_types=1);

namespace Bray\Tests\Shared\Domain;

final class DatetimeMother
{
    public static function create(): string
    {
        return MotherCreator::random()->dateTime()->format('Y-m-d H:i:s');
    }
}