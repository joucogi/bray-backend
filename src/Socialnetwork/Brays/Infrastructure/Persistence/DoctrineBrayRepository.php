<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Infrastructure\Persistence;

use Bray\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use Bray\Socialnetwork\Brays\Domain\BrayId;
use Bray\Socialnetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\Socialnetwork\Brays\Domain\Bray;

final class DoctrineBrayRepository extends DoctrineRepository implements BrayRepository
{
    public function searchAll(): array {
        return $this->repository(Bray::class)->findAll();
    }

    public function save(Bray $bray): void {
        $this->persist($bray);
    }

    public function search(BrayId $id): ?Bray {
        return $this->repository(Bray::class)->find($id);
    }
}