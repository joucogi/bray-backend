<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Domain;

use Bray\Socialnetwork\Brays\Domain\BrayId;
use Bray\Tests\Shared\Domain\WordMother;

final class BrayIdMother
{
    public static function create(?string $value = null): BrayId {
        return new BrayId($value ?? WordMother::create());
    }
}