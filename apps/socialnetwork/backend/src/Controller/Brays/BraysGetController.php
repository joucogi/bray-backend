<?php

declare(strict_types=1);

namespace Bray\Apps\SocialNetwork\Backend\Controller\Brays;

use Bray\Shared\Domain\Bus\Query\QueryBus;
use Bray\SocialNetwork\Brays\Application\SearchAll\BraysSearchAllQuery;
use Brays\SocialNetwork\Brays\Application\BrayResponse;
use Brays\SocialNetwork\Brays\Application\BraysResponse;
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