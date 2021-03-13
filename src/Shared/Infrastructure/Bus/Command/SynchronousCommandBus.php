<?php

declare(strict_types=1);

namespace Bray\Shared\Infrastructure\Bus\Command;

use Bray\Shared\Domain\Bus\Command\Command;
use Bray\Shared\Domain\Bus\Command\CommandBus;
use Bray\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use http\Exception\RuntimeException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

final class SynchronousCommandBus implements CommandBus
{
    private MessageBus $bus;

    public function __construct(iterable $commandHandlers) {

        $handlersMapping = CallableFirstParameterExtractor::forCallables($commandHandlers);

        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator($handlersMapping)
            )
        ]);
    }

    public function dispatch(Command $command): void {
        try {
            $this->bus->dispatch($command);
        } catch (RuntimeException $e) {
            throw new RuntimeException($e->getMessage());
        }
    }


}