<?php



namespace App\Filament\Resources\CourierResource\Modals;

use Filament\Forms;
use Filament\Modals\Actions\ButtonAction;
use Filament\Modals\Modal;

class UpdateStatusModal extends Modal
{
    protected static string $view = 'filament.resources.courier-resource.modals.update-status-modal';

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options(Courier::STATUSES) // Assuming you have a STATUSES constant or array
                ->required(),
        ];
    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make('Update')
                ->action('updateStatus'),
        ];
    }

    public function updateStatus(array $data)
    {
        $this->record->update(['status' => $data['status']]);

        // Optionally, close the modal and display a success message
        $this->close();
        $this->notify('Status updated successfully!');
    }
}
