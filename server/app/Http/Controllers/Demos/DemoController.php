<?php

declare(strict_types=1);

namespace App\Http\Controllers\Demos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Demos\DemoUpsertRequest;
use Illuminate\Http\JsonResponse;
use Packages\Demo\Feature\Demos\Demo\Find\DemoFindUseCase;
use Packages\Demo\Feature\Demos\Demo\Upsert\DemoUpsertInputData;
use Packages\Demo\Feature\Demos\Demo\Upsert\DemoUpsertUseCase;

class DemoController extends Controller
{
    public function find(DemoFindUseCase $useCase): JsonResponse
    {
        $outputData = $useCase->find();

        return response()->json($outputData->getDemoAsArray());
    }

    public function upsert(DemoUpsertRequest $request, DemoUpsertUseCase $useCase): JsonResponse
    {
        $inputData = new DemoUpsertInputData($request->validated());
        $outputData = $useCase->upsert($inputData);

        return response()->json($outputData->getResultAsArray());
    }
}
