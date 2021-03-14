<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Domain;

use Bray\Socialnetwork\Brays\Domain\BrayMessage;
use Bray\Tests\Shared\Domain\SentenceMother;

final class BrayMessageMother
{
    public static function create(?string $value = null): BrayMessage {
        return new BrayMessage($value ?? SentenceMother::create(rand(1, 255)));
    }
}