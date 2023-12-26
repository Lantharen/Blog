<?php

namespace App\Orchid\Screens\Article;

use App\Models\Article;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

abstract class AbstractArticleScreen extends Screen
{

    /**
     * @param  \App\Models\Article $article
     * @return void
     */
    public function delete(Article $article): void
    {
        $article->delete();

        Toast::info('Article removed.');

    }
}