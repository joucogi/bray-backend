<?php

namespace Bray\Tests\SocialNetwork\Brays\Application\SearchAll;

use Bray\SocialNetwork\Brays\Application\BrayResponse;
use Bray\SocialNetwork\Brays\Application\BraysResponse;
use Bray\SocialNetwork\Brays\Application\SearchAll\AllBraysSearcher;
use Bray\SocialNetwork\Brays\Application\SearchAll\BraysSearchAllQuery;
use Bray\SocialNetwork\Brays\Application\SearchAll\BraysSearchAllQueryHandler;
use Bray\SocialNetwork\Brays\Domain\Contracts\BrayRepository;
use Bray\SocialNetwork\Brays\Domain\Bray;
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
