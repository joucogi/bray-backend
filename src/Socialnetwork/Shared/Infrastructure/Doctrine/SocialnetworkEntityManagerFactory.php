<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Shared\Infrastructure\Doctrine;

use Bray\Shared\Infrastructure\Doctrine\DbalTypesSearcher;
use Bray\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Bray\Shared\Infrastructure\Doctrine\DoctrinePrefixesSearcher;
use Doctrine\ORM\EntityManagerInterface;

final class SocialnetworkEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../etc/databases/socialnetwork.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Socialnetwork', 'Bray\Socialnetwork'),
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Socialnetwork', 'Socialnetwork');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}