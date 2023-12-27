<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticleRequest extends FormRequest
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
     * Defines validation rules for article data.
     *
     * @return iterable
     */
    public function rules(): iterable
    {
        return [
            'articles.title' => ['required', 'string', 'between:10,50'],
            'articles.content' => ['required', 'string', 'between:10,50'],
            'articles.is_published' => ['required', 'boolean'],
            'articles.category_id' => ['required', 'exists:categories,id'],
            //'articles.attachment' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:10240']
        ];
    }
}