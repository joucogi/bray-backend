<?php

declare(strict_types=1);

namespace Bray\Apps\SocialNetwork\Backend\Controller\HealthCheck;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckGetController {
    public function __invoke(Request $request): JsonResponse {
        return new JsonResponse([
            'app' => 'socialnetwork_backend',
            'status' => 'ok'
        ]);
    }
}