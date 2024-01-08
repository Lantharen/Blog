<?php

namespace App\Orchid\Layouts\Article;

use App\Models\Article;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ArticleListLayout extends Table
{
    /**
     * Data source
     *
     * @var string
     */
    protected $target = 'articles';

    public function columns(): array
    {
        return [
            TD::make('id', 'ID')
                ->alignCenter()
                ->cantHide(),

            TD::make('category.name', 'Category')
                ->render(function (Article $article) {
                    return $article->category->name;
                })
                ->alignCenter()
                ->cantHide(),

            TD::make('is_published', 'Published')
                ->render(function (Article $article) {
                    return $article->is_published ? 'Опубликована' : '';
                })
                ->alignCenter()
                ->cantHide(),

            TD::make('view_count', 'View Count')
                ->alignCenter()
                ->cantHide()
                ->render(function (Article $article) {
                    return $article->view_count;
                }),

            TD::make('title', 'Title')
                ->alignCenter()
                ->cantHide(),

            TD::make('content', 'Content')
                ->alignCenter()
                ->cantHide(),

            TD::make('viewers', 'Viewers')
                ->render(function (Article $article) {
                    return $article->viewers->pluck('name')->join(', ');
                }),

            TD::make(__('Actions'))
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Article $article) {
                    return DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list($this->getActionDropdownItems($article));
                }),
        ];
    }

    /**
     * Returns the items to be displayed in the action dropdown for the given
     * article.
     *
     * @param  \App\Models\Article  $article
     * @return array
     */
    protected function getActionDropdownItems(Article $article): array
    {
        return [
            Link::make('Edit')
                ->route('platform.system.articles.edit', $article->id)
                ->icon('bs.pencil-fill'),

            Button::make('Delete')
                ->icon('bs.trash-fill')
                ->method('delete', [
                    'article' => $article->id,
                ]),
        ];
    }

}