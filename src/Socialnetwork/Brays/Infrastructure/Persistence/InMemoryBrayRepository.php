<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Infrastructure\Persistence;

use Bray\Socialnetwork\Brays\Domain\BrayId;
use Bray\Socialnetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\Socialnetwork\Brays\Domain\Bray;

final class InMemoryBrayRepository implements BrayRepository
{
    private array $brays;

    public function __construct() { $this->brays = []; }

    public function searchAll(): array {
        return $this->brays;
    }

    public function save(Bray $bray): void {
        $this->brays[$bray->id()] = $bray;
    }

    public function search(BrayId $id): ?Bray {
        return $this->brays[$id->value()] ?: null;
    }
}