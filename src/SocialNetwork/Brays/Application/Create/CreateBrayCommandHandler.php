<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Application\Create;

use Bray\Shared\Domain\Bus\Command\CommandHandler;

final class CreateBrayCommandHandler implements CommandHandler
{
    private BrayCreator $creator;

    public function __construct(BrayCreator $creator) {
        $this->creator = $creator;
    }

    public function __invoke(CreateBrayCommand $command): void {
        ($this->creator)(
            $command->id(),
            $command->message(),
            $command->user(),
            $command->datetime()
        );
    }
}