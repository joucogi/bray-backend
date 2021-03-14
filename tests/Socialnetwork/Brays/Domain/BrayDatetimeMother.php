<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Domain;

use Bray\Socialnetwork\Brays\Domain\BrayDatetime;
use Bray\Tests\Shared\Domain\DatetimeMother;

final class BrayDatetimeMother
{
    public static function create(?string $value = null): BrayDatetime {
        return new BrayDatetime($value ?? DatetimeMother::create());
    }
}