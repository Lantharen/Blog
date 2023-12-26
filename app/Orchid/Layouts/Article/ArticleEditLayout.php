<?php

namespace App\Orchid\Layouts\Article;

use App\Models\Category;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class ArticleEditLayout extends Rows
{
    protected function fields(): iterable
    {
        return [
            Select::make('articles.category_id')
                ->title('Category')
                ->fromModel(Category::class, 'name'),

            CheckBox::make('articles.is_published')
                ->title('Value')
                ->sendTrueOrFalse()
                ->help('Check if the article is published'),

            Input::make('articles.title')
                ->title('Title')
                ->minlength(10)
                ->maxlength(50),

            Input::make('articles.content')
                ->title('Content')
                ->minlength(10)
                ->maxlength(50)
        ];
    }
}