<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Infrastructure\Persistence;

use Bray\Socialnetwork\Brays\Domain\Bray;
use Bray\Tests\Socialnetwork\Brays\BraysModuleInfrastructureTestCase;
use Bray\Tests\Socialnetwork\Brays\Domain\BrayIdMother;
use Bray\Tests\Socialnetwork\Brays\Domain\BrayMother;
use function Lambdish\Phunctional\each;
use function Lambdish\Phunctional\sort;

final class DoctrineBrayRepositoryTest extends BraysModuleInfrastructureTestCase
{
    /** @test */
   public function it_should_save_a_course(): void {
        $bray = BrayMother::create();

        $this->doctrineRepository()->save($bray);
    }

    /** @test */
    public function it_should_return_an_existing_bray(): void {
        $bray = BrayMother::create();

        $this->doctrineRepository()->save($bray);

        $this->assertEquals($bray, $this->doctrineRepository()->search($bray->id()));
    }

    /** @test */
    public function it_should_return_all_existing_brays(): void {
        $brays = sort(
            function(Bray $bray1, Bray $bray2) {
                if ($bray1->id()->value() === $bray2->id()->value()) {
                    return 0;
                }

                return $bray1->id()->value() < $bray2->id()->value() ? -1 : 1;
            },
            [
                BrayMother::create(),
                BrayMother::create(),
                BrayMother::create(),
                BrayMother::create()
            ]
        );

        each(
            fn($bray) => $this->doctrineRepository()->save($bray),
            $brays
        );

        $this->assertEquals($brays, $this->doctrineRepository()->searchAll());
    }

    /** @test */
    public function it_should_return_null_a_non_existing_bray(): void {
        $this->assertNull($this->doctrineRepository()->search(BrayIdMother::create()));
    }
}