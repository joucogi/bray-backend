<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Infrastructure\Persistence;

use Bray\Socialnetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\Socialnetwork\Brays\Domain\Bray;

final class InMemoryBrayRepository implements BrayRepository
{
    private $brays;

    public function __construct() { $this->brays = []; }

    public function searchAll(): array {
        return $this->brays;
    }

    public function save(Bray $bray): void {
        $this->brays[] = $bray;
    }
}