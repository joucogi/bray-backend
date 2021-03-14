<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Application\SearchAll;

use Bray\Socialnetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\Socialnetwork\Brays\Application\BrayResponse;
use Bray\Socialnetwork\Brays\Application\BraysResponse;
use Bray\Socialnetwork\Brays\Domain\Bray;
use function Lambdish\Phunctional\map;

final class AllBraysSearcher
{
    public function __construct(private BrayRepository $repository) { }

    public function __invoke() {
        $brays = $this->repository->searchAll();

        return new BraysResponse(
            ...map(fn(Bray $bray): BrayResponse => new BrayResponse(
                $bray->id(),
                $bray->message(),
                $bray->user(),
                $bray->datetime()
            ),
                $brays
            )
        );
    }
}