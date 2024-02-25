<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MassageResource\Pages;
use App\Filament\Resources\MassageResource\RelationManagers;
use App\Models\Device;
use App\Models\Massage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MassageResource extends Resource
{
    protected static ?string $model = Massage::class;

    public static function getPluralModelLabel(): string
    {
        return __('Massages');
    }
    public static function getModelLabel(): string
    {
        return __('Massage');
    }

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type=="customer"?true:false;
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
        $device =Device::where('user_id', $user->id)->first();
        $device_id= $device->id ??"null";
        return $table
        ->modifyQueryUsing(function (Builder $query) use ($device_id) {
            if($device_id=="null"){
                $query;

            }else{
                $query->where('device_id', $device_id);

            }
        })
            ->columns([
                Tables\Columns\TextColumn::make('massage')->translateLabel(),
                Tables\Columns\TextColumn::make('type')->translateLabel(),
                Tables\Columns\TextColumn::make('status')->translateLabel()

                ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListMassages::route('/'),
            'create' => Pages\CreateMassage::route('/create'),
            'edit' => Pages\EditMassage::route('/{record}/edit'),
        ];
    }
}
