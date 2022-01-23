<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo\Find;

use Packages\Demo\Feature\Demos\Demo\DemoRepository;

class DemoFindUseCase
{
    public function __construct(
        private DemoRepository $demoRepository
    ) {
    }

    public function find(): DemoFindOutputData
    {
        $demo = $this->demoRepository->find(1);

        return new DemoFindOutputData($demo);
    }
}
