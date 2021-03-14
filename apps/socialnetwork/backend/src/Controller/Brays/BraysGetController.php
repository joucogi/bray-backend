<?php

declare(strict_types=1);

namespace Bray\Apps\Socialnetwork\Backend\Controller\Brays;

use Bray\Shared\Domain\Bus\Query\QueryBus;
use Bray\Socialnetwork\Brays\Application\SearchAll\BraysSearchAllQuery;
use Bray\Socialnetwork\Brays\Application\BrayResponse;
use Bray\Socialnetwork\Brays\Application\BraysResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class BraysGetController
{
    public function __construct(private QueryBus $query) { }

    public function __invoke(Request $request): JsonResponse {

        /** @var BraysResponse $response */
        $response = $this->query->ask(new BraysSearchAllQuery());

        return new JsonResponse([
            'brays' => map(
                fn(BrayResponse $bray): array => [
                    'id' => $bray->id(),
                    'message' => $bray->message(),
                    'user' => $bray->user(),
                    'datetime' => $bray->datetime()
                ],
                $response->brays()
            )
        ]);
    }
}