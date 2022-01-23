<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo\Upsert;

class DemoUpsertOutputData
{
    public function __construct(
        private int $id,
    ) {
    }

    public function getResultAsArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
