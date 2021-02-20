<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Infrastructure\Repositories;

use Bray\SocialNetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\SocialNetwork\Brays\Domain\Bray;

final class InMemoryBrayRepository implements BrayRepository
{
    public function searchAll(): array {
        return [
            new Bray('123123123123-123123-12312-123', 'This is first bray', 'Joel', '2021-02-17 12:32:43'),
            new Bray('123123123123-123123-12312-125', 'This is second bray', 'Joel', '2021-02-17 16:35:43'),
            new Bray('123123123123-123123-12312-126', 'This is third bray', 'Joan', '2021-02-17 12:32:43'),
            new Bray('123123123123-123123-12312-127', 'This is fourth bray', 'Joel', '2021-02-17 12:32:43')
        ];
    }
}