<?php

namespace App\Orchid\Elements\Buttons;

use Orchid\Screen\Actions\Button;

class SaveButton extends Button
{
    /**
     * Create a new button instance.
     *
     * @param  string|null  $name
     * @return \App\Orchid\Elements\Buttons\SaveButton|\Orchid\Screen\Actions\Button
     */
    public static function make(?string $name = null): SaveButton|Button
    {
        return (new static())
            ->name($name ?? __('Save'))
            ->icon('bs.check-circle-fill')
            ->class('btn btn-success')
            ->method('save');
    }
}