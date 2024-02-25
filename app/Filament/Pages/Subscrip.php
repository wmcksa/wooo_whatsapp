<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Subscrip extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-bars-arrow-down';
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type=="customer"?true:false;
    }
    protected static string $view = 'filament.pages.subscrip';
    public static function getNavigationLabel(): string
    {
        return __('Subscrip');
    }
    public function getHeading(): string
    {
        return __('Subscrip');
    }

}
