<?php

declare(strict_types=1);

namespace Bray\Apps\SocialNetwork\Backend\Controller\Brays;

use Bray\Shared\Domain\Bus\Command\CommandBus;
use Bray\SocialNetwork\Brays\Application\Create\CreateBrayCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BraysPutController
{
    private CommandBus $bus;

    public function __construct(CommandBus $bus) {
        $this->bus = $bus;
    }

    public function __invoke(string $id, Request $request): Response {
        $this->bus->dispatch(
            new CreateBrayCommand(
                $id,
                $request->request->get('message'),
                $request->request->get('user'),
                date('Y-m-d H:i:s')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}