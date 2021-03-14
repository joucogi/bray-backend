<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Domain\Contracts;

use Bray\Socialnetwork\Brays\Domain\Bray;
use Bray\Socialnetwork\Brays\Domain\BrayId;

interface BrayRepository
{
    public function save(Bray $bray): void;

    public function search(BrayId $id): ?Bray;

    public function searchAll(): array;
}