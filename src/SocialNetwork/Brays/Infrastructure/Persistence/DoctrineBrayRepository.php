<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Infrastructure\Persistence;

use Bray\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use Bray\SocialNetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\SocialNetwork\Brays\Domain\Bray;

final class DoctrineBrayRepository extends DoctrineRepository implements BrayRepository
{
    public function searchAll(): array {
        return $this->repository(Bray::class)->findAll();
    }

    public function save(Bray $bray): void {
        $this->persist($bray);
    }
}