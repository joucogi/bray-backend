<?php

declare(strict_types=1);

namespace Bray\Tests\Shared\Infrastructure\PhpUnit;

use Bray\Tests\Shared\Domain\TestUtils;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Throwable;

abstract class InfrastructureTestCase extends KernelTestCase
{
    abstract protected function kernelClass(): string;

    protected function setUp(): void {
        $_SERVER['KERNEL_CLASS'] = $this->kernelClass();

        dd($_SERVER['KERNEL_CLASS']);
        self::bootKernel(['environment' => 'test']);

        parent::setUp();
    }

    protected function assertSimilar($expected, $actual): void {
        TestUtils::assertSimilar($expected, $actual);
    }

    protected function service(string $id): mixed {
        return self::$container->get($id);
    }

    protected function parameter($parameter): mixed {
        return self::$container->getParameter($parameter);
    }

    protected function clearUnitOfWork(): void {
        $this->service(EntityManager::class)->clear();
    }

    protected function eventually(callable $fn,
        $totalRetries = 3,
        $timeToWaitOnErrorInSeconds = 1,
        $attempt = 0): void {
        try {
            $fn();
        } catch (Throwable $error) {
            if ($totalRetries === $attempt) {
                throw $error;
            }

            sleep($timeToWaitOnErrorInSeconds);

            $this->eventually($fn, $totalRetries, $timeToWaitOnErrorInSeconds, $attempt + 1);
        }
    }
}