<?php

namespace App\Orchid\Screens\Comment;

use App\Models\Comment;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

abstract class AbstractCommentScreen extends Screen
{
    /**
     * Deletes the comment.
     *
     * @param  \App\Models\Comment $comment
     * @return void
     */
    public function delete(Comment $comment): void
    {
        $comment->delete();

        Toast::info('Comment removed.');

    }
}