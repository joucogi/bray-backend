<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Application;

use Bray\Shared\Domain\Bus\Query\Response;

final class BraysResponse implements Response
{
    private array $brays;

    public function __construct(BrayResponse ...$brays) {
        $this->brays = $brays;
    }

    public function brays(): array {
        return $this->brays;
    }
}