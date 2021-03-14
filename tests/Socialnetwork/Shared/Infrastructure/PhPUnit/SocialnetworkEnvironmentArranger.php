<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Shared\Infrastructure\PhPUnit;

use Bray\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use Bray\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class SocialnetworkEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}