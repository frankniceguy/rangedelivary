<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourierResource\Pages;
use App\Filament\Resources\CourierResource\RelationManagers;
use App\Models\Courier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard;
use Filament\Modals\Modal;
use Filament\Forms\Components\Actions\Action;

class CourierResource extends Resource
{
    protected static ?string $model = Courier::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    // protected static ?string $navigationGroup = 'Settings';


    public static function modals(): array
    {
        return [
            Modals\UpdateStatusModal::class,
        ];
    }

        
    public static function form(Form $form): Form
    {
        return $form->schema([

        Wizard::make([
            Wizard\Step::make('Sender')
                ->schema([
                    Forms\Components\Select::make('sender_id')
                    ->relationship('sender','fullname')
                    ->searchable()
                    ->required()
                    ->createOptionForm([

                        Forms\Components\TextInput::make('fullname')
                        ->required()
                        ->maxLength(255),
                        // ->default(),
                        // ->relationship('sender','name'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->unique()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255),

                    ])
                    ->createOptionAction(function (Action $action) {
                        return $action
                            ->modalHeading('Create Sender')
                            ->modalSubmitActionLabel('Create Sender ')
                            ->modalWidth('lg');
                    }),
                    
                ]),
            Wizard\Step::make('Recipient')
                ->schema([
                    Forms\Components\Select::make('recipient_id')
                    ->relationship('recipient','fullname')
                    ->searchable()
                    ->required()
                    ->createOptionForm([

                        Forms\Components\TextInput::make('fullname')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->unique()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255),

                    ])
                    ->createOptionAction(function (Action $action) {
                        return $action
                            ->modalHeading('Create Recipient')
                            ->modalSubmitActionLabel('Create Recipient')
                            ->modalWidth('lg');
                    }),
                    
                ]),
            Wizard\Step::make('Parcel')
                ->schema([
                Forms\Components\TextInput::make('tracking_id')
                    ->readOnly()
                    ->default(uniqid('TR'))
                    ->maxLength(255),
                Forms\Components\Textarea::make('package_name')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('parcel_weight')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parcel_color')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('origin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('destination')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_id')
                    ->required()
                    ->relationship('status','name'),    
                Forms\Components\TextInput::make('carrier')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipment_method')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_method')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('shipping_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('package_image')
                ->image()
                ->maxSize(1024),

                ]),
            ])
        ]);
    }


  

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tracking_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carrier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipment_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_address')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('pickup_time')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('delivery_date')
                //     ->dateTime()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCouriers::route('/'),
            'create' => Pages\CreateCourier::route('/create'),
            'edit' => Pages\EditCourier::route('/{record}/edit'),
            'view' => Pages\ViewCourier::route('/{record}/view'),
        ];
    }
}

