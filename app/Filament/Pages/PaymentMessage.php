<?php

namespace App\Filament\Pages;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;
use App\Models\Message;

class PaymentMessage extends Page implements HasForms    
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.payment-message';


    public ?array $data = []; 

    public function mount(): void 
    {
        if(Message::count() > 0){
            $this->form->fill(Message::first()->toArray());
        }else{
            $this->form->fill();
        }
    }

    public function send(): void
    {
        try {
            $data = $this->form->getState();
            $this->saveMessage($data);
        } catch (Halt $exception) {
            return;
        }
    }
 

    public function saveMessage($data){
        $message = $data['message'];

        if(Message::count() == 0){
            Message::create([
                'message' => $message,
                'type' => 'message'
            ]);
        }else{
            Message::first()->update(['message' => $message]);
        }

        Notification::make()    
        ->success()
        ->title(__('Saved Message'))
        ->send(); 

    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save Message'))
                ->submit('save'),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('message')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan('full')
            ])
            ->columns(2)
            ->statePath('data');
    } 

}
