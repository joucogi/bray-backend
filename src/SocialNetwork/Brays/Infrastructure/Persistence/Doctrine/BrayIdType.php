<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Infrastructure\Persistence\Doctrine;

use Bray\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Bray\SocialNetwork\Brays\Domain\BrayId;

final class BrayIdType extends UuidType
{
    protected function typeClassName(): string {
        return BrayId::class;
    }
}