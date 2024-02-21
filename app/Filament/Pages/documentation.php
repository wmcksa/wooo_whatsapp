<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class documentation extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.documentation';
    public static function getNavigationLabel(): string
    {
        return __('Documentation');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Documentation');
    }
    public function getHeading(): string
    {
        return __('Documentation');
    }

}
