<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class SaveCommentRequest extends FormRequest
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
     * Defines validation rules for comment data.
     *
     * @return iterable
     */
    public function rules(): iterable
    {
        return [
            'comment.content' => ['required', 'string', 'max:500'],
            'comment.article_id' => ['required', 'integer', 'exists:articles,id'],
            'comment.user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}