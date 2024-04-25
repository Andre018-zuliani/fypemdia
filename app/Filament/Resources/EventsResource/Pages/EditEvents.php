<?php

namespace App\Filament\Resources\EventsResource\Pages;

use App\Filament\Resources\EventsResource;
use App\Models\Events;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvents extends EditRecord
{
    protected static string $resource = EventsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (section $record) {
                    if ($record->gambar) {
                        Storage::disk('public')->delete($record->gambar);
                    }
                }
            ),
        ];
    }
}
