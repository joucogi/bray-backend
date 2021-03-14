<?php

namespace Bray\Tests\Socialnetwork\Brays\Application\SearchAll;

use Bray\Socialnetwork\Brays\Application\BrayResponse;
use Bray\Socialnetwork\Brays\Application\BraysResponse;
use Bray\Socialnetwork\Brays\Application\SearchAll\AllBraysSearcher;
use Bray\Socialnetwork\Brays\Application\SearchAll\BraysSearchAllQuery;
use Bray\Socialnetwork\Brays\Application\SearchAll\BraysSearchAllQueryHandler;
use Bray\Socialnetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\Socialnetwork\Brays\Domain\Bray;
use Bray\Tests\Socialnetwork\Brays\Domain\BrayMother;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use function Lambdish\Phunctional\map;

class BraysSearchAllQueryHandlerTest extends MockeryTestCase
{
    public function it_should_no_brays_when_is_empty(): void
    {
        $repository = Mockery::mock(BrayRepository::class);

        $brays = [
        ];

        $query = new BraysSearchAllQuery();
        $handler = new BraysSearchAllQueryHandler(
            new AllBraysSearcher($repository)
        );

        $repository->shouldReceive('searchAll')
                   ->once()
                   ->andReturn($brays);

        $actual = $handler($query);

        $expected = new BraysResponse(...[]);

        $this->assertEquals($expected, $actual);
    }

    public function it_should_search_all_brays(): void
    {
        $repository = Mockery::mock(BrayRepository::class);

        $brays = [
            BrayMother::create(),
            BrayMother::create(),
        ];

        $query = new BraysSearchAllQuery();
        $handler = new BraysSearchAllQueryHandler(
            new AllBraysSearcher($repository)
        );

        $repository->shouldReceive('searchAll')
                   ->once()
                   ->andReturn($brays);

        $actual = $handler($query);

        $expected = new BraysResponse(
            ...map(fn(Bray $bray): BrayResponse => new BrayResponse(
                $bray->id()->value(),
                $bray->message()->value(),
                $bray->user()->value(),
                $bray->datetime()->value()
            ),
                $brays
            )
        );

        $this->assertEquals($expected, $actual);
    }
}
