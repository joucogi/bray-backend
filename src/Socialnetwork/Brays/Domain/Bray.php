<?php

declare(strict_types=1);

namespace Bray\Socialnetwork\Brays\Domain;

use Bray\Shared\Domain\Aggregate\AggregateRoot;

final class Bray extends AggregateRoot
{
    private BrayId       $id;
    private BrayMessage  $message;
    private BrayUser     $user;
    private BrayDatetime $datetime;

    public function __construct(
        string $id,
        string $message,
        string $user,
        string $datetime
    ) {
        $this->id       = new BrayId($id);
        $this->message  = new BrayMessage($message);
        $this->user     = new BrayUser($user);
        $this->datetime = new BrayDatetime($datetime);
    }

    public static function create(string $id, string $message, string $user, string $date): self {
        return new self($id, $message, $user, $date);
    }

    public function id(): BrayId {
        return $this->id;
    }

    public function message(): BrayMessage {
        return $this->message;
    }

    public function user(): BrayUser {
        return $this->user;
    }

    public function datetime(): BrayDatetime {
        return $this->datetime;
    }
}