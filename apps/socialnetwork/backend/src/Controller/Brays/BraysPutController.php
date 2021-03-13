<?php

declare(strict_types=1);

namespace Bray\Apps\SocialNetwork\Backend\Controller\Brays;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BraysPutController
{
    public function __construct() { }

    public function __invoke(Request $request): Response {
        return new Response('', Response::HTTP_CREATED);
    }
}