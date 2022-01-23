<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo\Find;

use Packages\Demo\Feature\Demos\Demo\Demo;

class DemoFindOutputData
{
    public function __construct(
        private ?Demo $demo,
    ) {
    }

    public function getDemoAsArray(): ?array
    {
        return !isset($this->demo) ? null : [
            'id' => $this->demo->getId(),
            'name' => $this->demo->getName(),
        ];
    }
}
