<?php

namespace App\Orchid\Filters;


use Orchid\Screen\Layouts\Selection;

class CommentFilterLayout extends Selection
{

    /** {@inheritDoc} */
    public function filters(): iterable
    {
        return [
            RelationUserNameFilter::class,
            RelationArticleFilter::class,
        ];
    }
}