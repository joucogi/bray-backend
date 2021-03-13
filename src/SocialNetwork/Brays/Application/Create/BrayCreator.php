<?php

declare(strict_types=1);

namespace Bray\SocialNetwork\Brays\Application\Create;

use Bray\SocialNetwork\Brays\Domain\Bray;
use Bray\SocialNetwork\Brays\Domain\Contracts\BrayRepository;

final class BrayCreator
{
    private BrayRepository $repository;

    public function __construct(BrayRepository $repository) {
        $this->repository = $repository;
    }

    public function __invoke(
        string $id,
        string $message,
        string $user,
        string $date
    ) {
        $bray = Bray::create($id, $message, $user, $date);
        $this->repository->save($bray);
    }
}