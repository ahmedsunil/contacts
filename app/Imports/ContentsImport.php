<?php

namespace App\Imports;

use App\Models\Contact;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class ContentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param  array  $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        try {
            $contact = Contact::updateOrCreate(
                ['index' => $row['index']],
                [
                    'name' => $row['name'],
                    'grade' => $row['grade'],
                    'parent_name' => $row['parent_name'],
                    'email' => $row['email'],
                    'contact_number' => $row['contact_number'],
                ]
            );

            Log::info('Contact processed successfully', [
                'index' => $row['index'],
                'action' => $contact->wasRecentlyCreated ? 'created' : 'updated'
            ]);

            return $contact;
        } catch (Exception $e) {
            Log::error('Error processing contact', [
                'error' => $e->getMessage(),
                'row' => $row
            ]);
            return null;
        }
    }
}
