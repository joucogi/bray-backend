<?php

declare(strict_types=1);

namespace Bray\Apps\SocialNetwork\Backend\Controller\Brays;

use Bray\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BraysPutController
{
    private CommandBus $bus;

    public function __construct(CommandBus $bus) {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): Response {
        return new Response('', Response::HTTP_CREATED);
    }
}