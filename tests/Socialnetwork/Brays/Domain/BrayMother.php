<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Domain;

use Bray\Socialnetwork\Brays\Domain\Bray;

final class BrayMother
{
    public static function create(
        ?string $id = null,
        ?string $message = null,
        ?string $user = null,
        ?string $datetime = null,
    ): Bray {
        return new Bray(
            BrayIdMother::create($id)->value(),
            BrayMessageMother::create($message)->value(),
            BrayUserMother::create($user)->value(),
            BrayDatetimeMother::create($datetime)->value()
        );
    }
}