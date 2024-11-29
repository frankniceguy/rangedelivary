<?php

namespace App\Filament\Resources\BranchResource\Pages;

use App\Filament\Resources\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

use App\Models\Branch;

class CreateBranch extends CreateRecord
{

    protected function handleRecordCreation(array $data): Model
    {
        $data['full_address'] = $data['street']. " | ". $data['city']. " | ". $data['country'] . " | ". $data['zip'];
        return static::getModel()::create($data);
    }
    
    protected static string $resource = BranchResource::class;
    
}
