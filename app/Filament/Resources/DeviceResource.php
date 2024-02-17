<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceResource\Pages;
use App\Filament\Resources\DeviceResource\Pages\Scan;
use App\Filament\Resources\DeviceResource\RelationManagers;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;
    public static function getNavigationLabel(): string
    {
        return __('Devices');
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type == "customer" ? true : false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user(); // Get the authenticated user
        $userId = $user->id ?? "null";
        return $table
            ->modifyQueryUsing(function (Builder $query) use ($userId) {
                if ($userId == "null") {
                    $query;
                } else {
                    $query->where('user_id', $userId);
                }
            })

            ->columns([

                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('whastapp Scan')
                    ->color('success')
                    ->url(fn ($record): string =>  self::getUrl('scan', ['record' => $record]))

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])


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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
            'scan' => Pages\Scan::route('/{record}/scan'),

        ];
    }
}
