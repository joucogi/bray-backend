<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Application\SearchAll;

use Brays\SocialNetwork\Brays\Application\BrayResponse;
use Brays\SocialNetwork\Brays\Application\BraysResponse;

final class AllBraysSearcher
{
    public function __invoke() {
        return new BraysResponse(
            new BrayResponse('123123123123-123123-12312-123', 'This is first bray', 'Joel', '2021-02-17 12:32:43'),
            new BrayResponse('123123123123-123123-12312-125', 'This is second bray', 'Joel', '2021-02-17 16:35:43'),
            new BrayResponse('123123123123-123123-12312-126', 'This is third bray', 'Joan', '2021-02-17 12:32:43'),
            new BrayResponse('123123123123-123123-12312-127', 'This is fourth bray', 'Joel', '2021-02-17 12:32:43')
        );
    }
}