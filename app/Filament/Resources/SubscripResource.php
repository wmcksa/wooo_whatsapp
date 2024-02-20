<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscripResource\Pages;
use App\Filament\Resources\SubscripResource\RelationManagers;
use App\Models\Subscrip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscripResource extends Resource
{
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type=="admin"?true:false;
    }
    protected static ?string $model = Subscrip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable()->translateLabel(),
                TextColumn::make('package.name')->sortable()->searchable()->translateLabel(),
                TextColumn::make('package.price')->sortable()->searchable()->translateLabel(),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('Subscrips');
    }
    public static function getModelLabel(): string
    {
        return __('Subscrip');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscrips::route('/'),
            'create' => Pages\CreateSubscrip::route('/create'),
            'view' => Pages\ViewSubscrip::route('/{record}'),
            'edit' => Pages\EditSubscrip::route('/{record}/edit'),
        ];
    }
}
