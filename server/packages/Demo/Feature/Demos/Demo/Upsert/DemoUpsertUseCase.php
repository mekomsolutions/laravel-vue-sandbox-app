<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo\Upsert;

use Packages\Demo\Feature\Demos\Demo\DemoRepository;

class DemoUpsertUseCase
{
    public function __construct(
        private DemoRepository $repository
    ) {
    }

    public function upsert(DemoUpsertInputData $inputData): DemoUpsertOutputData
    {
        $demo = $inputData->getDemo();
        $id = $this->repository->upsert($demo);

        return new DemoUpsertOutputData($id);
    }
}
