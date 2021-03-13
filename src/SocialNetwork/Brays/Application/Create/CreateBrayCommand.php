<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Application\Create;

use Bray\Shared\Domain\Bus\Command\Command;

final class CreateBrayCommand implements Command
{
    private string $id;
    private string $message;
    private string $user;
    private string $datetime;

    public function __construct(
        string $id,
        string $message,
        string $user,
        string $datetime
    ) {
        $this->id       = $id;
        $this->message  = $message;
        $this->user     = $user;
        $this->datetime = $datetime;
    }

    public function id(): string {
        return $this->id;
    }

    public function message(): string {
        return $this->message;
    }

    public function user(): string {
        return $this->user;
    }

    public function datetime(): string {
        return $this->datetime;
    }
}