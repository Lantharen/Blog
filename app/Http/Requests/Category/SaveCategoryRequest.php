<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class SaveCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Defines validation rules for category data.
     *
     * @return iterable
     */
    public function rules(): iterable
    {
        return [
            'categories.name' => ['required', 'string', 'max:20'],
        ];
    }
}