<?php

namespace App\Orchid\Layouts\Comment;

use App\Models\Article;
use App\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;


class CommentEditLayout extends Rows
{
    /**
     * Defines the layout fields for category editing.
     *
     * @return iterable
     */
    protected function fields(): iterable
    {
        return [
            Select::make('comment.article_id')
            ->title('Title')
                ->fromModel(Article::class, 'title'),

            Select::make('comment.user_id')
            ->title('User')
                ->fromModel(User::class, 'name'),

            Input::make('comment.content')
            ->title('Content')
                ->maxLength(500),
        ];
    }
}