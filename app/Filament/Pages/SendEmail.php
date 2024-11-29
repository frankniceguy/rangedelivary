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

class SendEmail extends Page implements HasForms    
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static string $view = 'filament.pages.send-email';


    public ?array $data = []; 

    public function mount(): void 
    {
        $this->form->fill();
    }

    public function send(): void
    {
        try {
            $data = $this->form->getState();
            $this->sendMail($data);
        } catch (Halt $exception) {
            return;
        }
    }
 

    public function sendMail($data){
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];

        if(\Mail::to($email)->send(new \App\Mail\AdminEmail($email,$subject,$message))){
            Notification::make() 
            ->success()
            ->title(__('Sent Email'))
            ->send(); 
        }else{
            Notification::make() 
            ->error()
            ->title(__('Failed to send email'))
            ->send();    
        }

    }

    protected function getFormActions(): array
    {
        return [
            Action::make('send')
                ->label(__('Send Email'))
                ->submit('send'),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('message')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan('full')
            ])
            ->columns(2)
            ->statePath('data');
    } 

}
