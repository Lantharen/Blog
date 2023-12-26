<?php

namespace App\Orchid\Screens\Article;

use App\Models\Article;
use App\Orchid\Elements\Buttons\CreateButton;
use App\Orchid\Layouts\Article\ArticleListLayout;

class ArticleListScreen extends AbstractArticleScreen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'articles' => Article::with('category')->get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Article Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            CreateButton::make(),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ArticleListLayout::class,
        ];
    }
}
