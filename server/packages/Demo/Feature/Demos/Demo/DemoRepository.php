<?php

declare(strict_types=1);

namespace Packages\Demo\Feature\Demos\Demo;

use App\Models\Demo as DataModel;

class DemoRepository
{
    public function find(int $id): ?Demo
    {
        /** @var DataModel */
        $dataModel = DataModel::find($id);

        return $dataModel?->toModel();
    }

    public function upsert(Demo $demo): int
    {
        $dataModel = $demo->toDataModel();

        if (empty($dataModel->id)) {
            $dataModel->save();
        } else {
            $dataModel->where('id', $dataModel->id)->update($dataModel->getAttributes());
        }

        return $dataModel->id;
    }
}
