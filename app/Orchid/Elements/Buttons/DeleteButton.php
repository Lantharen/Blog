<?php

namespace App\Orchid\Elements\Buttons;

use Orchid\Screen\Actions\Button;

class DeleteButton extends Button
{
    /**
     * @param  string|null  $name
     * @return \App\Orchid\Elements\Buttons\DeleteButton|\Orchid\Screen\Actions\Button
     */
    public static function make(?string $name = null): DeleteButton|Button
    {
        return (new static())
            ->name($name ?? __('Delete'))
            ->icon('bs.trash-fill')
            ->class('btn btn-danger')
            ->method('delete');
    }
}