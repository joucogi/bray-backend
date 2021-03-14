<?php

declare(strict_types=1);

namespace Bray\Tests\Socialnetwork\Brays\Infrastructure\Persistence;

use Bray\Socialnetwork\Brays\Domain\Bray;
use Bray\Tests\Socialnetwork\Brays\BraysModuleInfrastructureTestCase;
use function Lambdish\Phunctional\each;

final class DoctrineBrayRepositoryTest extends BraysModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_course(): void {
        $bray = new Bray('1231231231', 'This is a message', 'Joel', '2021-02-11 04:34');

        $this->doctrineRepository()->save($bray);
    }

    /** @test */
    public function it_should_return_an_existing_bray(): void {
        $bray = new Bray('1231231231', 'This is a message', 'Joel', '2021-02-11 04:34');

        $this->doctrineRepository()->save($bray);

        $this->assertEquals($bray, $this->doctrineRepository()->search($bray->id()));
    }

    /** @test */
    public function it_should_return_all_existing_brays(): void {
        $brays = [
            new Bray('1231231231', 'This is a message', 'Joel', '2021-02-11 04:34'),
            new Bray('1231231232', 'This is a message', 'Joel', '2021-02-11 04:34'),
            new Bray('1231231233', 'This is a message', 'Joel', '2021-02-11 04:34')
        ];

        each(
            fn($bray) => $this->doctrineRepository()->save($bray),
            $brays
        );

        $this->assertEquals($brays, $this->doctrineRepository()->searchAll());
    }
}