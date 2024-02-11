<?php
namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum Status: string implements HasLabel
{
    case enabled = 'AUTHENTICATED';
    case disabled = 'disconnect';


    public function getLabel(): ?string
    {
        return match ($this) {
            self::enabled => 'مفعل',
            self::disabled => 'غير مفعل',
        };
    }}




