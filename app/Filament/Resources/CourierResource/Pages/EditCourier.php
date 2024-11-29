<?php

namespace App\Filament\Resources\CourierResource\Pages;

use App\Filament\Resources\CourierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\BelongsToSelect;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\TextInput;

class EditCourier extends EditRecord
{
    protected static string $resource = CourierResource::class;

    public function mutate($record, array $data): array
    {
        $name = $this->get('name'); // Access the value of the "name" field

        // Logic to update the record based on the retrieved value and other data
        $record->name = $name;

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [

            Actions\EditAction::make('location')->label('set location')
                ->model(\App\Models\Courier::class)
                ->form([
                    Map::make('location')
                        ->label('Location')
                        ->columnSpanFull()
                        ->afterStateUpdated(function ($get, $set, string|array|null $old, ?array $state): void {
                            $set('latitude', $state['lat']);
                            $set('longitude', $state['lng']);
                        })
                        ->afterStateHydrated(function ($state, $record, $set): void {
                            $location = json_decode($record->location);
                            if ($location == null) {
                                $set('location', [
                                    "lat" => 38.868288566138204,
                                    "lng" => -77.09930419921876
                                ]);
                            } else {
                                $set('location', ['lat' => $location->lat, 'lng' => $location->lng]);
                            }
                        })
                        ->liveLocation()
                        ->showMarker()
                        ->markerColor("#22c55eff")

                        ->showFullscreenControl()
                        ->showZoomControl()
                        ->draggable()
                        ->tilesUrl("https://tile.openstreetmap.org/{z}/{x}/{y}.png")
                        ->zoom(10)
                        ->detectRetina()
                        ->showMyLocationButton()
                        ->extraTileControl([])
                        ->extraControl([
                            'zoomDelta' => 1,
                            'zoomSnap' => 2,
                        ])

                ])
                ->action(function (Actions\EditAction $action, \App\Models\Courier $record) {
                    // Persist the changes
                    $record->update($action->getFormData());
                }),
            Actions\EditAction::make('status')->label('change status')
                ->model(\App\Models\Courier::class)
                ->form([
                    BelongsToSelect::make('status_id')
                        ->required()
                        ->relationship('status', 'name')
                ])
                ->action(function (Actions\EditAction $action, \App\Models\Courier $record) {
                    // Persist the changes
                    $record->update($action->getFormData());
                })
            ,
            Actions\DeleteAction::make(),
        ];
    }
}
