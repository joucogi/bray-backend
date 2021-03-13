<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Domain\Contracts;

use Bray\SocialNetwork\Brays\Domain\Bray;

interface BrayRepository
{
    public function save(Bray $bray): void;
    public function searchAll(): array;
}