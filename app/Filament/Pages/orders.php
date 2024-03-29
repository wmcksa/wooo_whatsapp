<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class orders extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type=="cust"?true:false;
    }
    protected static string $view = 'filament.pages.orders';

}
