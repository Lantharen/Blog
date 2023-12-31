<?php

namespace App\Orchid\Screens\Article;

use App\Http\Requests\Article\SaveArticleRequest;
use App\Models\Article;
use App\Orchid\Elements\Buttons\DeleteButton;
use App\Orchid\Elements\Buttons\SaveButton;
use App\Orchid\Layouts\Article\ArticleEditLayout;
use Illuminate\Http\RedirectResponse;
use Orchid\Support\Facades\Toast;

class ArticleEditScreen extends AbstractArticleScreen
{
    /**
     * @var \App\Models\Article|null
     */
    public ?Article $article = null;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Article $article): iterable
    {
        if (auth()->check()) {
            $article->viewers()->syncWithoutDetaching([auth()->id()]);
        }

        return [
            'articles' => $article
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        if (optional($this->article)->exists){
            return __('Edit Article');
        }

        return __('Create Article');
    }

    /**
     * The screen's action buttons.
     *
     * @uses \App\Orchid\Screens\Article\AbstractArticleScreen::delete()
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            SaveButton::make(),

            DeleteButton::make(),
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
            ArticleEditLayout::class,
        ];
    }

    /**
     * @param  \App\Models\Article $article
     * @param  \App\Http\Requests\Article\SaveArticleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Article $article, SaveArticleRequest $request) : RedirectResponse
    {
        $article->fill($request->input('articles'))->save();

        if ($article->attachment()->syncWithoutDetaching(
            $request->input('articles.attachment', [])
        )) {
            Toast::info('Article successfully saved.');
        }

        Toast::info('Article successfully created.');

        return redirect()->route('platform.system.articles');
    }
}
