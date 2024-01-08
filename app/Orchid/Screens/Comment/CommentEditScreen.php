<?php

namespace App\Orchid\Screens\Comment;

use App\Http\Requests\Comment\SaveCommentRequest;
use App\Models\Comment;
use App\Orchid\Elements\Buttons\DeleteButton;
use App\Orchid\Elements\Buttons\SaveButton;
use App\Orchid\Layouts\Comment\CommentEditLayout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Orchid\Support\Facades\Toast;

class CommentEditScreen extends AbstractCommentScreen
{
    /**
     * @var \App\Models\Comment|null
     */
    public ?Comment $comment = null;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Comment $comment): iterable
    {
        return [
            'comment' => $comment
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        if (optional($this->comment)->exists){
            return __('Edit Comment');
        }

        return __('Create Comment');
    }

    /**
     * The screen's action buttons.
     *
     * @uses \App\Orchid\Screens\Comment\AbstractCommentScreen::delete()
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
            CommentEditLayout::class,
        ];
    }


    /**
     * @param  \App\Models\Comment  $comment
     * @param  \App\Http\Requests\Comment\SaveCommentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function save(Comment $comment, SaveCommentRequest $request) : RedirectResponse
    {
        $commentData = $request->validated()['comment'];
        $comment->fill($commentData);

        if (!isset($commentData['article_id'])) {
            throw new \Exception('The article_id is required.');
        }

        $comment->save();
        Toast::info('Comment successfully created.');

        return redirect()->route('platform.system.comments');
    }
}