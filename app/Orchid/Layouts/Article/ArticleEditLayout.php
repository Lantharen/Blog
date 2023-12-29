<?php

namespace App\Orchid\Layouts\Article;

use App\Models\Category;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;


class ArticleEditLayout extends Rows
{
    /**
     * Defines the layout fields for article editing.
     *
     * @return iterable
     */
    protected function fields(): iterable
    {
        return [
            Select::make('articles.category_id')
                ->title('Category')
                ->fromModel(Category::class, 'name'),

            CheckBox::make('articles.is_published')
                ->title('Published or Not')
                ->sendTrueOrFalse()
                ->help('Check if the article is published'),

            Input::make('articles.title')
                ->title('Title')
                ->minlength(10)
                ->maxlength(50),

            TextArea::make('articles.content')
                ->rows(5)
                ->title('Content')
                ->maxlength(500),

            Upload::make('articles.attachment')
                ->title('Upload Images')
                ->acceptedFiles('image/*')
                ->maxFiles(5)
                ->path('article/images')
        ];
    }
}