<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo\Upsert;

use Packages\Demo\Feature\Demos\Demo\Demo;

class DemoUpsertInputData
{
    private Demo $demo;

    public function __construct(array $request)
    {
        $this->demo = new Demo(
            id: $request['id'] ?? null,
            name: $request['name']
        );
    }

    public function getDemo(): Demo
    {
        return $this->demo;
    }
}
