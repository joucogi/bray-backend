<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays;

use Bray\Socialnetwork\Brays\Infrastructure\Persistence\DoctrineBrayRepository;
use Bray\Tests\Socialnetwork\Shared\Infrastructure\PhPUnit\SocialnetworkContextInfrastructureTestCase;

abstract class BraysModuleInfrastructureTestCase extends SocialnetworkContextInfrastructureTestCase
{
    protected function doctrineRepository(): DoctrineBrayRepository {
        return $this->service(DoctrineBrayRepository::class);
    }
}