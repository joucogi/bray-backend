<?php

declare(strict_types=1);

namespace Bray\Shared\Infrastructure\Bus;

use ReflectionClass;
use ReflectionMethod;
use function Lambdish\Phunctional\map;
use function Lambdish\Phunctional\reindex;

final class CallableFirstParameterExtractor
{
    static public function forCallables(iterable $handlers): array {
        return map(
            self::unflatten(),
            reindex(
                self::extractInvokeFirstParameter(),
                $handlers
            )
        );
    }

    static private function unflatten(): callable {
        return fn($item): array => [$item];
    }

    static private function extractInvokeFirstParameter(): callable {
        return static function($class): ?string {
            $reflector = new ReflectionClass($class);
            if (!$reflector->hasMethod('__invoke')) {
                return null;
            }

            $method = $reflector->getMethod('__invoke');

            if (!self::methodHasOneParameter($method)) {
                return null;
            }

            return self::getMethodFirstParameter($method);
        };
    }

    private static function methodHasOneParameter(ReflectionMethod $method): bool {
        return $method->getNumberOfParameters() === 1;
    }

    private static function getMethodFirstParameter(ReflectionMethod $method) {
        return $method->getParameters()[0]->getType()->getName();
    }
}