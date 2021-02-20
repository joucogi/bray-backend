<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Application\SearchAll;

use Bray\SocialNetwork\Brays\Domain\Contracts\BrayRepository;
use Brays\SocialNetwork\Brays\Application\BrayResponse;
use Brays\SocialNetwork\Brays\Application\BraysResponse;
use Brays\SocialNetwork\Domain\Bray;
use function Lambdish\Phunctional\map;

final class AllBraysSearcher
{
    public function __construct(private BrayRepository $repository) { }

    public function __invoke() {
        $brays = $this->repository->searchAll();

        return new BraysResponse(
            ...map(fn(Bray $bray): BrayResponse =>
                new BrayResponse(
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