<?php

declare(strict_types=1);

namespace Bray\Shared\Infrastructure\Bus\Query;

use Bray\Shared\Domain\Bus\Query\Query;
use Bray\Shared\Domain\Bus\Query\QueryBus;
use Bray\Shared\Domain\Bus\Query\Response;
use Symfony\Component\Messenger\MessageBus;

final class SynchronousQueryBus implements QueryBus
{
    private MessageBus $bus;

    public function __construct(iterable $queryHandlers) {
        dump($queryHandlers);exit;
        $this->bus = new MessageBus();
    }

    public function ask(Query $query): ?Response {
        return null;
    }
}