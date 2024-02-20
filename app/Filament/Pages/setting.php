<?php

namespace App\Filament\Pages;

use App\Models\Setting as ModelsSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class setting extends Page
{
    use InteractsWithForms;
    public ?array $data = [];
    public static   function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type=="super_admin"?true:false;
    }
    public static function getNavigationLabel(): string
    {
        return __('settings');
    }
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 8;


    protected static string $view = 'filament.pages.setting';
    public function mount(): void
    {
        $setting=ModelsSetting::where('id',1)->first();
        if($setting){
            $this->form->fill(ModelsSetting::where('id',1)->first()->attributesToArray());
        }
        else{
            $this->form->fill();
        }
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('moyasar_key'),





            ])
            ->statePath('data');
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }


    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $setting =ModelsSetting::where('id',1)->first();
            if($setting){
                 $setting->update($data);
            }else{
                Setting::create($data);
            }


        } catch (Halt $exception) {
            dd($exception);
        }

        Notification::make()
        ->success()
        ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        ->send();
    }

}
