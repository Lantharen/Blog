<?php

namespace App\Orchid\Layouts\User;

use App\Models\Article;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class UserViewedArticlesLayout extends Table
{
    /**
     * @var string
     */
    protected $target = 'viewedArticles';

    /**
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('name', 'Article Name')
            ->render(function (Article $article) {
                return $article->category->name;
            }),

            TD::make('title', 'Title')
                ->render(function (Article $article) {
                    return $article->title;
                }),
        ];
    }
}