<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays;

use Bray\Socialnetwork\Brays\Infrastructure\Persistence\DoctrineBrayRepository;
use Bray\Tests\Socialnetwork\Shared\Infrastructure\PhPUnit\SocialnetworkContextInfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class BraysModuleInfrastructureTestCase extends SocialnetworkContextInfrastructureTestCase
{
    protected function doctrineRepository(): DoctrineBrayRepository {
        return new DoctrineBrayRepository($this->service(EntityManager::class));
    }
}