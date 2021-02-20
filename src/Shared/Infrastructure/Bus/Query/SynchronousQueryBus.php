<?php

declare(strict_types=1);

namespace Bray\Shared\Infrastructure\Bus\Query;

use Bray\Shared\Domain\Bus\Query\Query;
use Bray\Shared\Domain\Bus\Query\QueryBus;
use Bray\Shared\Domain\Bus\Query\Response;
use Bray\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use http\Exception\RuntimeException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

final class SynchronousQueryBus implements QueryBus
{
    private MessageBus $bus;

    public function __construct(iterable $queryHandlers) {

        $handlersMapping = CallableFirstParameterExtractor::forCallables($queryHandlers);

        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator($handlersMapping)
            )
        ]);
    }

    public function ask(Query $query): ?Response {
        try {
            $stamp = $this->bus->dispatch($query)->last(HandledStamp::class);

            return $stamp->getResult();
        } catch (\RuntimeException $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }
}