<?php

declare(strict_types=1);

namespace Brays\SocialNetwork\Brays\Application;

use Bray\Shared\Domain\Bus\Query\Response;

final class BrayResponse implements Response
{
    public function __construct(
        private string $id,
        private string $message,
        private string $user,
        private string $datetime
    ) { }

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