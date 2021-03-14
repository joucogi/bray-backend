<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Application\SearchAll;

use Bray\Shared\Domain\Bus\Query\QueryHandler;
use Bray\Socialnetwork\Brays\Application\BraysResponse;

final class BraysSearchAllQueryHandler implements QueryHandler
{
    public function __construct(private AllBraysSearcher $searcher) { }

    public function __invoke(BraysSearchAllQuery $query): BraysResponse {
        return ($this->searcher)();
    }
}