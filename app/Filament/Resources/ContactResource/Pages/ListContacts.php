<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Imports\ContentsImport;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;
use YOS\FilamentExcel\Actions\Import;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('downloadPublicFile')
                ->label('Template')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {
                    $filePath = 'sample_contacts.xlsx';

                    if (!Storage::disk('public')->exists($filePath)) {
                        Notification::make()
                            ->title('File not found')
                            ->body('The requested file does not exist.')
                            ->danger()
                            ->send();

                        return;
                    }

                    return response()->download(Storage::disk('public')->path($filePath));
                }),
            Import::make()
                ->import(ContentsImport::class)
                ->type(Excel::XLSX)
                ->label('Import from excel')
                ->hint('Upload xlsx type')
                ->color('success'),
            Actions\CreateAction::make(),
        ];
    }
}
