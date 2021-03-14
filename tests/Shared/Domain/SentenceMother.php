<?php

declare(strict_types=1);

namespace Bray\Tests\Shared\Domain;

final class SentenceMother
{
    public static function create(int $length = 0): string
    {
        $sentence = MotherCreator::random()->sentence;

        return $length > 0 ? substr($sentence, 0, $length) : $sentence;
    }
}