<?php

declare(strict_types=1);

namespace App\Http\Requests\Demos;

use Illuminate\Foundation\Http\FormRequest;

class DemoUpsertRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['nullable', 'numeric', 'integer', 'in:1'],
            'name' => ['required', 'string', 'max:100'],
        ];
    }
}
