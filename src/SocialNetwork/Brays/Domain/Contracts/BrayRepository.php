<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Domain\Contracts;

interface BrayRepository
{
    public function searchAll(): array;
}