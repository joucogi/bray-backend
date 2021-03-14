<?php

declare(strict_types=1);

namespace Bray\Tests\Shared\Domain;

final class UserMother
{
    public static function create(): string
    {
        return MotherCreator::random()->userName;
    }
}