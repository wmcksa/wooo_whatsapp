<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function getPluralModelLabel(): string
    {
        return __('Users');
    }
    public static function getModelLabel(): string
    {
        return __('User');
    }
    protected static ?string $navigationIcon = 'heroicon-o-users';
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type=="admin"?true:false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->translateLabel(),
                TextInput::make('email')->required()->translateLabel(),
                TextInput::make('phone')->required()->translateLabel(),
                TextInput::make('password')->required()->translateLabel(),

                Select::make('type')
                    ->options([
                        'admin' => 'admin',
                        'customer' => 'customer',
                    ]),
                    Select::make('protected')
                    ->options([
                        '1' => 'active',
                        '2' => 'Inactive',
                    ]),
                    Select::make('protect')
                    ->options([
                        '1' => 'active',
                        '2' => 'Inactive',
                    ]),
                    Select::make('status')
                    ->options([
                        '1' => 'active',
                        '2' => 'Inactive',
                    ]),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->translateLabel(),
                TextColumn::make('email')->sortable()->searchable()->translateLabel(),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
