<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Domain;

use JetBrains\PhpStorm\Pure;

final class Bray
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

    public function id(): string {
        return $this->id->value();
    }

    public function message(): string {
        return $this->message->value();
    }

    public function user(): string {
        return $this->user->value();
    }

    public function datetime(): string {
        return $this->datetime->value();
    }
}