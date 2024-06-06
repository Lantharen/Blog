<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\View\Component;
use Illuminate\View\View;

class Thumbnail extends Component
{
    /**
     * The article instance.
     *
     * @var Article
     */
    public Article $article;

    /**
     * Create a new component instance.
     *
     * @param Article $article The article instance
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        $thumbnail = $this->article->attachment()->first();

        return view('components.thumbnail', ['thumbnail' => $thumbnail]);
    }
}
