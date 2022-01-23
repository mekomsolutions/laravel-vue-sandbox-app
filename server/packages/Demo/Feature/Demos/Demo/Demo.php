<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo;

use App\Models\Demo as DataModel;

class Demo
{
    public function __construct(
        private string $name,
        private ?int $id = null,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toDataModel(): DataModel
    {
        return new DataModel([
            'id' => $this->getId(),
            'name' => $this->getName(),
        ]);
    }
}
