<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Domain\Contracts;

use Bray\Socialnetwork\Brays\Domain\Bray;

interface BrayRepository
{
    public function save(Bray $bray): void;
    public function searchAll(): array;
}