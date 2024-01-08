<?php

namespace App\Orchid\Layouts\Comment;

use App\Models\Comment;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CommentListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'comments';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')
                ->cantHide(),

            TD::make('article.title', 'Article')
                ->render(function (Comment $comment) {
                    return $comment->article->title;
                }),

            TD::make('user.name', 'User')
                ->render(function (Comment $comment) {
                    return $comment->user->name;
                }),

            TD::make('content', 'Content'),

            TD::make('edited_at', 'Edited At')
                ->render(function (Comment $comment) {
                    return $comment->created_at->toDayDateTimeString();
                }),

            TD::make(__('Actions'))
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Comment $comment) {
                    return DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list($this->getActionDropdownItems($comment));
                }),
        ];
    }

    /**
     * Returns the items to be displayed in the action dropdown for the given
     * comment.
     *
     * @param  \App\Models\Comment $comment
     * @return array
     */
    protected function getActionDropdownItems(Comment $comment): array
    {
        return [
            Link::make('Edit')
                ->route('platform.system.comments.edit', $comment->id)
                ->icon('bs.pencil-fill'),

            Button::make('Delete')
                ->icon('bs.trash-fill')
                ->method('delete', [
                    'comment' => $comment->id,
                ]),
        ];
    }
}
