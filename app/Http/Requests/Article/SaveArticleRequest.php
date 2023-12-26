<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): iterable
    {
        return [
            'articles.title' => ['required', 'string', 'between:10,50'],
            'articles.content' => ['required', 'string', 'between:10,50'],
            'articles.is_published' => ['required', 'boolean'],
            'articles.category_id' => ['required', 'exists:categories,id'],
        ];
    }
}