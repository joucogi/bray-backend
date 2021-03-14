<?php

namespace Bray\Tests\Socialnetwork\Brays\Application\SearchAll;

use Bray\Socialnetwork\Brays\Application\BrayResponse;
use Bray\Socialnetwork\Brays\Application\BraysResponse;
use Bray\Socialnetwork\Brays\Application\SearchAll\AllBraysSearcher;
use Bray\Socialnetwork\Brays\Application\SearchAll\BraysSearchAllQuery;
use Bray\Socialnetwork\Brays\Application\SearchAll\BraysSearchAllQueryHandler;
use Bray\Socialnetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\Socialnetwork\Brays\Domain\Bray;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use function Lambdish\Phunctional\map;

class BraysSearchAllQueryHandlerTest extends MockeryTestCase
{
    /** @test */
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

    /** @test */
    public function it_should_search_all_brays(): void
    {
        $repository = Mockery::mock(BrayRepository::class);

        $brays = [
            new Bray('1231231231', 'This is a message', 'Joel', '2021-02-11 04:34')
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
                $bray->id(),
                $bray->message(),
                $bray->user(),
                $bray->datetime()
            ),
                $brays
            )
        );

        $this->assertEquals($expected, $actual);
    }
}
