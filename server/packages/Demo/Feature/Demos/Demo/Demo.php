<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo;

use App\Models\Demo as DataModel;

class Demo
{
    /**
     * @throws \Exception
     */
    public function generateUuid(): string
    {
        $data = random_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

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
