<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Domain;

use Bray\Socialnetwork\Brays\Domain\BrayUser;
use Bray\Tests\Shared\Domain\UserMother;

final class BrayUserMother
{
    public static function create(?string $value = null): BrayUser {
        return new BrayUser($value ?? UserMother::create());
    }
}