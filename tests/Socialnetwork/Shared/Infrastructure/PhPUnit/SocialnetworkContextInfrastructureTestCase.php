<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Shared\Infrastructure\PhPUnit;

use Bray\Apps\Socialnetwork\Backend\SocialnetworkBackendKernel;
use Bray\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class SocialnetworkContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected static $class = SocialnetworkBackendKernel::class;

    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new SocialnetworkEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new SocialnetworkEnvironmentArranger($this->service(EntityManager::class));

        $arranger->close();

        parent::tearDown();
    }
}