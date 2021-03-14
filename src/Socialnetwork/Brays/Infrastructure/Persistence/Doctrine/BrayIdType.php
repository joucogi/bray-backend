<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Infrastructure\Persistence\Doctrine;

use Bray\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Bray\Socialnetwork\Brays\Domain\BrayId;

final class BrayIdType extends UuidType
{
    protected function typeClassName(): string {
        return BrayId::class;
    }
}